<?php
    use Sockets\Socket;
    $socket = new Socket(3609, "192.168.1.24");
    $socket->socketMessenger("SOCKET:TEST");
?>