<?php

    namespace Sockets;

    class validMessages {
        private $valid;


        public function __construct() {

            $this->valid = array(
                "SOCKET:TEST",
                "SOCKET:CHECK",
                "SOCKET:COMMAND",
                "SOCKET:FUNCTION",
                "SOCKET:FUNCTION:DO"
            );
        }

        public function pushToMessages($index, $value) {
            $this->valid[$index] = $value;
        }

        public function checkValidMessage($check) {
            if(in_array($check, $this->valid)) {
                return true;
            } else {
                return false;
            }
        }
    }