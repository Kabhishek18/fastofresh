<?php

namespace charlieuki\ReceiptPrinter;

use charlieuki\ReceiptPrinter\Item as Item;
use charlieuki\ReceiptPrinter\Store as Store;
use charlieuki\ReceiptPrinter\Client as Client;
use Mike42\Escpos\Printer;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\GdEscposImage;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

class ReceiptPrinter
{
    private $printer;
    private $logo;
    private $store;
    private $items;
    private $currency = 'INR';
    private $subtotal = 0;
    private $tax_percentage = 10;
    private $tax = 0;
    private $grandtotal = 0;
    private $request_amount = 0;
    private $qr_code = [];
    private $transaction_id = '';
    private $method = '';
    private $slot = '';

    function __construct() {
        $this->printer = null;
        $this->items = [];
    }

    public function close() {
        $this->printer->close();
    }

    public function init($connector_type, $connector_descriptor, $connector_port = 9100) {
        switch (strtolower($connector_type)) {
            case 'cups':
                $connector = new CupsPrintConnector($connector_descriptor);
                break;
            case 'windows':
                $connector = new WindowsPrintConnector($connector_descriptor);
                break;
            case 'network':
                $connector = new NetworkPrintConnector($connector_descriptor);
                break;
            default:
                $connector = new FilePrintConnector("php://stdout");
                break;
        }

        if ($connector) {
            // Load simple printer profile
            $profile = CapabilityProfile::load("default");
            // Connect to printer
            $this->printer = new Printer($connector, $profile);
        } else {
            throw new Exception('Invalid printer connector type. Accepted values are: cups');
        }
    }

    public function setStore($cin,$gst, $name, $address, $phone, $email, $website) {
        $this->store = new Store($cin,$gst, $name, $address, $phone, $email, $website);
    }

    public function setLogo($logo) {
        $this->logo = $logo;
    }

    public function SetClient($addressline1,$landmark,$city,$postalcode,$mobile,$username,$email,$method,$slot,$id)
    {
        $this->client = new Client($addressline1,$landmark,$city,$postalcode,$mobile,$username,$email,$method,$slot,$id);
    }
    public function setCurrency($currency) {
        $this->currency = $currency;
    }

    public function addItem($name, $qty, $price,$gst) {
        $item = new Item($name, $qty, $price,$gst);
        $item->setCurrency($this->currency);
        
        $this->items[] = $item;
    }

    public function setRequestAmount($amount) {
        $this->request_amount = $amount;
    }

    public function setTax($tax) {
        $this->tax_percentage = $tax;
        
        if ($this->subtotal == 0) {
            $this->calculateSubtotal();
        }

        $this->tax = (int) $this->tax_percentage / 100 * (int) $this->subtotal;
    }

    public function calculateSubtotal() {
        $this->subtotal = 0;

        foreach ($this->items as $item) {
            $this->subtotal += (int) $item->getQty() * (int) $item->getPrice();
        }
    }

    public function calculateGrandTotal() {
        if ($this->subtotal == 0) {
            $this->calculateSubtotal();
        }

        $this->grandtotal = (int) $this->subtotal + (int) $this->tax;
    }

    public function setTransactionID($transaction_id) {
        $this->transaction_id = $transaction_id;
    }

    public function setQRcode($content) {
        $this->qr_code = $content;
    }

    public function getPrintableQRcode() {
        return json_encode($this->qr_code);
    }

    public function getPrintableHeader($left_text, $right_text, $is_double_width = false) {
        $cols_width = $is_double_width ? 8 : 16;

        return str_pad($left_text, $cols_width) . str_pad($right_text, $cols_width, ' ', STR_PAD_LEFT);
    }

    public function getPrintableSummary($label, $value, $is_double_width = false) {
        $left_cols = $is_double_width ? 6 : 12;
        $right_cols = $is_double_width ? 10 : 20;

        $formatted_value = $this->currency .' '. number_format($value);

        return str_pad($label, $left_cols) . str_pad($formatted_value, $right_cols, ' ', STR_PAD_LEFT);
    }

    public function feed($feed = NULL) {
        $this->printer->feed($feed);
    }

    public function cut() {
        $this->printer->cut();
    }

    public function printDashedLine() {
        $line = '';

        for ($i = 0; $i < 32; $i++) {
            $line .= '-';
        }

        $this->printer->text($line);
    }

    public function printLogo() {
        if ($this->logo) {
           $img = EscposImage::load(url()."/assets/images/logo2.png");
            $printer -> graphics($img);
        }
    }

    public function printQRcode() {
        if (!empty($this->qr_code)) {
            $this->printer->qrCode($this->getPrintableQRcode(), Printer::QR_ECLEVEL_L, 8);
        }
    }

