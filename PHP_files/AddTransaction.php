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
                            		<li><a href="WholeSaler-Login.php">Home</a></li>
																<li class="selected-item"><a href="Add _Transaction.php">New Transaction</a></li>
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
				<legend><strong>NEW TRANSACTION</strong></legend>
					<form action="Multi_products.php" method="POST">

						<p><label for="CustomerID">Customer-ID:</label>
						<input type="text" name="CustomerID" id="CustomerID" Placeholder="CustomerID" required/><br /></p>

            <p><label for="hmany">How-Many:</label>
            <input type="integer" name="Howmany" id="hmany" Placeholder="How Many Products"  required /><br /></p>

						<p><label for="Tran_Int_Date">Tran_Int_Date</label>
						<input type = "Date"  name="Trans_Int_Date" id="BalanceAmount" placeholder="BalanceAmount" required></input><br /></p>

						<p><input type="submit" name="send" class="formbutton" value="Add Transaction" /></p>
            <?php $_SESSION['TI'] = "Active";
                    $_SESSION['TotalAmt'] = 0;
                    $_SESSION['PAmt'] = array();
             ?>
      		</form>
    </fieldset>
<br><br><br><br><br><br><br>
		</article>





			<footer class="clear">
				<p>&copy; WholeSale Business Managment by Avijit and Avinash</p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>


</body>
</html>
