<?php

//if using a webserver check the server & use that
$dbhost = "localhost";
$dbuser = "root";  //default user
$dbpass = "";  //no passowrd since using localhost
$dbname = "login_sample_db";

//error checking
if (!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("failed to connect!");
}

//bookings database connection
mysqli_connect('localhost','root','','login_sample_db'); 
//mysqli_select_db('bookings'); 