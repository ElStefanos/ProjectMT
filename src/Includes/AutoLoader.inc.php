<?php

function LoadClass($classname) {
    $extension = ".class.php";
    $class = str_replace("\\", SPRTR, $classname);
    $fullPath = __CLASSES__.$class.$extension;
    if (file_exists($fullPath)) {

        include_once  $fullPath;

        return true;

    } else {

        return false;

        printf("Class does not exist on: ".$fullPath. "Exiting...");

        exit();

    }
}

spl_autoload_register("LoadClass");
?>