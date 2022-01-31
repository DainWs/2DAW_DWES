<?php

namespace src\libraries;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LogManager {
    private Logger $logger;
    private StreamHandler $handler;

    public function __construct(String $class) {
        $this->logger = new Logger("[$class]");
        $this->handler = new StreamHandler($this->getFile(), Logger::DEBUG);

        $this->logger->pushHandler($this->handler);
    }

    public function log(String $message, $level = Logger::DEBUG)  {
        $this->logger->log($level, '['.((session_id()) ? session_id() : 'UNKNOWN')."] $message");
    }

    private function getFile(): string {
        return $_SERVER['APP_BASE_PATH'].'/logs/'.date('d-m-Y').'.log';
    }
}