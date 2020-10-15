<?php
namespace Starname;



class Client {

    protected $node_url = "https://rpc.iov-mainnet-2.iov.one:443";

    protected $chain_id = "iov-mainnet-2";

    public $decode_json_responses = true;

    function __construct(){
        /*
         * If you are using Laravel, you can use the env() function to set custom values for
         * the node url and chain ID, allowing you to use test nets, etc
         */
        if(function_exists("env")){

            $this->chain_id = env("STARNAME_CHAIN_ID", $this->chain_id);
            $this->node_url = env("STARNAME_NODE_URL", $this->node_url);
        }
    }


    function lookup(string $starname, ?string $asset_ticker = null){

        if(!Validate::starname($starname)) throw new \Exception("Invalid starname");

        $command = "iovnscli query starname resolve ";
        $command .= " --chain-id=".$this->chain_id;
        $command .= " --node=".escapeshellcmd($this->node_url);
        $command .= " --starname ".escapeshellcmd($starname);

        $raw_output = shell_exec($command);

        $decoded_output = json_decode($raw_output);

        if($asset_ticker){

            if(!Validate::asset_ticker($asset_ticker)) throw new \Exception('Invalid asset ticker');
            $asset_address = $this->get_asset_address_from_lookup_results($decoded_output, $asset_ticker);
            return $asset_address;
        }

        return $this->decode_json_responses ? $decoded_output : $raw_output;
    }


    function reverse_lookup(string $star1_address){

        $command  = "iovnscli query starname owner-domains ";
        $command .= " --chain-id=".$this->chain_id;
        $command .= " --node=".escapeshellcmd($this->node_url);
        $command .= " --owner=".escapeshellcmd($star1_address);

        $raw_output = shell_exec($command);

        return $this->decode_json_responses ? json_decode($raw_output) : $raw_output;
    }


    function register(string $starname, Address $owner_address, int $fees_in_uiov = 200000){

        // TODO
        return null;
    }


    private function get_asset_address_from_lookup_results($results, $ticker){

        foreach($results as $account){
            foreach($account->resources as $account_asset){
                if($account_asset->uri == "asset:".strtolower($ticker)){
                    return $account_asset->resource;
                }
            }
        }
    }

}