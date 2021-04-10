<?php

$dbhost = "mysql";
$dbuser = "root";
$dbpass = "root";
$dbname = "login";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
