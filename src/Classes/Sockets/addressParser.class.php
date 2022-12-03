<?php

    namespace Sockets;


    class addressParser {
        private string $host;
        private $ipFromConnection;

        public function getHostName() {
            $this->host = getHostByName(getHostName()); 
            return $this->host;
        }

        public function getIpConnectedSocket($socket) {
            socket_getpeername($socket, $host, $port) or die("error retrieving remote address");
            return $this->ipFromConnection = $host.":".$port;
        }

    }