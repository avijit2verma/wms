<?php
if(isset($_POST["Login"]))
{
session_start();
//The above line connects to the database of the myphpadmin
$conn = mysqli_connect("localhost","root","","WholeSale_Management");
echo "Connected to the database of the host...."."<br>";
//IF the connection doesnot connect then error message is being showed...
if (!$conn)
	{
		die("Connection is failed: ".mysqli_connect_error());
	}

//Taking the Input form  the website
$loginname = $_POST['userid'];
$loginpass = $_POST['pass'];

//echo $loginname."<br>";
//echo $loginpass."<br>";
if ($loginname == "Admin" && $loginpass == "Admin"){
	$_SESSION['Login'] = "Active";
	header("Location:WholeSaler-Login.php");
}
else {
	$sql = "SELECT * FROM customer_information WHERE CustomerID = '$loginname' and Password = '$loginpass'";

	//For getting the results of the querys
	$result = mysqli_query($conn,$sql);

	if(!$row = mysqli_fetch_assoc($result))//checks if the result has selected any of the rows...
		{
			echo "Your UserName or password is incorrect";
			$_SESSION["pass"] = "False";
			header("Location:LoginPage.php");
		}
	else
		{
			$_SESSION['Login'] = "Active";
			$_SESSION['CID']  = $row['CustomerID'];
			header("Location: CustomerLogin.php");
		}
}
//header("Location: LoginPage.htm");
}
?>
