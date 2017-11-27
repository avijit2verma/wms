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
                  <li class="selected-item"> <a href="AllStocks.php">All Stocks</a></li>
                  <li><a href="Depleted_Stock.php">Depleted Stocks</a></li>
                  <li> <a href="AddCategory.php">Add category</a></li>
                  <li><a href="Update_Stocks.php">Add or Update Stocks</a></li>
                  <li><a href="Add_Suppliers.php">Add or Update Supplier</a></li>
                  <li><a href="Bills.php">Orders</a></li>
                  <li><a href="Logout.php">Logout</a></li>
</ul>
          </ul>
			</nav>



			</aside>

		<section id="content" class="column-right">

	    <article>

		<blockquote><p>Customer Login contain 1.All his transactions with the WholeSaler 2.Payment Details 3.Customer detail NEED TO ADD THE LOGOUT Button</p></blockquote>
		<p>&nbsp;</p>

		<!--	<a href="#" class="button">Read more</a>
			<a href="#" class="button button-reversed">Comments</a> -->
		<!--IN THIS FIELD WE CAN ADD THE CUSTOMER..-->
<fieldset>
		<legend><h3>Catagories of products</h3></legend>
		<table>
			<tr>
				<th>CategoryID</th>
				<th>CategoryName</th>

			</tr>
			<?php
				$conn = mysqli_connect("localhost","root","","WholeSale_Management");
				$sql = "SELECT * FROM category";
				$result = mysqli_query($conn,$sql);

				$row = mysqli_fetch_assoc($result);
				do { ?>


			<tr>
				<td><?php echo $row['CategoryID']; ?></td>
				<td><?php echo $row['CategoryName']; ?></td>
			</tr>
			<?php } while($row = mysqli_fetch_assoc($result)) ?>
			<tr>
		</table>
  </fieldset>

<fieldset>
  <legend><h3>Select Category</h3></legend>
    <form action="AllStocks.php" method="POST">
      <p><label for="ID"><strong>CategoryID:</strong></label>
      <input type="text" name="CategoryID" id="ID"  placeholder = "CatagoryID" required/><b/></p>

      <p><input type="submit" name="pshow" class="formbutton" value="Show Products" /></p>
    </form>

</fieldset>

  <?php if(isset($_POST['pshow'])) {
    $catagoryID = $_POST['CategoryID'];
     ?>
    <fieldset>
    		<legend><h3>Products Under CategoryID <?php echo $catagoryID ?></h3></legend>
    		<table>
    			<tr>
    				<th>CategoryID</th>
            <th>Pname</th>
    				<th>ProductID</th>
            <th>SupplierID</th>
            <th>Quantity</th>
            <th>CostPrice</th>
            <th>SellPrice</th>
            <th>ReorderLevel</th>
    			</tr>
    			<?php
    				$conn1 = mysqli_connect("localhost","root","","WholeSale_Management");
            $sql1 = "SELECT CategoryID,Pname,product.ProductID AS product,SupplierID,Quantity_in_stock,UnitPrice,USP,ReorderLevel
            FROM product,price_list
            WHERE price_list.ProductID = product.ProductID
            AND CategoryID = '$catagoryID'";
    				$result = mysqli_query($conn1,$sql1);

    				$row1 = mysqli_fetch_assoc($result);
    				do { ?>


    			<tr>
    				<td><?php echo $row1['CategoryID']; ?></td>
    				<td><?php echo $row1['Pname']; ?></td>
            <td><?php echo $row1['product']; ?></td>
            <td><?php echo $row1['SupplierID']; ?></td>
            <td><?php echo $row1['Quantity_in_stock']; ?></td>
            <td><?php echo $row1['UnitPrice']; ?></td>
            <td><?php echo $row1['USP']; ?></td>
            <td><?php echo $row1['ReorderLevel']; ?></td>
    			</tr>
    			<?php } while($row1 = mysqli_fetch_assoc($result)) ?>
    			<tr>
    		</table>
      </fieldset>

      <?php } ?>


<br> <br><br><br><br><br><br><br>

		</article>




			<footer class="clear">
				<p>&copy; WholeSale Business Managment by Avijith and Avinash </p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>


</body>
</html>
