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
                            		<li class="selected-item"><a href="#">Product<?php  ?></a></li>

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

    <?php if($_SESSION['TI'] == "Active") {
      $customerID = $_POST['CustomerID'];
      $hmany = $_POST['Howmany'];
      $TID = $_POST['Trans_Int_Date'];
      //Getting the connection
      $conn = mysqli_connect("localhost","root","","WholeSale_Management");
      $sql = "INSERT INTO transaction_information(customerID,Trans_Init_Date)
      		VALUES('$customerID','$TID')";
      $result = mysqli_query($conn,$sql);

      $sql1 = "SELECT TransactionID FROM transaction_information
      WHERE CustomerID = '$customerID' AND Trans_Init_Date = '$TID'";
      $result1 = mysqli_query($conn,$sql1);
      $row1 = mysqli_fetch_assoc($result1);
      echo $row1['TransactionID'];

      $_SESSION['PAmt'] = array();
      $_SESSION['ProductID'] = array();
      $_SESSION['pnum'] = 0;
      $_SESSION['TID'] = $TID;
      $_SESSION['TransID']  = $row1['TransactionID'];
      $_SESSION['hmany'] = $hmany;
      echo $hmany;
      echo $_SESSION['hmany'];
      $_SESSION['TI'] =  "DeActive";
      $_SESSION['TD'] = "DeActive";
    }
     ?>
   <?php if($_SESSION['TD'] == "Active")
     {
       $ProductID    = $_POST['ProductID'];
       $Quantity  = $_POST['Quantity'];

       //Now inserting into the transaction_detail
       $conn1 = mysqli_connect("localhost","root","","WholeSale_Management");

        $sql3 = "SELECT USP FROM price_list WHERE ProductID = '$ProductID'";

          $result3 = mysqli_query($conn1,$sql3) ;


          $row2  = mysqli_fetch_assoc($result3);

          $amt  = ($Quantity)*($row2['USP']);
          array_push($_SESSION['ProductID'],$ProductID);
          array_push($_SESSION['PAmt'],$amt);
          $_SESSION['TotalAmt'] = $_SESSION['TotalAmt'] + ($Quantity)*($row2['USP']);


          $sql2 = "INSERT INTO transaction_detail(TransactionID,ProductID,Quantity,Total_Amount,Trans_Init_Date)
             VALUES('".$_SESSION['TransID']."',' $ProductID','$Quantity','".($Quantity)*($row2['USP'])."','".$_SESSION['TID']."')";

          $result2 = mysqli_query($conn1,$sql2);
            if($result2 === false){
              //Need to delete the transaction entered in transaction_information
              $conn3 = mysqli_connect("localhost","root","","WholeSale_Management");
              $result4 = mysqli_query($conn3,"DELETE FROM transaction_information WHERE TransactionID = '".$_SESSION['TransID']."'");
              echo "The Row has been deleted from the transaction_information";?>
              <a href="AddTransaction.php" class="button">Back</a>
            <?php  die ("Error:".mysqli_error($conn1));

              }
        $_SESSION['TD'] = "DeActive";
        ?>
      <?php } ?>



    <p>Total Amount Until Now <?php echo $_SESSION['TotalAmt'] ?></p>


    <?php if($_SESSION['hmany']>0) {?>
		<fieldset>
					<!--YOU NEED TO WRITE AN ACTION HERE...-->
          <?php $_SESSION['pnum'] = $_SESSION['pnum']  + 1;  ?>

				<legend><strong>Product<?php echo $_SESSION['pnum'] ?></strong></legend>
					<form action="Multi_products.php" method="POST">


						<p><label for="StockID">Product-ID:</label>
						<input type="integer" name="ProductID" id="StockID" Placeholder="Product-ID"  required /><br /></p>

						<p><label for="Quantity">Quantity:</label>
						<input type="integer" name="Quantity" id="Quantity" Placeholder="How Much??" required /><br /></p>



						<p><label for="TotalAmount">Total-Amount:</label>
						<input type="integer" name="TotalAmount" id="TotalAmount" placeholder="TotalAmount" disabled value ="<?php
             echo $_SESSION['TotalAmt']?>" ></input><br /></p>

            <p><input type="submit" name="Add Product" class="formbutton" value="Next Product" /></p>

            <?php
            $_SESSION['hmany']=$_SESSION['hmany']-1;

            $_SESSION['TD'] = "Active";?>
            <p>the while loop <?php echo $_SESSION['hmany'] ?> </p>

					</form>

		</fieldset>
    <?php }

    else {
      $_SESSION['BILL'] = "True";
      header("Location:payment.php");
    } ?>

		</article>






			<footer class="clear">
				<p>&copy; WholeSale Business Managment by Avijit and Avinash</p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>


</body>
</html>
