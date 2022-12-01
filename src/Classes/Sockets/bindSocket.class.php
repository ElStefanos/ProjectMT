<?php

namespace Sockets;

class bindSocket {

    private int $port;
    private string $host;
    private $socket;

    public function __construct($port, $host) {
        $this->port = $port;
        $this->host = $host;
    }

    public function bindSocket() {
        $stamp = '[IMPORTANT]['.strtoupper(date('D, d M Y H:i:s')).'] ';
        if (($this->socket = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'))) === false) {
            echo "\033[31m".$stamp."socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n\033[0m";
        }
        
        if (socket_bind($this->socket, $this->host, $this->port) === false) {
            echo "\033[31m".$stamp."socket_bind() failed: reason: " . socket_strerror(socket_last_error($this->socket)) . "\n\033[0m";
        }
        
        if (socket_listen($this->socket, 5) === false) {
            echo "\033[31m".$stamp."socket_listen() failed: reason: " . socket_strerror(socket_last_error($this->socket)) . "\n\033[0m";
        }

        return $this->socket;
    }

}