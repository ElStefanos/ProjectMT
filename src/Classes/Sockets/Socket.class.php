<?php

    namespace Sockets;

    use Sockets\{communicatorSocket, bindSocket, socketListener};

    class Socket {
        private int $port;
        private string $host;
        private $socket;
        private $comm;
        private $bind;
        private $listener;

        
        public function __construct($port, $host)
        {
            $this->port = $port;
            $this->host = $host;
            $this->bind = new bindSocket($this->port, $this->host);
            $this->comm = new communicatorSocket($this->port, $this->host);
            $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            $this->listener = new socketListener($this->port, $this->host);
        }

        public function socketListener() {
            $this->socket = $this->bind->bindSocket();
            $this->listener->socketListen($this->socket);
        }

        public function socketMessenger($socketMessage) {
            $this->comm->socketSend($socketMessage);
        }       
    }
    