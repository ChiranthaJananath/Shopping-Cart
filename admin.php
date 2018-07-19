<?php
	session_start();
	$connection = mysqli_connect("localhost","root","","shoppingcart");
	if($connection){
	//	echo "conected!";
	}
?>



<?php
	if(isset($_POST['loginadminBtn'])){

	//echo "start";
		$administratorname = $_POST['administratorname'];
		//echo 'username' . $administratorname . "</br>";
		$administratorpassword = $_POST['administratorpassword'];
		//echo 'password' . $administratorpassword . "</br>";
		$queryToCheckPassword = "SELECT * FROM administrator WHERE idadministratorUsername ='$administratorname' ";
		$resultSet1 = mysqli_query($connection,$queryToCheckPassword);
        $row=mysqli_fetch_assoc($resultSet1);
        $password_from_db = $row['administratorpassword'];
       // echo 'password_from_db ' .$password_from_db . "</br>";
        if($administratorpassword ==  $password_from_db){
        	//echo "ok";
        }
        else{
        	$_SESSION['msg']='Incorrect Username or Password';
        	echo '<script>window.location="adminpassword.php"</script>'; 
        	
        }
    }
    // if(isset($_POST['loginadminBtn'])){
    // 	$administratorname = $_POST['administratorname'];
    // 	$administratorpassword = $_POST['administratorpassword'];
    // 	if($administratorname === 'admin147' && $administratorpassword === '14747'){
    // 		echo "<script> alert('successfully login!');</script>";
    // 	}
    // 	else{
    // 		echo "<script> alert('error!');</script>";
    // 	}
    // }


?>









<?php
	if(isset($_POST['submitBtn'])){

//	echo "start";


	
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		//$productcode = $_POST['productcode'];
		echo "1";
		$brandName = $_POST['brand'];
		$type = $_POST['type'];
		$newPrice = $_POST['newPrice'];
		$oldPrice = $_POST['oldPrice'];
		$stockQuanity = $_POST['stockQuanity'];
		$query = "INSERT INTO clothes(brand,newprice,image,oldprice,type,quantity) VALUES('$brandName','$newPrice','$image_name','$oldPrice','$type','$stockQuanity')";
		$resultSet = mysqli_query($connection,$query);
		if($resultSet){
				
					echo "<script> alert('Successfully added!.');	</script>";
					}
	}
?>

<?php
	if(isset($_POST['updatepriceBtn'])){
		$productcode = $_POST['productcode'];
		$newprice = $_POST['newprice'];
	//	$queryToGetOldPrice = "SELECT oldprice FROM clothes WHERE productCode='$productcode' ";
	//	$resultSetGettingOldPrize = mysqli_query($connection,$queryToGetOldPrice );
	//	$gettingOldPricerow = mysqli_fetch_assoc($resultSetGettingOldPrize);
	//	$realoldprice = $gettingOldPricerow['newprice'];
	//	$queryToUpdateTheOldPrize ="UPDATE clothes SET oldprice ='$realoldprice' WHERE productCode='$productcode'";
	//	$resultSetOldPrice = mysqli_query($connection,$queryToUpdateTheOldPrize);

		$queryToUpdateRecord = "UPDATE clothes SET newprice='$newprice' WHERE productCode='$productcode'";
		$resultSetUpdated = mysqli_query($connection,$queryToUpdateRecord);
		if($resultSetUpdated ){
			echo "<script> alert ('Succesfully updated!!!');</script>";
		}
		else{
			echo "<script> alert ('Incompleted!!!');</script>";
		}
	}
?>

<?php
	if(isset($_POST['deleteRecordBtn'])){
		$productcodedeleting = $_POST['productcodedeleting'];
		$queryToDeleteData = "DELETE FROM clothes WHERE productCode='$productcodedeleting'";
		$resultSetToDleteData = mysqli_query($connection,$queryToDeleteData);
		if($resultSetToDleteData){
			echo "<script> alert ('Deleted successfully!!!');</script>";
		}
		else{
			echo "<script> alert ('Not Deleted!!!');</script>";
		}
	}
?>

