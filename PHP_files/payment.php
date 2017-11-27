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
                            		<li class="selected-item"><a href="#">TransactionDetails</a></li>
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


      <?php echo $_SESSION['pnum'];

      $_SESSION['pnum'] = $_SESSION['pnum'] -1;
      ?>

    <?php if($_SESSION['BILL'] == "True") {?>
      <fieldset>
      <legend><h3> Total Amount Until Now is <?php echo $_SESSION['TotalAmt'] ?></h3></legend>
      <table>
        <tr>
          <th>TransactionID</th>
          <th>ProductID</th>
          <th>ProductAmt</th>
        </tr>

          <?php while($_SESSION['pnum']>=0){ ?>
            <tr>
              <td><?php echo $_SESSION['TransID']; ?></td>
              <td><?php echo $_SESSION['ProductID'][$_SESSION['pnum']]; ?></td>
              <td><?php echo $_SESSION['PAmt'][$_SESSION['pnum'] ]; ?></td>
            </tr>
            <?php $_SESSION['pnum'] = $_SESSION['pnum'] -1; ?>
            <?php } ?>

          </table>
          </fieldset>
      <?php $_SESSION['BILL'] = "False"; ?>
		<fieldset>
					<!--YOU NEED TO WRITE AN ACTION HERE...-->
					<!--NEVER USE KEY WORDS AS THE VARIABLES AND NAMES... -->
					<legend><strong><h3>Details</h3></strong></legend>
					<form action="payment.php" method="POST">
						<p><label for="name"><strong>AmountPaid:</strong></label>
						<input type="text" name="AmtPaid" id="name"  placeholder = "AmountPaid" required/><b/></p>

						<p><label for="CustomerID">Mode-of-Payment:</label>
						<input type="text" name="Mode" id="CustomerID" placeholder= "Ex:- 1.Cash 2.Debit Card 3.Credit Card" required/><br /></p>


						<p><input type="submit" name="Confirm" class="formbutton" value="Confirm Transaction" /></p>
					</form>

		</fieldset>
    <?php }
    else if($_SESSION['BILL'] == "False"){ ?>
      <?php
            $amtpaid = $_POST['AmtPaid'];
            $mode = $_POST['Mode'];

            $conn1 = mysqli_connect("localhost","root","","WholeSale_Management");

            $sql1 = "INSERT INTO payment (Mode,Amount_Paid,TransactionID,Transaction_Date)
            VALUES('$mode','$amtpaid','".$_SESSION['TransID']."','".$_SESSION['TID']."')";

            $result2 = mysqli_query($conn1,$sql1) or die ("Error in query: $sql1. ".mysql_error($conn1));

            mysqli_close($conn1);

       ?>
        <fieldset>
          <legend><strong><h3>The Transaction is Done</h3></strong></legend>
          <form action="AddTransaction.php" method="POST">
                  <p><input type="submit" name="Completed" class="formbutton" value="Go Back to NewTransactions" /></p>
          </form>
        </fieldset>

        <fieldset>
          <form action="Logout.php" method="POST">

          <p><input type="submit" name="Logout" class="formbutton" value="logOut" /></p>

          </form>

        </fieldset>
        <?php } ?>


		</article>




			<footer class="clear">
				<p>&copy; WholeSale Business Managment by Avijit and Avinash </p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>


</body>
</html>
