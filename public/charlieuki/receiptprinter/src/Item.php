<?php

namespace charlieuki\ReceiptPrinter;

class Item
{
    private $name;
    private $qty;
    private $price;
    private $gst;
    private $currency = 'INR';

    function __construct($name, $qty, $price,$gst) {
        $this->name = $name;
        $this->qty = $qty;
        $this->price = $price;
        $this->gst = $gst;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
    }

    public function getQty() {
        return $this->qty;
    }

    public function getPrice() {
        return $this->price;
    }

    public function __toString()
    {
        $right_cols = 10;
        $left_cols = 22;

        $item_price = $this->currency . number_format($this->price-$this->gst, 2);
        $item_gst = $this->currency . number_format($this->gst, 2);
        $item_subtotal = $this->currency . number_format($this->price * $this->qty, 2);
        
        $print_name = str_pad($this->name, 16) ;
        $print_gst = str_pad('Gst: ' . ($this->gst/$this->price*100).'% ('.($this->gst*$this->qty).')  ',2 );
        $print_priceqty = str_pad($item_price . ' x ' . $this->qty, $left_cols);
        $print_subtotal = str_pad($item_subtotal, $right_cols, ' ', STR_PAD_LEFT);

        return "$print_name\n$print_priceqty$print_gst$print_subtotal\n";
    }
}