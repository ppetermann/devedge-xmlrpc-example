<?php
namespace Devedge\Example\Server;

class ExampleService
{
    public function sayHello($name = "world")
    {
        file_put_contents("/tmp/test.txt", print_r($name, true), FILE_APPEND);
        return "hello $name!";
    }
}