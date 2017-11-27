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
                            		<li class="selected-item"> <a href="Update_Stocks.php">Add or Update Stocks</a></li>
                            		<li> <a href="Add_Suppliers.php">Add or Update Supplier</a></li>
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
				<legend><strong>NEW STOCK</strong></legend>
					<form action="New_Stock.php" method="post">

						<p><label for="StockID">Product-ID:</label>
						<input type="integer" name="StockID" id="StockID" value="" required/><br /></p>

						<p><label for="Stockname">Product-Name:</label>
						<input type="integer" name="Stockname" id="Stockname" value="" required/><br /></p>

						<p><label for="CatID">Catagory-ID:</label>
						<input type="integer" name="CatID" id="CatID" value="" required/><br /></p>

						<p><label for="SupID">Supplier-ID:</label>
						<input type="integer" name="SupplierID" id="SupID" value="" required/><br /></p>

						<p><label for="Quantity">Quantity:</label>
						<input type="integer" name="Quantity" id="Quantity" value="" required/><br /></p>

						<p><label for="Price">Cost Price:</label>
						<input type="integer" name="Cost" id="Price" value="" required/><br /></p>

            <p><label for="PriceSold">Selling Price:</label>
						<input type="integer" name="sell" id="PriceSold" value="" required/><br /></p>

						<p><label for="ROL">Re-Order-Level:</label>
						<input type="integer" name="ROL" id="ROL" value="" required/><br /></p>

						<p><input type="submit" name="send" class="formbutton" value="Add" /></p>

					</form>


		</fieldset>

		<fieldset>
					<!--YOU NEED TO WRITE AN ACTION HERE...-->
				<legend><strong>UPDATE STOCK QUANTITY</strong></legend>
					<form action="Update_Stocks.php" method="POST">

						<p><label for="Stock-ID1">Stock-ID:</label>
						<input type="integer" name="Stock-ID1" id="Stock-ID1" value=""  required/><br /></p>

            <p><label for="Quantity1">Quantity:</label>
						<input type="integer" name="Quantity1" id="Quantity1" value="" required /><br /></p>

            <p><input type="submit" name="UpdateQ" class="formbutton" value="ADD_Quantity" /></p>

      </form>
      <?php if(isset($_POST['UpdateQ'])) {

        $StockID    = $_POST['Stock-ID1'];
        $Quantity = $_POST['Quantity1'];

        $conn = mysqli_connect("localhost","root","","WholeSale_Management");

        $sql  = "UPDATE product
                  SET Quantity_in_stock = Quantity_in_stock +'$Quantity'
                  WHERE ProductID = '$StockID' ";


              $result = mysqli_query($conn,$sql);

      }?>

      <fieldset>
  					<!--YOU NEED TO WRITE AN ACTION HERE...-->
  				<legend><strong>UPDATE STOCK COST</strong></legend>
  					<form action="Update_Stocks.php" method="POST">

  						<p><label for="Stock-ID2">Stock-ID:</label>
  						<input type="integer" name="Stock-ID2" id="Stock-ID2" value=""  required/><br /></p>

              <p><label for="Cost1">Cost:</label>
  						<input type="integer" name="Cost1" id="Cost1" value=""  required/><br /></p>

              <p><input type="submit" name="UpdateC" class="formbutton" value="UpdateC" /></p>

        </form>
        <?php if(isset($_POST['UpdateC'])) {

          $StockID    = $_POST['Stock-ID2'];
          $UnitPrice = $_POST['Cost1'];

          $conn = mysqli_connect("localhost","root","","WholeSale_Management");

          $sql  = "UPDATE product
                    SET  UnitPrice = '$UnitPrice'
                    WHERE ProductID = '$StockID' ";
              $result = mysqli_query($conn,$sql);
      }?>

  		</fieldset>

		</fieldset>

          <fieldset>
      					<!--YOU NEED TO WRITE AN ACTION HERE...-->
      				<legend><strong>UPDATE STOCK SELL</strong></legend>
      					<form action="Update_Stocks.php" method="POST">

      						<p><label for="Stock-ID3">Stock-ID:</label>
      						<input type="integer" name="Stock-ID3" id="Stock-ID3" value=""  required/><br /></p>

                  <p><label for="Sell Price1">Sell Price:</label>
      						<input type="integer" name="SellPrice1" id="Sell Price1" value=""  required/><br /></p>

                  <p><input type="submit" name="UpdateS" class="formbutton" value="UpdateS" /></p>

            </form>
            <?php if(isset($_POST['UpdateS'])) {

              $StockID    = $_POST['Stock-ID3'];
              $SellPrice = $_POST['SellPrice1'];

              $conn = mysqli_connect("localhost","root","","WholeSale_Management");

              $sql  = "UPDATE price_list
                        SET  USP = '$SellPrice'
                        WHERE ProductID = '$StockID' ";
                  $result = mysqli_query($conn,$sql);
          }?>


      		</fieldset>
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
