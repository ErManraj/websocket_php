<?php 
 $host = 'localhost';
 $dbname = 'testing';
 $username1a = 'root';
 $password1a = '';
 $charset = 'utf8';
 $collate = 'utf8_unicode_ci';

 $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username1a, $password1a,
     array(
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_PERSISTENT => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
     )
);

 
 
?>