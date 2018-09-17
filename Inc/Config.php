<?php
session_start();
error_reporting(E_ALL);

define('SITENAME','MySQLi, PHP with OOPs Concept | Advanced Code Finder');
define('SITEEMAIL','acodefinder@gmail.com');
define('SITEURL','http://www.acodefinder.com');
define('SITEROOT',$_SERVER['DOCUMENT_ROOT']);
define('APPROOT','/MySQLi-PHP-with-OOPs-Concept/');

//Database Information
define( 'DBHOST', 'localhost' );
define( 'DBUSER', 'php_mysqli' );
define( 'DBPWD', 'root' );
define( 'DBNAME', 'php_mysqli_oops' );
?>