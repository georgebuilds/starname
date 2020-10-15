<?php
namespace Starname;



class Client {

    static $mainnet_node_url = "https://rpc.iov-mainnet-2.iov.one:443";

    static $mainnet_chain_id = "iov-mainnet-2";

    function __construct(){

    }

    function lookup(string $starname){

    }

    function reverse_lookup(string $star1_address){

        $command  = "iovnscli query starname owner-domains ";
        $command .= " --chain-id=".self::$mainnet_chain_id;
        $command .= " --node=".self::$mainnet_node_url;
        $command .= " --owner=$star1_address";

        shell_exec($command);
    }

}