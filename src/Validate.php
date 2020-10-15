<?php


namespace Starname;


class Validate {

    static function asset_ticker($input) : bool {
        if(strlen($input)>=10) return false;
        return true;
    }

    static function starname($input) : bool {
        if(strpos($input, "*")===false) return false;
        return true;
    }

    static function star1_address($input) : bool {
        return true; // TODO
    }
}