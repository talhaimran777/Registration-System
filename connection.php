<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "gymregistrationsystem";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$con){
    die("Could not connect to the database!");
}