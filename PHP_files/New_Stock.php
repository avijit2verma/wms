<?php


//CONNECTING TO THE DATABASE
include "dbh.php";

//Taking the values from the page Updating Stocks...

$StockID    = $_POST['StockID'];
$Stockname    = $_POST['Stockname'];
$CatID    = $_POST['CatID'];
$SupID    = $_POST['SupplierID'];
$Quantity  = $_POST['Quantity'];
$Cost= $_POST['Cost'];
$sell = $_POST['sell'];
$ROL   = $_POST['ROL'];

echo $sell;

//ALL THESE VALUES NEED TO BE INSERTED INTO THE DATABASE
//THE ABOVE QUESTION MARKS MEAN PREPARED STATMENTS...
//THE ABOVE IS THE SQL QUERY
$sql = "INSERT INTO product	VALUES('$StockID','$Stockname','$CatID','$SupID','$Quantity','$Cost','$ROL')";
//Running the sql Query
$result = mysqli_query($conn,$sql);

$sql1 = "INSERT INTO price_list VALUES('$StockID','$sell')";
$result = mysqli_query($conn,$sql1);

header("Location:Update_Stocks.php");
/*
$stmt = $conn_prepare($sql);

//BIND VARIABLES
$stmt_bind_param("sssss",$customerID,$name,$Address,$loginID,$password);

//EXECUTING THE STATMENT VARIABLE
$stmt_execute();
*/

?>
