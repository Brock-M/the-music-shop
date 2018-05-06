<?php

$servername = 'SERVERNAME_HERE';
$username = 'USERNAME_HERE';
$password = 'PASSWORD_HERE';
$dbname = 'DBNAME_HERE';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    echo 'Connection Error '.mysqli_connect_error();
}