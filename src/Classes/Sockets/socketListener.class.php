<?php

    namespace Sockets;

    class socketListener {
        private $socket;

        public function socketListen($socket) {
            $this->socket = $socket;
            while (true) {
                $read = NULL;
                socket_listen($this->socket , 10);
                $spawn = socket_accept($this->socket);
                $read = socket_read($spawn, 4096);
                if($read != NULL && $read != '' && $read != ' ') {
                    printf($read.PHP_EOL);
                }
            }
        }
    }