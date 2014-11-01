<?php
// this is a very simple example of how to use the devedge/xmlrpc-server classes
// for simple trying out this can be run with the php buildin server: "php -S localhost:8100 -t public/"
// but keep in mind that php's build-in server is not meant for production

// use autoloading for the composer stuff
require_once "../vendor/autoload.php";

// create the the service class that will execute the logic
$service = new Devedge\Example\Server\ExampleService();

// create the server instance
$server = new Devedge\XmlRpc\Server();

// register a simple handler, which contains the service, for namespace "example"
$server->registerHandler(new Devedge\XmlRpc\Server\Handlers\SimpleHandler($service, "example"));

// lets be nice and set an xml content header
header("Content-Type: text/xml");

// execute the handling of the request, and echo the response
echo $server->handle(file_get_contents('php://input'));
