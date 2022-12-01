<?php
    use PortListener\PortListener;
    $socket = new PortListener(3609, "192.168.1.24", 10000);
    $socket->socketSend("This is a test");
?>