<?php
	if(isset($_POST['deleteCustomerBtn'])){
		$usernamedeleting = $_POST['usernamedeleting'];
		$queryToDeleteCustomer = "DELETE FROM customer WHERE username='$usernamedeleting '";
		$resultSetToDleteCustomer = mysqli_query($connection,$queryToDeleteCustomer);
		if($resultSetToDleteCustomer){
			echo "<script> alert ('Removed customer successfully!!!');</script>";
		}
		else{
			echo "<script> alert ('Not Deleted!!!');</script>";
		}
	}
?>
<?php 
	if(isset($_POST['addAdminBtn'])){
		$administratorname = $_POST['adminUserName'];
		$adminPassword = $_POST['adminPassword'];
		$queryToAddAdministrator = "INSERT INTO administrator(idadministratorUsername,administratorpassword) VALUES('$administratorname','$adminPassword')";
		$resultSetOfAdminAdding = mysqli_query($connection,$queryToAddAdministrator );
		if($resultSetOfAdminAdding){
			echo "<script> alert ('New Administrator added!!!');</script>";
		}
	}
 ?>







<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Kailash Fashion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<style>
									table {
						    border-collapse: collapse;
						    width: 100%;
						}

						th, td {
						    padding: 8px;
						    text-align: left;
						    border-bottom: 1px solid #ddd;
						}
		</style>
	</head>
    <body>		
		<div>
			<?php 
				include 'header.php'; ; 
			?>
		</div>
		<div class="container">


	<form method="POST" action ="adminpassword.php" >
						
			<input type="submit" name="logout" style="margin-top:5px;" class="btn btn-success" value="Logout" />  
	</form>
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/adminImage.jpg" alt="New products" >
				
			</section>

			
			<section class="main-content">

				
				<div class="row">						
					<div class="span9">	
						<h4 class="title"><span class="text"><strong>Add New Items</strong></span></h4>							
						<form action="" method="post" enctype="multipart/form-data" >	
							<fieldset>
							<!--		<label class="control-label">Product Code</label>
									<div class="controls">
										<input type="text" name="productcode" placeholder="Enter product code" id="username" class="input-xlarge">
									</div>-->
									
									<label class="control-label">Upload Image</label>
									<div class="controls">
										<input type="file" name="image" id="imageUpload" class="input-xlarge" placeholder="Image">
									</div> 

									<label class="control-label">Brand:</label>
										<select name="brand">
											<option value="">Select the brand</option>
											<option value="MAS">MAS</option>
											<option value="Thilakawardana">Thilakawardana</option>
											<option value="GLITZ">GLITZ</option>
											<option value="Brandix">Brandix</option>
											<option value="t-shirt.lk">t-shirt.lk</option>
											<option value="Any-tshirt.lk">Any-tshirt.lk</option>
										</select>

									<label class="control-label">Type :</label>
										<select name="type">
											<option value="">Select the type</option>
											<option value="women">Women</option>
											<option value="men">Men</option>
											<option value="kids">Kids</option>
											<option value="weddings">Weddings</option>
										</select>


									<label class="control-label">New Price</label>
									<div class="controls">
										<input type="text" name="newPrice" placeholder="Enter new price " id="username" class="input-xlarge">
									</div>

									<label class="control-label">Old Price</label>
									<div class="controls">
										<input type="text" name="oldPrice" placeholder="Enter old price" id="username" class="input-xlarge">
									</div>


									<label class="control-label">Stock Quantity</label>
									<div class="controls">
										<input type="text" name="stockQuanity" placeholder="Enter quantity" id="username" class="input-xlarge">
									</div>

									<div class="control-group">
								<!--	<input tabindex="3" class="btn btn-inverse large" type="submit" value="Sign into your account">-->
									<hr>
									<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="submitBtn" value="Insert data" /></div>
									<hr>
								</div>
									</fieldset>					
								</form>

								<!-------->
								<h4 class="title"><span class="text"><strong>View the shop</strong></span></h4>	
								<form action="" method="post" enctype="multipart/form-data">	
								<fieldset>
									<label class="control-label">Brand</label>
									<div class="controls">
									<!--	<input type="text" name="brand"  id="username" class="input-xlarge">-->
									<select name="brand">
											<option value="">Select the brand</option>
											<option value="MAS">MAS</option>
											<option value="Thilakawardana">Thilakawardana</option>
											<option value="GLITZ">GLITZ</option>
											<option value="Brandix">Brandix</option>
											<option value="t-shirt.lk">t-shirt.lk</option>
											<option value="Any-tshirt.lk">Any-tshirt.lk</option>
									</select>
										<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="checkStockBrand" value="Check Stock with Brand" /></div>
									
														<?php
				if(isset($_POST['checkStockBrand'])){
					$brand = $_POST['brand'];
					//$queryToGetClothesInBrand = "SELECT COUNT(productCode) FROM clothes WHERE brand='GLITZ'";
					$queryToGetClothesInBrand = "SELECT productCode FROM clothes WHERE brand='$brand'";
					$resultSetBrand = mysqli_query($connection,$queryToGetClothesInBrand);
					$numberBrand = mysqli_num_rows($resultSetBrand);
					echo $numberBrand."is the number of products on ".$brand. " Brand";	

				}
				?>

										<br><br>
									<label class="control-label">Type</label>
									<div class="controls">
									<!--	<input type="text" name="brand"  id="username" class="input-xlarge">-->
									<select name="type">
											<option value="">Select the type</option>
											<option value="Women">Women</option>
											<option value="Men">Men</option>
											<option value="Kids">Kids</option>
											<option value="Wddings">Weddings</option>
									</select>
										<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="checkStockType" value="Check Stock with Type" /></div>

							<?php
							if(isset($_POST['checkStockType'])){
								$type = $_POST['type'];
								//$queryToGetClothesInBrand = "SELECT COUNT(productCode) FROM clothes WHERE brand='GLITZ'";
								$queryToGetClothesInType = "SELECT productCode FROM clothes WHERE type='$type'";
								$resultSetType = mysqli_query($connection,$queryToGetClothesInType);
								$numberType = mysqli_num_rows($resultSetType);
								echo $numberType. " is the number of products on".$type. " Type";	

							}

							?>
										<br><br>
										<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="checkAllCustomer" value="Click here to get number of registerd customers" /></div>
										<br>


							<?php
							if(isset($_POST['checkAllCustomer'])){
								//$type = $_POST['type'];
								//$queryToGetClothesInBrand = "SELECT COUNT(productCode) FROM clothes WHERE brand='GLITZ'";
								$queryToGetCustmerNumber = "SELECT username FROM customer ";
								$resultSetCustomer = mysqli_query($connection,$queryToGetCustmerNumber);
								$numberCustomer = mysqli_num_rows($resultSetCustomer);
								echo $numberCustomer."is the number of customers with you.";	

							}

							?><br>

										<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="checkAllStock" value="Check all stock here" /></div>
																
							<?php
							if(isset($_POST['checkAllStock'])){
								//$type = $_POST['type'];
								//$queryToGetClothesInBrand = "SELECT COUNT(productCode) FROM clothes WHERE brand='GLITZ'";
								$queryToGetProductCode = "SELECT productCode FROM clothes ";
								$resultSetProducts = mysqli_query($connection,$queryToGetProductCode);
								$numberProducts = mysqli_num_rows($resultSetProducts);
								echo $numberProducts."is the your total stock of clothes .";	

							}

							?>

									</div>
 

									
								<!--	<input tabindex="3" class="btn btn-inverse large" type="submit" value="Sign into your account">-->
									<hr>
								
									
								</div>
								</fieldset>					
								</form>









			<h4 class="title"><span class="text"><strong>Update the shopping data</strong></span></h4>
			<form action="" method="post" enctype="multipart/form-data">
				<fieldset>
					<label class="control-label">Product Code</label>
						<div class="controls">
							<input type="text" name="productcode" placeholder="Enter product code here" id="username" class="input-xlarge">
						</div>

					<label class="control-label">New Price</label>
						<div class="controls">
							<input type="text" name="newprice" placeholder="Enter new price here" id="username" class="input-xlarge">
						</div>

					

						<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="updatepriceBtn" value="Update the price" /></div>
				</fieldset>
			</form>

			<hr>


				<h4 class="title"><span class="text"><strong>Delete the shopping data</strong></span></h4>
			<form action="" method="post" enctype="multipart/form-data">
				<fieldset>
					<label class="control-label">Product Code</label>
						<div class="controls">
							<input type="text" name="productcodedeleting" placeholder="Enter product code here" id="username" class="input-xlarge">
						</div>

						<p> By clicking below button you will be able to delete the reord of the clothe by the system.</p>
						<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="deleteRecordBtn" value="Delete the record" /></div>
				</fieldset>
			</form>	

			<h4 class="title"><span class="text"><strong>Maintain the customers</strong></span></h4>
			<form action="" method="post" enctype="multipart/form-data">
				<fieldset>
					<label class="control-label">User Name</label>
						<div class="controls">
							<input type="text" name="usernamedeleting" placeholder="Enter user name here" id="username" class="input-xlarge">
						</div>

						<p> By clicking below button you will be able to delete the record of above customer by the system.</p>
						<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="deleteCustomerBtn" value="Delete the customer" /></div>
				</fieldset>
			</form>	


			<h4 class="title"><span class="text"><strong>Add Administrators</strong></span></h4>
			<form action="" method="post" enctype="multipart/form-data">
				<fieldset>
					<label class="control-label">Admin User Name</label>
						<div class="controls">
							<input type="text" name="adminUserName" placeholder="Enter administrator user name here" id="username" class="input-xlarge">
						</div>

						<label class="control-label">Admin Password</label>
						<div class="controls">
							<input type="password" name="adminPassword" placeholder="Enter administrator password here" id="username" class="input-xlarge">
						</div>


						<p> You can add new adminisrator.</p>
						<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="addAdminBtn" value="Add administrator" /></div>
				</fieldset>
			</form>	



			<h4 class="title"><span class="text"><strong>View Full Orders</strong></span></h4>
			<form action="" method="post" enctype="multipart/form-data">
				<fieldset>	
					<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="findFullOrdersBtn" value="Check full orders" /></div>
				</fieldset>
			</form>		
