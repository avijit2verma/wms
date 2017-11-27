<?php


//CONNECTING TO THE DATABASE
include "dbh.php";

//Taking the values from the page Updating Stocks...

$StockID    = $_POST['StockID1'];
//$Stockname    = $_POST['Stockname1'];
$CatID    = $_POST['CatID1'];
//$SupID    = $_POST['SupplierID1'];
//$Quantity  = $_POST['Quantity1'];
//$Price = $_POST['Price1'];
//$ROL   = $_POST['ROL1'];

if(isset($_POST('CatID1')){
	$sql = "UPDATE  product
					SET	Category = '$CatID'
					WHERE ProductID = '$StockID'";
	//Running the sql Query
	$result = mysqli_query($conn,$sql);

}
//ALL THESE VALUES NEED TO BE INSERTED INTO THE DATABASE
//THE ABOVE QUESTION MARKS MEAN PREPARED STATMENTS...
//THE ABOVE IS THE SQL QUERY

//header("Location:WholeSaler-Login.html");
/*
$stmt = $conn_prepare($sql);

//BIND VARIABLES
$stmt_bind_param("sssss",$customerID,$name,$Address,$loginID,$password);

//EXECUTING THE STATMENT VARIABLE
$stmt_execute();
*/

?>