    public function printReceipt($with_items = true) {
        if ($this->printer) {
            // Get total, subtotal, etc
            $subtotal = $this->getPrintableSummary('Subtotal', $this->subtotal);
            $tax = $this->getPrintableSummary('Tax', $this->tax);
            $total = $this->getPrintableSummary('TOTAL', $this->grandtotal, true);
            $header = $this->getPrintableHeader(
                'CIN: ' . $this->store->getCIN(),
                ' GST: ' . $this->store->getGST()

            );
            $footer = "Thank you for shopping!\n";
            // Init printer settings
            $this->printer->initialize();
            $this->printer->selectPrintMode();
            // Set margins
            $this->printer->setPrintLeftMargin(1);
            // Print receipt headers
            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            // Print logo
            $ticketim = imagecreatefrompng("assets/images/logo2.png");

            $ticketEscPosIm = new GdEscposImage();
            $ticketEscPosIm -> readImageFromGdResource($ticketim);
            $this->printer -> graphics($ticketEscPosIm);

            //End Print Logo
            $this->printer->feed(2);
            $this->printer->text("{$this->store->getName()}\n");
            
            $this->printer->selectPrintMode(Printer::MODE_FONT_A);
            $this->printer->text("{$this->store->getAddress()}\n");
            $this->printer->text($header . "\n");
            $this->printer->feed();
            $this->printer->setJustification(Printer::JUSTIFY_LEFT);
            //Customer Details
            $this->printer->setEmphasis(true);
            $this->printer->text("Customer Detail\n");
            $this->printer->setEmphasis(false);
            $this->printer->feed();
            $this->printer->text("Customer Name: {$this->client->getusername()}\n");
            $this->printer->text("Address : {$this->client->getaddressline1()}\n");
            $this->printer->text(" {$this->client->getcity()}");
            $this->printer->text("{$this->client->getpostalcode()}\n");
            $this->printer->text(" Landmark: {$this->client->getlandmark()}\n");
            $this->printer->text("Phone : {$this->client->getmobile()}\n");
            $this->printer->text("Email : {$this->client->getemail()}\n");
            $this->printer->text("Payment :{$this->client->getmethod()}\n");
            $this->printer->text("Order Id :{$this->client->getid()}\n");
          //  $this->printer->text("Slot : {$this->client->getslot()}\n");
                  // Print receipt date
            $this->printer->text("Invoice Date: ". date('j F Y H:i:s'));
            $this->printer->feed(2);

            // Print receipt title
             $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            $this->printDashedLine();
            $this->printer->feed();
            $this->printer->setEmphasis(true);
            $this->printer->text("Order Details\n");
            $this->printer->setEmphasis(false);
            $this->printer->feed();
            // Print items
            if ($with_items) {
                $this->printer->setJustification(Printer::JUSTIFY_CENTER);
                foreach ($this->items as $item) {
                    $this->printer->text($item);
                     $this->printer->feed();
                }
                $this->printer->feed();
            }
            // Print subtotal
            
            $this->printDashedLine();
            $this->printer->feed();
            $this->printer->setEmphasis(true);
            $this->printer->text($subtotal);
            $this->printer->feed();
            $this->printDashedLine();
            $this->printer->setEmphasis(false);
            
            // Print tax
            // $this->printer->text($tax);
            // $this->printer->feed(2);
            // Print grand total
            $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
             $this->printer->feed();
            $this->printer->text($total);
            $this->printer->feed();
            $this->printer->selectPrintMode();
            // Print qr code
            $this->printDashedLine();
            $this->printer->feed();
            $this->printQRcode();
            $this->printer->feed();
            $this->printer->text('E & OE');
            $this->printer->feed();
            $this->printDashedLine();
            // Print receipt footer
            $this->printer->feed();
            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            $this->printer->text($footer);
            $this->printer->feed();
      
            // Cut the receipt
            $this->printer->cut();
            $this->printer->close();
        } else {
            throw new Exception('Printer has not been initialized.');
        }
    }

    public function printRequest() {
        if ($this->printer) {
            // Get request amount
            $total = $this->getPrintableSummary('TOTAL', $this->request_amount, true);
            $header = $this->getPrintableHeader(
               'CIN: ' . $this->store->getCIN(),
               ' GST: ' . $this->store->getGST()
            );
            $footer = "This is not a proof of payment.\n";
            // Init printer settings
            $this->printer->initialize();
            $this->printer->feed();
            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            // Print logo
            $this->printLogo();
            // Print receipt headers
            //$this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            //$this->printer->text("U L T I P A Y\n");
            //$this->printer->feed();
            $this->printer->selectPrintMode();
            $this->printer->text("{$this->store->getName()}\n");
            $this->printer->text("{$this->store->getAddress()}\n");
            $this->printer->text($header . "\n");
            $this->printer->feed();
            // Print receipt title
            $this->printDashedLine();
            $this->printer->setEmphasis(true);
            $this->printer->text("PAYMENT REQUEST\n");
            $this->printer->setEmphasis(false);
            $this->printDashedLine();
            $this->printer->feed();
            // Print instruction
            $this->printer->text("Please scan the code below\nto make payment\n");
            $this->printer->feed();
            // Print qr code
            $this->printQRcode();
            $this->printer->feed();
            // Print grand total
            $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $this->printer->text($total . "\n");
            $this->printer->feed();
            $this->printer->selectPrintMode();
            // Print receipt footer
            $this->printer->feed();
            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            $this->printer->text($footer);
            $this->printer->feed();
            // Print receipt date
            $this->printer->text(date('j F Y H:i:s'));
            $this->printer->feed(2);
            // Cut the receipt
            $this->printer->cut();
            $this->printer->close();
        } else {
            throw new Exception('Printer has not been initialized.');
        }
    }
}