<?php
function getDb(){
    $dsn = 'mysql:dbname=board2_db; host=127.0.0.1;charset=utf8';
    $usr = 'root';
    $passwd = '12345';

    $db = new PDO($dsn, $usr, $passwd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $db;
}