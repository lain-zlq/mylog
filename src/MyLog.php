<?php
namespace Zlq\Log;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MyLog{

    private $log;

    public function __construct($name, $path)
    {
        $log = new Logger($name);
        $this->log->pushHandler(new StreamHandler($path, Level::Warning));
        $this->log = $log;
    }

    public function __call($name, $arguments)
    {
        return $this->log->$name(...$arguments);
    }

}