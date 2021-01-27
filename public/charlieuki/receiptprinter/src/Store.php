<?php

namespace charlieuki\ReceiptPrinter;

class Store
{
    private $cin = '';
    private $gst = '';
    private $name = '';
    private $address = '';
    private $phone = '';
    private $email = '';
    private $website = '';

    function __construct($cin,$gst, $name, $address, $phone, $email, $website) {
        $this->cin = $cin;
        $this->gst = $gst;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->website = $website;
    }

    public function getCIN() {
        return $this->cin;
    }
    public function getGST() {
        return $this->gst;
    }

    public function getName() {
        return $this->name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getWebsite() {
        return $this->website;
    }
}