<?php
session_start();
if($_SESSION['Login']!="Active")
{
    header("location:loginPage.php");
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>WholeSaler-Login</title>
<link rel="stylesheet" href="WholeSaler/styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
			<aside id="sidebar" class="column-left">

			<header>
				<h1><a href="#">WholeSaler</a></h1>

				<h2>The Complete Info</h2>

			</header>
			<!--THE LEFT SIDE MENU IS DUE TO THE ABOVE CODE...!!-->
			<nav id="mainnav">
  				<ul>
                            		<li class="selected-item"><a href="WholeSaler-Login.php">Home</a></li>
																<li><a href="AddTransaction.php">New Transaction</a></li>
																<li> <a href="AllTransactions.php">All Transactions</a></li>
																<li> <a href="AllStocks.php">All Stocks</a></li>
																<li><a href="Depleted_Stock.php">Depleted Stocks</a></li>
																<li> <a href="AddCategory.php">Add category</a></li>
                            		<li><a href="Update_Stocks.php">Add or Update Stocks</a></li>
                            		<li><a href="Add_Suppliers.php">Add or Update Supplier</a></li>

																<li><a href="Bills.php">Orders</a></li>
																<li><a href="Logout.php">Logout</a></li>
          </ul>
			</nav>



			</aside>

		<section id="content" class="column-right">

	    <article>

		<blockquote><p>WholeSalerlogin contain 1.Add Customer 2.Add Transaction 3.Depleted Stocks 4.Profits for every month 5.Defaulters Table 6. Updating the stocks 7.Adding about the buyer</p></blockquote>
		<p>&nbsp;</p>

		<!--	<a href="#" class="button">Read more</a>
			<a href="#" class="button button-reversed">Comments</a> -->
		<!--IN THIS FIELD WE CAN ADD THE CUSTOMER..-->
		<fieldset>
					<!--YOU NEED TO WRITE AN ACTION HERE...-->
					<!--NEVER USE KEY WORDS AS THE VARIABLES AND NAMES... -->
					<legend><strong><h3>NEW CUSTOMER</h3></strong></legend>
					<form action="Addcustomer.php" method="POST">
						<p><label for="name"><strong>Name:</strong></label>
						<input type="text" name="Cname" id="name"  placeholder = "Name" required/><b/></p>

						<p><label for="CustomerID">Customer-ID:</label>
						<input type="text" name="CustomerID" id="CustomerID" placeholder= "Login_ID" required/><br /></p>

						<p><label for="Phone">Phone-No:</label>
						<input type="text" name="Phone" id="Phone" placeholder="Phone-No"   required/><br /></p>

						<p><label for="password">Password:</label>
						<input type="password" name="Password" id="password" placeholder="**********" required/><br /></p>

						<p><label for="Address">Address:</label>
						<textarea cols="60" rows="8" name="Address" id="Address" placeholder="XYZ Area,Home town, street"required></textarea><br /></p>

						<p><input type="submit" name="Add" class="formbutton" value="Add Customer" /></p>
					</form>

		</fieldset>
		<fieldset>
		<legend><strong><h3>All Customers</h3></strong></legend>
		<table>
			<tr>
				<th>CustomerID</th>
				<th>Name</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Password</th>
			</tr>
			<?php
				$conn = mysqli_connect("localhost","root","","WholeSale_Management");
				$sql = "SELECT * FROM Customer_information";
				$result = mysqli_query($conn,$sql) or die("Error: $sql. ".mysql_error($conn));

				$row = mysqli_fetch_assoc($result);
				do { ?>


			<tr>
				<td><?php echo $row['CustomerID']; ?></td>
				<td><?php echo $row['Name']; ?></td>
				<td><?php echo $row['Address']; ?></td>
				<td><?php echo $row['Phone']; ?></td>
				<td><?php echo $row['Password']; ?></td>
			</tr>
			<?php } while($row = mysqli_fetch_assoc($result)) ?>
			<tr>
		</table>
	</fieldset>
		</article>




			<footer class="clear">
				<p>&copy; WholeSale Business Managment by Avijit and Avinash </p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>


</body>
</html>
