<?php

require_once "vendor/autoload.php";

// create a client for the url suggested to have the server in public/server run under,
// using the same namespace 'example' that the handler on the serverside is registered for
$client = new \Devedge\XmlRpc\Client("http://localhost:8100/server.php", 'example');


// hello world! (default param1)
echo $client->invokeRpcCall("sayHello",[]) . "\n";

// hello user! (first param == user)
echo $client->invokeRpcCall("sayHello",["user"]) . "\n";


// lets fetch an exception..
try {
    $client->invokeRpcCall("throwException");
} catch (\Devedge\XmlRpc\Client\RemoteException $e) {
    echo "caught exception: (" . $e->getMessage() .")\n";
}

// alright, tunk invokeRpcCall is ugly, and there might be a nicer solution? You are Right,
// use MagicClient instead of Client
$client = new \Devedge\XmlRpc\MagicClient("http://localhost:8100/server.php", 'example');

// magic client allows you to call the methods on your servers service by using the magic __call method.
echo $client->sayHello("magic") . "\n";

// a disadvantage of this is that your IDE probably marks "sayHello" as unknown method. The simple solution
// for that is to extend MagicClient with an own class (in this example, its the ExampleMagic class),
// and annotate the method there (at least that works for PhpStorm, not sure about all other IDE.
$client = new \Devedge\Example\Client\ExampleMagic("http://localhost:8100/server.php", 'example');

// this should not be marked as missing method
echo $client->sayHello("my magic");
