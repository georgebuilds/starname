1) Install the iovnscli CLI tool
2) Install composer package
    composer require georgebuilds/starname
3) Use

$client = new \Starname\Client($address);

// Perform a name service lookup
$lookup_results = $client->lookup("*georgebuilds");

// Retrieve asset address for a given starname
$lookup_results = $client->lookup("*georgebuilds", "btc);

// Perform a reverse lookup
$reverse_lookup_results = $client->reverse_lookup("star1bs9y08ec....");

// Register a starname
$owner_address = new Address($pub_key, $priv_key);