<table>
<?php 
	if(isset($_POST['findFullOrdersBtn'])){
		$queryToGetOrder = "SELECT * FROM transaction";
		$resultSetFindOrder = mysqli_query($connection,$queryToGetOrder);



		while ($row=mysqli_fetch_assoc($resultSetFindOrder)) {
			$transactionID=$row['transactionID'];
			$address1=$row['address1'];
			$address2=$row['address2'];
			$city=$row['city'];
			$electronCardNumber=$row['postalCode'];
			$username=$row['username'];
			$electronCardexpireDate =$row['electroncardExpireDate'];
			$electronCardHolder=$row['electroncardName'];


			$table=<<<DELIMITER
					
					<tr>
						<td><strong>Tranction ID</strong></td>
						<td><strong>User Name</strong></td>
						<td><strong>Address Line1</strong></td>
						<td><strong>Address Line2</strong></td>
						<td><strong>City</strong></td>
						<td><strong>Electron Card Holder</strong></td>
						<td><strong>Electron Card Number</strong></td>
						<td><strong>Electron Card Exiredate</strong></td>

					</tr>

					<tr>
						<td>$transactionID</td>
						<td>$username</td>
						<td>$address1</td>
						<td>$address2</td>
						<td>$city</td>
						<td>$electronCardHolder</td>
						<td>$electronCardNumber</td>
						<td>$electronCardexpireDate</td>
					</tr>

DELIMITER;

		echo $table;
		}

	}
 ?>
