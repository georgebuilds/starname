<?php
namespace Starname;



class Address {

    public $public_key;

    public $private_key;

    public $mnemonic;

    function __construct(?string $public_key = null, ?string $private_key = null){


        $this->public_key = $public_key;
        $this->private_key = $private_key;
    }

    function get_public_key(){
        return $this->public_key;
    }

    function get_private_key(){
        return $this->private_key;
    }

    static function validate(){

    }

    static function from_mnemonic(string $mnemonic) : self {

        $address = new self();
        $address->mnemonic = $mnemonic;

        // TODO get pub/priv keys from mneomnic and store them in props

        return $address;
    }

    function __toString(){

        return $this->public_key;
    }


}