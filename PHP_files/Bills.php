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
                            		<li ><a href="WholeSaler-Login.php">Home</a></li>
																<li><a href="AddTransaction.php">New Transaction</a></li>
																<li> <a href="AllTransactions.php">All Transactions</a></li>
                                <li> <a href="AllStocks.php">All Stocks</a></li>
																<li><a href="Depleted_Stock.php">Depleted Stocks</a></li>
                                <li> <a href="AddCategory.php">Add category</a></li>
                            		<li><a href="Update_Stocks.php">Add or Update Stocks</a></li>
                            		<li><a href="Add_Suppliers.php">Add or Update Supplier</a></li>
																<li class="selected-item"><a href="Bills.php">Orders</a></li>
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
					<legend><strong><h3>Bills for the transaction</h3></strong></legend>
					<form action="Bills.php" method="POST">
						<p><label for="name"><strong>TransactionID:</strong></label>
						<input type="interger" name="TransID" id="name"  placeholder = "Order-ID" required/><b/></p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

						<p><input type="submit" name="show" class="formbutton" value="Show" /></p>

					</form>

		</fieldset>
    <?php if(isset($_POST['show']))
    {
      $TransID = $_POST['TransID'];?>
		<fieldset>
		<legend><strong><h3>Bill for TransactionID:<?php echo $TransID ?> </h3></strong></legend>
		<table>
			<tr>
				<th>TransactionID</th>
				<th>CustomerName</th>
				<th>ProductName</th>
        <th>Quantity</th>
				<th>ProductAmt</th>
        <th>TotalAmt</th>
			</tr>
			<?php
				$conn = mysqli_connect("localhost","root","","WholeSale_Management");
				$sql = "SELECT transaction_information.TransactionID AS t1 ,customer_information.Name AS t2 ,product.Pname AS t3,transaction_detail.Quantity AS t4,transaction_detail.Total_Amount AS t5,payment.Amount_Paid AS t6
        FROM transaction_detail,payment,transaction_information,customer_information,product
        WHERE transaction_detail.TransactionID = transaction_information.TransactionID
        AND  transaction_detail.TransactionID = payment.TransactionID
        AND customer_information.CustomerID = transaction_information.CustomerID
        AND product.ProductID = transaction_detail.ProductID
        AND transaction_detail.TransactionID ='$TransID' ";
				$result = mysqli_query($conn,$sql);




				$row = mysqli_fetch_assoc($result);
				do { ?>


			<tr>
				<td><?php echo $row['t1']; ?></td>
				<td><?php echo $row['t2']; ?></td>
				<td><?php echo $row['t3']; ?></td>
				<td><?php echo $row['t4']; ?></td>
				<td><?php echo $row['t5']; ?></td>
        <td><?php echo $row['t6']; ?></td>

			</tr>
			<?php } while($row = mysqli_fetch_assoc($result)) ?>
			<tr>
		</table>
	</fieldset>

  <?php } ?>
  <br><br><br><br><br><br>
		</article>




			<footer class="clear">
				<p>&copy; WholeSale Business Managment by Avijit and Avinash </p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>


</body>
</html>
