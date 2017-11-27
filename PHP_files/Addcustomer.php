<?php


//CONNECTING TO THE DATABASE
$conn = mysqli_connect("localhost","root","","WholeSale_Management");
echo "Connected to the database of the host...."."<br>";
//IF the connection doesnot connect then error message is being showed...
if (!$conn)
	{
		die("Connection is failed: ".mysqli_connect_error());
	}

//$mysqli  = new mysqli("localhost","root","","WholeSale_Managment");

//Taking the values from the page Add Customer...
$Cname = $_POST['Cname'];
$customerID   = $_POST['CustomerID'];
$Phone    = $_POST['Phone'];
$password  = $_POST['Password'];
$Address = $_POST['Address'];

echo $Cname."<br>";
echo $customerID."<br>";
echo $Phone."<br>";
echo $password."<br>";
echo $Address."<br>";


//ALL THESE VALUES NEED TO BE INSERTED INTO THE DATABASE
//THE ABOVE QUESTION MARKS MEAN PREPARED STATMENTS...
$sql = "INSERT INTO Customer_information(CustomerID,Name,Address,Phone,Password)
		VALUES('$customerID','$Cname','$Address','$Phone','$password')";

//Running the sql Query
$result = mysqli_query($conn,$sql) or die("Error: $sql. ".mysql_error($conn));


/*
$sql = "INSERT INTO Customer_Info(Customer_ID,Name,Address,Login_ID,Password)
		VALUES(?,?,?,?,?)";
//Creating the prepared statment
$stmt = $mysqli_prepare ("INSERT INTO Customer_Info(Customer_ID,Name,Address,Login_ID,Password)
		VALUES(?,?,?,?,?)");
//BIND VARIABLES
$stmt_bind_param("sssss",$customerID,$name,$Address,$loginID,$password);

//EXECUTING THE STATMENT VARIABLE
$stmt_execute();
*/
//$stmt->bint_result($abc,$asd);
header("Location:WholeSaler-Login.php");
?>
