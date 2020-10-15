# IOV Starname Client Wrapper

Just a little wrapper for the iovnscli utility for the 
IOV Starname blockchain. So far, only lookups are supported. License is MIT but
shout-outs are super appreciated.

## Pre-Reqs
1) Install the iovnscli CLI tool and add it to PATH. Note that this CLI tool itself 
has the pre-requisite of installing GoLang.
## Installation
Install composer package
```bash
composer require georgebuilds/starname
```
If you are using Laravel, you can provide custom values for the following 
settings in your .env file

**STARNAME_NODE_URL** (*rpc node. mainnet is used by default*)

**STARNAME_CHAIN_ID** (*iov-mainnet-2 is default*)

**STARNAME_CLI_PATH** (*"iovnscli" without full path is default*)
    
## Usage
```php
$client = new \Starname\Client;
```
By default, the client will decode json responses. This setting can be changed
```php
$client->decode_json_responses = false; // Optional
```

##### Perform a name service lookup
```php
$lookup_results = $client->lookup("*binance");
```
##### Retrieve asset address for a given starname
```php
$lookup_results = $client->lookup("*georgebuilds", "btc");
```

##### Perform a reverse lookup
```php
$reverse_lookup_results = $client->reverse_lookup("star1bs9y08ec....");
````

##### Register a Starname

###### *UNDER DEVELOPMENT*

Use the *register* method to register a starname. You can  
optionally set a custom fee by supplying 
the amount in UIOV as a third argument
```php
$owner_address = new \Starname\Address($pub_key, $priv_key); 
// or
$owner_address = \Starname\Address::from_mnemonic($mnemonic);
```
```php
$results = $client->register($starname, $owner_address);
```