<?php

require_once "vendor/autoload.php";

// create a client for the url suggested to have the server in public/server run under,
// using the same namespace 'example' that the handler on the serverside is registered for
$client = new \Devedge\XmlRpc\Client("http://localhost:8100/server.php", 'example');


// hello world! (default param1)
echo $client->invokeRpcCall("sayHello",[]) . "\n";

// hello user! (first param == user)
echo $client->invokeRpcCall("sayHello",["user"]) . "\n";

try {
    $client->invokeRpcCall("throwException");
} catch (\Devedge\XmlRpc\Client\RemoteException $e) {
    echo "caught exception: (" . $e->getMessage() .")\n";
}
