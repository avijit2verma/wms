<?php

$conn = mysqli_connect("localhost","root","","WholeSale_Management");
echo "Connected to the database of the host...."."<br>";
//IF the connection doesnot connect then error message is being showed...
if (!$conn)
	{
		die("Connection is failed: ".mysqli_connect_error());
	}
?>
