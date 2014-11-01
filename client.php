<?php

require_once "vendor/autoload.php";

// create a client for the url suggested to have the server in public/server run under,
// using the same namespace 'example' that the handler on the serverside is registered for
$client = new \Devedge\XmlRpc\Client("http://localhost:8100/server.php", 'example');


// hello world! (default param1)
var_dump($client->invokeRpcCall("sayHello",[]));

// hello user! (first param == user)
var_dump($client->invokeRpcCall("sayHello",["user"]));