<?php

    namespace PortListener;


    class PortListener {
        private int $port;
        private string $host;
        private $socket;


        public function __construct($port, $host, $uptime)
        {
            $this->port = $port;
            $this->host = $host;
            $this->uptime = $uptime;
        }

        public function CreateSocket() {
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


        public function socketListen() {
            while (true) {
                socket_listen($this->socket , 10);
                $spawn = socket_accept($this->socket);
                $read = socket_read($spawn, 4096);
                printf($read.PHP_EOL);
            }
        }

        public function socketSend($socketMessage) {
           while(true) {
                sleep(1);
                $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
                socket_connect($sock, $this->host, $this->port);
                socket_write($sock, $socketMessage, 100000);
                socket_close($sock);
            }
        }
    }