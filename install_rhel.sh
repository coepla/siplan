#!/bin/bash
clear
echo "Instalación de SIPLAN 2017 - RedHat Linux/Centos"
echo "Actualizando Sistema"
yum clean all
yum update -y
yum upgrade -y
echo "Instalando Apache Server"
yum install -y httpd
yum install -y php
echo "Instalando SIPLAN"
yum install -y git
mkdir /var/www/html/siplan
