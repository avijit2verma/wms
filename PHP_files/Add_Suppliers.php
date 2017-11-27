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
                            		<li> <a href="WholeSaler-Login.php">Home</a></li>
																<li> <a href="AddTransaction.php">New Transaction</a></li>
																<li> <a href="AllTransactions.php">All Transactions</a></li>
                                <li> <a href="AllStocks.php">All Stocks</a></li>
																<li><a href="Depleted_Stock.php">Depleted Stocks</a></li>
                                <li> <a href="AddCategory.php">Add category</a></li>
                            		<li> <a href="Update_Stocks.php">Add or Update Stocks</a></li>
                            		<li class="selected-item"> <a href="Add_Suppliers.php">Add or Update Supplier</a></li>
																<li><a href="Bills.php">Orders</a></li>
																<li> <a href="Logout.php">Logout</a></li>
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
				<legend><strong>NEW Supplier</strong></legend>
					<form action="Add_Supplier.php" method="Post">

						<p><label for="Name">Name:</label>
						<input name="Name" id="Name" required></input><br /></p>

						<p><label for="IndustryID">Supplier-ID:</label>
						<input type="integer" name="IndustryID" id="IndustryID" value="" required/><br /></p>

						<p><label for="Phone">Phone:</label>
						<input type="text" name="Phone" id="Phone" value=""  required/><br /></p>

						<p><label for="Address">Address:</label>
						<textarea cols="60" rows="8" name="Address" id="Address"></textarea><br /></p>

						<p><input type="submit" name="send" class="formbutton" value="Send" /></p>

					</form>


		</fieldset>

  </fieldset>

  <fieldset>
        <!--YOU NEED TO WRITE AN ACTION HERE...-->
      <legend><strong>Suppliers</strong></legend>

      <table>

        <tr>
          <th>SupplierID</th>
          <th>SName</th>
          <th>Phone</th>
          <th>Address</th>
        </tr>

        <?php
          $conn = mysqli_connect("localhost","root","","WholeSale_Management");
          $sql = "SELECT * FROM supplier_information ";

          $result = mysqli_query($conn,$sql) or die ("Error in query: $sql. ".mysql_error($conn));

          $row = mysqli_fetch_assoc($result);
          do { ?>


        <tr>
          <td><?php echo $row['SupplierID']; ?></td>
          <td><?php echo $row['SName']; ?></td>
          <td><?php echo $row['Phone']; ?></td>
          <td><?php echo $row['Address']; ?></td>
        </tr>

        <?php } while($row = mysqli_fetch_assoc($result)) ?>

      </table>


  </fieldset>

</fieldset>
  <fieldset>
        <!--YOU NEED TO WRITE AN ACTION HERE...-->
      <legend><strong>UPDATE SUPPLIER NAME</strong></legend>
        <form action="Add_Suppliers.php" method="POST">

          <p><label for="SupplierID1">SupplierID:</label>
          <input type="integer" name="SupplierID1" id="SupplierID1" value=""  required/><br /></p>

          <p><label for="SupName">SupplierName:</label>
          <input type="integer" name="SupName" id="SupName" value="" required /><br /></p>

          <p><input type="submit" name="UpdateSup" class="formbutton" value="Update" /></p>

    </form>
    <?php if(isset($_POST['UpdateSup'])) {

      $SupplierID   = $_POST['SupplierID1'];
      $SupName = $_POST['SupName'];

      $conn = mysqli_connect("localhost","root","","WholeSale_Management");

      $sql  = "UPDATE supplier_information
                SET SName = '$SupName'
                WHERE SupplierID = '$SupplierID' ";


            $result = mysqli_query($conn,"UPDATE supplier_information SET SName = '$SupName' WHERE SupplierID = '$SupplierID' ");

    }?>
</fieldset>

<fieldset>
      <!--YOU NEED TO WRITE AN ACTION HERE...-->
    <legend><strong>UPDATE SUPPLIER PHONE</strong></legend>
      <form action="Add_Suppliers.php" method="POST">

        <p><label for="SupplierID2">SupplierID:</label>
        <input type="integer" name="SupplierID2" id="SupplierID2" value=""  required/><br /></p>

        <p><label for="SupNamePh">SupplierPhone:</label>
        <input type="integer" name="SupNamePh" id="SupNamePh" value="" required /><br /></p>

        <p><input type="submit" name="UpdateSupPh" class="formbutton" value="Update" /></p>

  </form>
  <?php if(isset($_POST['UpdateSupPh'])) {

    $SupplierID   = $_POST['SupplierID2'];
    $SupNamePh = $_POST['SupNamePh'];

    $conn = mysqli_connect("localhost","root","","WholeSale_Management");

    $sql  = "UPDATE supplier_information
              SET Phone = '$SupNamePh'
              WHERE SupplierID = '$SupplierID' ";


          $result = mysqli_query($conn,$sql);

  }?>
</fieldset>
		</article>





			<footer class="clear">
				<p>&copy; WholeSale Business Managment by Avijith and Avinash</p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>


</body>
</html>
