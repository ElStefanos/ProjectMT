<?php

    namespace Sockets;

    class communicatorSocket {
        private int $port;
        private string $host;

        public function __construct($port, $host) {
            $this->port = $port;
            $this->host = $host;
        }

        public function socketSend($socketMessage) {
            $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            socket_connect($sock, $this->host, $this->port);
            socket_write($sock, $socketMessage, 1024);
            socket_close($sock);
        }
    }