<?php
namespace Devedge\Example\Server;

class ExampleService
{
    public function sayHello($name = "world")
    {
        return "hello $name!";
    }

    public function throwException()
    {
        // this should be converted to a fault!
        throw new \Exception("example exception", 1);
    }
}