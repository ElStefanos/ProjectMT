#!/bin/bash


last=$(tail -1 lista_usera)

sudo useradd -m $last -d /home/$last -s /bin/bash 
