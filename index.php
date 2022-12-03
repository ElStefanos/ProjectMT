<?php
    include 'fileSystem.php';

    use CheckFiles\FileCheck;
    use DataBase\DataBase;
    use PortListener\PortListener;
    use Threads\CreateThread;
    use Threads\StartThread;

    printf("Project MT\n\n");
    printf("\nPaths: \n");
    printf(__ROOT__.PHP_EOL);
    printf(__SRC__.PHP_EOL);
    printf(__CLASSES__.PHP_EOL);
    printf(__FUNCTIONS__.PHP_EOL);
    printf(__INCLUDES__.PHP_EOL);


    
    include_once __INCLUDES__.'AutoLoader.inc.php';

    $threadTasks = array(
        "SocketListener" => __SRC__.'ThreadedTasks'.SPRTR.'socketListener.thr.php',
        "SendToSocket" => __SRC__.'ThreadedTasks'.SPRTR.'sendToSocket.thr.php'
    );

    $dataBase = new DataBase;
    $createThreads = new CreateThread;
    $checkFiles = new FileCheck;
    $conn = $dataBase->dbConnect();
    $startThreads = new StartThread($threadTasks, true);
    $startThreads->startThreadTask();
?>






