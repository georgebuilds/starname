<?php


namespace Starname;


class Starname {

    public $name;

    function __construct(?string $name = null){

        $this->name = $name;
    }

    function get_name(){

        return $this->name;
    }

    function __toString(){

        return $this->name;
    }
}