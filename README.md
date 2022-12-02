# Mt-Manager

This is advanced software for hosting automatization. Built for usage with "Apache" and "MySql"

# REQUIREMENTS

___Needed before or after installation:___
1. Apache

___Needed before installation:___

1. MySQL Database

2. PHPMyAdmin (Optional)


# SETUP

1. Extract to desired diretory
2. Open terminal and run ```cd <directory>```
3. Follow the steps bellow


### ON FIRST RUN

___Run in the terminal:___
```
sudo chmod +x ./install.sh
sudo chmod +x ./build.sh
sudo chmod +x ./start.sh
```
___Then:___
```
sudo ./install.sh
```
Wait for PHP to build
Message will be shown on complete. After that build process for MtManager will automatically start. If you want to contribute to the project. We suggest to make a second copy of the directory.

### ON UPDATE

___Run in the terminal:___
```
sudo chmod +x ./build.sh
sudo chmod +x ./start.sh
```
___Then:___
```
sudo ./build.sh
```
After building is complete.

**Replace old "start.sh" with the new one. Also replace old ".phar" file with the new one.**

### AFTER BUILDING

___Run in the terminal:___
```
sudo ./start.sh
```
