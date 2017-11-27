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
<title>Customer-Login</title>
<link rel="stylesheet" href="WholeSaler/styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
			<aside id="sidebar" class="column-left">

			<header>
				<h1><a href="#">Customer</a></h1>

				<h2>The Complete Info</h2>

			</header>
			<!--THE LEFT SIDE MENU IS DUE TO THE ABOVE CODE...!!-->
			<nav id="mainnav">
  				<ul>
                              <li><a href="CustomerLogin.php">Home</a></li>
                              <li><a href="catag.php">Category</a></li>
                              <li class="selected-item"><a href="cus_Transations.php">Transaction</a></li>
                              <li><a href="Logout.php">Logout</a></li>
          </ul>
			</nav>



			</aside>

		<section id="content" class="column-right">

	    <article>

		<blockquote><p>Customer Login contain 1.All his transactions with the WholeSaler 2.Payment Details 3.Customer detail 4.Products and different category of Products</p></blockquote>
		<p>&nbsp;</p>

		<!--	<a href="#" class="button">Read more</a>
			<a href="#" class="button button-reversed">Comments</a> -->
		<!--IN THIS FIELD WE CAN ADD THE CUSTOMER..-->
		<!--THE ABOVE CREATES THE TABLE VIEW WHICH YOU WILL BE NEEDING...-->
    <fieldset>
      <legend><strong><h3>From Date to To Date Transactions</h3></strong></legend>
      <form action="cus_Transations.php" method="POST">
        <p><label for="FDate"><strong>From Date:</strong></label>
        <input type="Date" name="FDate" id="FDate"  placeholder = "Start Date" required/><b/></p>

        <p><label for="TDate">To Date:</label>
        <input type="Date" name="TDate" id="TDate" placeholder= "Login_ID" required/><br /></p>

        <p><input type="submit" name="Show" class="formbutton" value="Show Transactions" /></p>
      </form>

    </fieldset>

    <?php
    echo $_SESSION['CID'];
    if(isset($_POST['Show']))
    {
      $fdate = $_POST['FDate'];
      $tdate = $_POST['TDate'];
    ?>

     <!--Printing the transactions from Start date to end Date-->
    <fieldset>
				<legend><h3>Customer Transactions</h3></legend>
				<table>

					<tr>
            <th>Transaction_ID</th>
						<th>Product_ID</th>
						<!--<th>Customer_ID</th>-->
						<th>Total_Amount</th>
						<th>Transaction_Date</th>
   				</tr>

					<?php

						$conn1 = mysqli_connect("localhost","root","","WholeSale_Management");
            $CID = $_SESSION['CID'];
            echo $CID;
						$sql = "SELECT transaction_detail.TransactionID AS t1,transaction_detail.ProductID AS t2,transaction_detail.Total_Amount AS t3,transaction_detail.Trans_Init_Date AS t4
             FROM transaction_detail , transaction_information
						WHERE  transaction_information.CustomerID = '$CID'
            AND transaction_detail.TransactionID = transaction_information.TransactionID
            AND transaction_detail.Trans_Init_Date>='$fdate'
            AND transaction_detail.Trans_Init_Date<='$tdate'  ";

						$result = mysqli_query($conn1,$sql);

						$row = mysqli_fetch_assoc($result);
						do { ?>


					<tr>
						<td><?php echo $row['t1']; ?></td>
						<td><?php echo $row['t2']; ?></td>
						<td><?php echo $row['t3']; ?></td>
						<td><?php echo $row['t4']; ?></td>
					</tr>

					<?php } while($row = mysqli_fetch_assoc($result)) ?>

          <?php
              $conn = mysqli_connect("localhost","root","","WholeSale_Management");
              $sql = $sql = "SELECT SUM(transaction_detail.Total_Amount) AS t6
               FROM transaction_detail, transaction_information
  						WHERE  transaction_information.CustomerID = '$CID'
              AND transaction_detail.TransactionID = transaction_information.TransactionID
              AND transaction_detail.Trans_Init_Date>='$fdate'
              AND transaction_detail.Trans_Init_Date<='$tdate'  ";

              $result1 = mysqli_query($conn,$sql);
              $row = mysqli_fetch_assoc($result1);

               ?>
               <p>The Total Amount you Spent from <?php echo $fdate  ?> to <?php echo $tdate ?> is <?php echo $row['t6'] ?> </p>
          <?php } ?>




				</table>
		</fieldset>
				<p>&nbsp;</p>
        <br><br><br><br>

		</article>


</p>
			<footer class="clear">
				<p>&copy; WholeSale Business Managment by Avijit and Avinash</p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>


</body>
</html>
