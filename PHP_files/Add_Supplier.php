<?php


//CONNECTING TO THE DATABASE
include "dbh.php";

//Taking the values from the page Updating Stocks...

$Name    = $_POST['Name'];
$SupplierID  = $_POST['IndustryID'];
$Phone = $_POST['Phone'];
$Address = $_POST['Address'];



echo $Name."<br>";
echo $SupplierID."<br>";
echo $Phone  ."<br>";
ECHO $Address."<br>";

//ALL THESE VALUES NEED TO BE INSERTED INTO THE DATABASE
//THE ABOVE QUESTION MARKS MEAN PREPARED STATMENTS...
//THE ABOVE IS THE SQL QUERY
$sql = "INSERT INTO supplier_information
		VALUES('$SupplierID','$Name','$Address','$Phone ')";
//Running the sql Query
$result = mysqli_query($conn,$sql);


header("Location:Add_Suppliers.php");
/*
$stmt = $conn_prepare($sql);

//BIND VARIABLES
$stmt_bind_param("sssss",$customerID,$name,$Address,$loginID,$password);

//EXECUTING THE STATMENT VARIABLE
$stmt_execute();
*/

?>
