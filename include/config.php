<?php

$local="localhost";
$log="tpatp2";
$pas="tpatp2";
$base="tpatp2";

require_once("include/mysqldatabase.php");
require_once("include/mysqlresultset.php");

$DB = MySqlDatabase::getInstance();
try {
    $DB->connect($local, $log, $pas, $base, false, 'cp1251');
} 
catch (Exception $e) {
    die($e->getMessage());
}

//Файлы которые используют DB
require_once("include/functions.php");

?>