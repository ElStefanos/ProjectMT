<?php
// builder.php

$pharFile = 'MtManager-22.12.0-DEV.phar';

// clean up
if (file_exists($pharFile)) 
{
    unlink($pharFile);
}

$phar = new Phar($pharFile);

// First thing to do is to start the buffering
// otherwise no other action will be possible.
$phar->startBuffering();

// Here I get get the default stub for .phar files
// it's allowed to customize it entirely, but it's
// recommended only for advanced usage.
// I also specify my entry point (the front controller)
$defaultStub = $phar->createDefaultStub('index.php');

// Let's all the rest of the files
$phar->buildFromDirectory(__DIR__ . '/MtManager-22.12.0a');

// Customizing the stub
// What we add here allow to execute the file
// without a call to PHP with an unix OS
// *it will not work on windows* (but will not be a problem either)
$stub = "#!/usr/bin/env php \n" . $defaultStub;

// Add the stub
$phar->setStub($stub);

// Generating the file
$phar->stopBuffering();

// Some compression option are available.
// Most common are GZ and ZIP. (for many obvious reason)
// And yes, PHP do it afterwards so it must be at the end.
$phar->compressFiles(Phar::GZ);

# Make the file executable
chmod(__DIR__ . '/MtManager-22.12.0-DEV.phar', 0770);
