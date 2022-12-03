<?php

    namespace Sockets;

    use Sockets\{addressParser, validMessages};

    class socketListener {
        private $socket;
        private $host;
        private $port;
        private $validate;
        private $parser;
        private $address;

        public function __construct($port, $host)
        {
            $this->host = $host;
            $this->port = $port;
            $this->validate = new validMessages;
            $this->parser = new addressParser;
        }

        public function socketListen($socket)
        {
            $this->socket = $socket;
            print("SOCKET: Listening on: ".$this->host.":".$this->port."\n");
            while (true) {

                $read = NULL;

                socket_listen($this->socket , 10);

                $spawn = socket_accept($this->socket);
                
                $this->address = $this->parser->getIpConnectedSocket($spawn, $this->host);

                $read = socket_read($spawn, 1024);

                print("SOCKET CONNECTION ESTABLISHED WITH ".$this->address."\n");

                if($this->validate->checkValidMessage($read)) {
                    print("SOCKET MESSAGE->".$read.PHP_EOL);
                }

                socket_close($spawn);
                print("SOCKET CONNECTION CLOSED WITH ".$this->address."\n");
            }
        }
    }