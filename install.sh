#! /bin/bash
clear
sudo apt-get install libsqlite3-dev zlib1g-dev libonig-dev libreadline-dev git build-essential autoconf re2c bison libxml2-dev  software-properties-common ca-certificates lsb-release apt-transport-https libxslt-dev make pkg-config libssl-dev

wget https://github.com/php/php-src/archive/refs/tags/php-8.1.13.tar.gz
tar --extract --gzip --file php-8.1.13.tar.gz
rm -f php-8.1.13.tar.gz
cd php-src-php-8.1.13
./buildconf --force

CORES=$(nproc)

./configure --enable-zts --with-zlib --enable-zip --disable-cgi \
--enable-soap --enable-intl --with-openssl --with-readline --with-curl --enable-ftp \
--enable-mysqlnd --with-mysqli --with-pdo-mysql --enable-sockets \
--enable-pcntl --with-gettext --with-gd --enable-exif \
--with-jpeg-dir --with-png-dir --with-freetype-dir --with-xsl --enable-bcmath \
--enable-mbstring --enable-calendar --enable-simplexml --enable-json --enable-hash \
--enable-session --enable-xml --enable-wddx --enable-opcache --with-pcre-regex \
--enable-cli --enable-debug --enable-fpm --with-fpm-user=www-data --with-fpm-group=www-data \
--with-mcrypt --enable-sysvmsg --enable-sysvsem --enable-sysvshm --enable-shmop \
--enable-parallel

make && sudo make -j$CORES install 2> error.txt
sudo apt-get install php8.1-dev php-pear libcurl3-openssl-dev -y
sudo pecl install parallel


cd ../
sudo rm -r ./php-src-php-8.1.13
