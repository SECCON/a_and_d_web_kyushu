# Vulnerable Web App for Attack and Defense

## Required

- PHP 5.4
- MySQL
- composer
- compass

## Setup

create database user and database. default setting is adweb3/adweb3.

``` shell
$ git clone --recursive git@github.com:SECCON/a_and_d_web_kyushu.git
$ composer install
$ php artisan migrate
$ php artisan db:seed
```