<?php
    use PortListener\PortListener;
    $portListener = new PortListener(3609, "192.168.1.24", 10000);
    $sock = $portListener->CreateSocket();
    $portListener->socketListen();
?>