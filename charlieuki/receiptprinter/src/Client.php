<?php

namespace charlieuki\ReceiptPrinter;

class Client
{
    private $addressline1 = '';
    private $landmark = '';
    private $city = '';
    private $postalcode = '';
    private $mobile = '';
    private $username = '';
    private $email = '';
    private $method = '';
    private $slot = '';
    private $id = '';

    function __construct($addressline1,$landmark,$city,$postalcode,$mobile,$username,$email,$method,$slot,$id) {
        $this->addressline1 = $addressline1;
        $this->landmark = $landmark;
        $this->city = $city;
        $this->postalcode = $postalcode;
        $this->mobile = $mobile;
        $this->username = $username;
        $this->email = $email;
        $this->slot = $slot;
        $this->method = $method;
        $this->id = $id;
    }
    public function getid() {
        return $this->id;
    }
    public function getslot() {
        return $this->slot;
    }
    public function getmethod() {
        return $this->method;
    }

    public function getaddressline1() {
        return $this->addressline1;
    }
    public function getlandmark() {
        return $this->landmark;
    }

    public function getcity() {
        return $this->city;
    }

    public function getpostalcode() {
        return $this->postalcode;
    }

    public function getmobile() {
        return $this->mobile;
    }

    public function getusername() {
        return $this->username;
    }

    public function getemail() {
        return $this->email;
    }
}