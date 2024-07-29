<?php
 function pdo_connect_mysql(){   //establish a connection to the database PDO - php data objects
    $DATABASE_HOST = 'localhost'; //
    $DATABASE_USER = 'root'; //
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'scholardb';

    try {
        return new PDO('mysql:host='. $DATABASE_HOST.';dbname='.$DATABASE_NAME.';',$DATABASE_USER,$DATABASE_PASS);

    } catch (\PDOException $exception) {
        exit('connection failed');
        //throw $th;
    }
 }
 ?> 