
<?php

/* mysql://bf05ca120624fb:181ac24a@us-cdbr-east-02.cleardb.com/heroku_4e956cc525a6de9?reconnect=true */
$servername ="localhost";
$username ="root";
$password="";
$dbconnect="update_data";


// create a connection with database 

$connect = mysqli_connect($servername,$username,$password,$dbconnect) or die();


// check connection with database

if (!$connect)
{
	die("connection failed:".mysqli_connect_error());
}


?>

					