</table>  


								
								</div>
								</div>
								</div>
								</div>
						
							
							
					<hr>
					</div>
				<!--	<div class="span3 col">
							<div class="block">	
							<ul class="nav nav-list">
								<li class="nav-header"><h3>Our Partners</h3></li>
								<li><a href="http://www.tshirts.lk/" target="_black"><img src="themes/images/clients/manufacture1.png"></a></li><br><br>
								<li><a href="http://www.facebook.com/Thilakwardhana/" target="_black"><img src="themes/images/clients/manufacture2.jpg"></li><br><br>
								<li><a href="http://www.masholdings.com" target="_black"><img src="themes/images/clients/manufacture3.jpg"></li><br><br>
								<li><a href="http://www.anytshirt.lk" target="_black"><img src="themes/images/clients/manufacture4.jpg"></li><br><br>
								<li><a href="http://www.brandix.com/" target="_black"><img src="themes/images/clients/manufacture5.jpg"></li><br><br>
								<li><a href="http://www.glitz.com/" target="_black"><img src="themes/images/clients/manufacture6.jpg"></li><br><br>
							</ul>
							
							<br/>
					
					</div>
				

					</div>-->
				</div>
			</section>
			<?php
				include 'footer.php';
			?>
		</div>
		<script src="themes/js/common.js"></script>	
    </body>
</html>