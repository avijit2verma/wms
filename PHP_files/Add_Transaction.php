<?php

//CONNECTING TO THE DATABASE
include "dbh.php";

//Taking the values from the page Add Customer...

$customerID   = $_POST['CustomerID'];
$ProductID    = $_POST['ProductID'];
$Quantity  = $_POST['Quantity'];
$TotalAmt = $_POST['TotalAmount'];
$AmtPaid = $_POST['AmountPaid'];
$BalAmt = $_POST['BalanceAmount'];
$Trans_Init_Date  = $_POST['Trans_Int_Date'];


echo $customerID."<br>";
echo $ProductID."<br>";
echo $TotalAmt."<br>";
echo $AmtPaid ."<br>";
ECHO $BalAmt."<br>";

$sql1 = "INSERT INTO transaction_information(customerID,Trans_Init_Date)
		VALUES('$customerID','$Trans_Init_Date')";
//Running the sql Query
$result = mysqli_query($conn,$sql1);

$sql2 = "INSERT INTO payments(ProductID,Quantity,Total_Amount,Trans_Init_Date)
		VALUES('$ProductID','$Quantity','$TotalAmt','$Trans_Init_Date')";

/*

//ALL THESE VALUES NEED TO BE INSERTED INTO THE DATABASE
//THE ABOVE QUESTION MARKS MEAN PREPARED STATMENTS...
//THE ABOVE IS THE SQL QUERY
$sql = "INSERT INTO Customer_Info(Customer_ID,Name,Address,Login_ID,Password)
		VALUES('$customerID','$Cname','$Address','$loginID','$password')";
//Running the sql Query
$result = mysqli_query($conn,$sql);

//header("Location:WholeSaler-Login.html");
/*
$stmt = $conn_prepare($sql);

//BIND VARIABLES
$stmt_bind_param("sssss",$customerID,$name,$Address,$loginID,$password);

//EXECUTING THE STATMENT VARIABLE
$stmt_execute();
*/
//header("Location:Add_Transaction.php");
?>
