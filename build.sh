#!/bin/bash

clear

sudo mv ./php.ini /usr/local/lib/php.ini

mkdir MtManager-22.12.0a

mv ./src ./MtManager-22.12.0a/src

mv ./fileSystem.php ./MtManager-22.12.0a/fileSystem.php

mv ./index.php ./MtManager-22.12.0a/index.php

sudo php build.php

echo "Build complete"
sleep 2
echo "Cleaning up..."

sudo rm build.php

sudo rm install.sh

sudo rm -r ./MtManager-22.12.0a

sudo chmod o+x MtManager-22.12.0-DEV.phar

sudo rm start-dev.sh
sudo rm ./build.sh
