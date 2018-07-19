<?php
 session_start(); 
	$connection = mysqli_connect("localhost","root","","shoppingcart");
	if($connection){
		//echo "connected!";
	}
?>

<?php

	//if(isset($_POST['checkBtn'])){
	if(isset($_POST['confirmBtn'])){	
		$username = $_POST['username'];

		$password = $_POST['password'];

		$query1 = "SELECT password FROM customer WHERE username='$username'";
		//echo "hi";
		$resultSet1 = mysqli_query($connection,$query1);
		$row1 = mysqli_fetch_assoc($resultSet1);
		$password_from_db = $row1['password'];
		//echo $password_from_db;
		if($password !== $password_from_db){
			echo "<script> alert('Your registration is not confirmed!..')</script>";
		}
			//if(isset($_POST['confirmBtn'])){
		else{   
				//$transactionnumber = $_POST['transactionnumber'];
			//echo "<script> alert('Ysbjhbhjbvdv..')</script>";
			
				//$pattern ="/^07[0-9]{8}$/";
				//if(!preg_match($pattern,$telephone)){echo "<script> alert('Telephone number format is invalid') </script>";}
				//else{
				$addressline1 = $_POST['addressline1'];
				$addressline2 = $_POST['addressline2'];
				$city = $_POST['city'];
				$debitcreditCard = $_POST['debitcreditCard'];
				$comments = $_POST['commenttext'];
				$electronCardName = $_POST['electronCardName'];
				$electronCardExpireDate = $_POST['electronCardExpireDate'];
				$todayDate = strtotime("today");
				$convertedElectronCardExpireDate = strtotime($electronCardExpireDate);
				if($todayDate < $convertedElectronCardExpireDate){
				//echo "ok";
				$query2  ="INSERT INTO transaction(address1,address2,city,postalCode,comments,username,electroncardName,electroncardExpireDate) VALUES('$addressline1','$addressline2','$city','$debitcreditCard','$comments','$username','$electronCardName','$electronCardExpireDate')";
				//echo "okkk";
				$resultSet2 = mysqli_query($connection,$query2);
				//echo $resultSet2;
			//	echo "okkkkkkkk";
				if($resultSet2){
					//echo "<script> alert('Successfully done. Wait for clothes!..')</script> ";

					$queryGettingtransID = "SELECT transactionID from transaction order by transactionID desc limit 1";
					$gettingresultSet3 = mysqli_query($connection,$queryGettingtransID);
					$gettingtransrow = mysqli_fetch_assoc($gettingresultSet3);
					$realtransactionNum = $gettingtransrow['transactionID'];
					$realtransactionNum = "$realtransactionNum";
					echo "<script> 
								alert($realtransactionNum +' is the your transaction number. Keep in mind.') ;
								alert('Successfully done. Wait for clothes!..');
								</script>";


								foreach ($_SESSION['shopping_cart'] as $key => $value) {
									$id=$value['item_id'];
									$query_to_remove_items_from_db="DELETE FROM clothes WHERE productCode='{$id}' ";
									$result=mysqli_query($connection,$query_to_remove_items_from_db);
									if(!$result){
										echo "<script> alert('delete from db!!!!') ;</script>";
									}
								}
								unset($_SESSION['shopping_cart']);
				}
				else{
					echo "<script> alert('There is some issue!..')</script>";
					}
		}
		else{
			echo "<script> alert('Your Electron card already Expired. Can not accept it!..')</script>";
		}	} 
		}
		
			/*if(isset($_POST['confirmBtn'])){
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$telephone = $_POST['telephone'];
				$addressline1 = $_POST['addressline1'];
				$addressline2 = $_POST['addressline2'];
				$city = $_POST['city'];
				$postalcode = $_POST['postalcode'];
				$comments = $_POST['commenttext'];

				$query2 = "INSERT INTO transaction(firstName,lastName,telephone,addressline1,addressline2,city,postalCode,comments) VALUES('$firstname','$lastname','$telephone','$addressline1','$addressline2','$city','$postalcode','$comments ')";
				$resultSet2 = mysqli_query($connection,$query2);
				if($resultSet){
					echo "<script> alert('You successfully registed') </script>";
				}
			}
		}
		else{
			echo "not ok";
		}*/
	
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
	</head>
    <body>		
		<div>
			<?php
			include 'header.php';
			?>
		</div>
		<div class="container">				
			<section class="header_text sub">
		<!--	<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >-->
				<h4><span>Check Out</span></h4>
			</section>	
			<section class="main-content">
				<div class="row">
					<div class="span12">
						<div class="accordion" id="accordion2">
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Checkout Options</a>
								</div>
								<div id="collapseOne" class="accordion-body in collapse">
									<div class="accordion-inner">
										<div class="row-fluid">
										<!--	<div class="span6">
												<h4>New Customer</h4>
												<p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
												<form action="#" method="post">
													<fieldset>
														<label class="radio" for="register">
															<input type="radio" name="account" value="register" id="register" checked="checked">Register Account
														</label>
														<label class="radio" for="guest">
															<input type="radio" name="account" value="guest" id="guest">Guest Checkout
														</label>
														<br>
														<button class="btn btn-inverse" data-toggle="collapse" data-parent="#collapse2">Continue</button>
													</fieldset>
												</form>
											 </div>-->
											 <div class="span6">
												<h4>Ready to purchase</h4>
												<p>I am a registered customer</p>
												<form action="" method="post" >
													<fieldset>
														<div class="control-group">
															<label class="control-label">Username</label>
															<div class="controls">
																<input type="text" name="username" placeholder="Enter your username" id="username" class="input-xlarge" / required>
															</div>
														</div>
														<div class="control-group">
															<label class="control-label">Password</label>
															<div class="controls">
															<input type="password" name="password" placeholder="Enter your password" id="password" class="input-xlarge" / required>
															</div>
														</div>
													<!--	<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="checkBtn" value="Check" /></div>-->
													</fieldset>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Account &amp; Purchasing Details</a>
								</div>								<div id="collapseTwo" class="accordion-body collapse">
									<div class="accordion-inner">
										<div class="row-fluid">
											<div class="span6">
												<h4>Your Personal Details</h4>
											</div>
											<div class="span6">
												<h4>Your Address</h4>
																	  
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> Address 1:</label>
													<div class="controls">
														<input type="text" name="addressline1" placeholder="Address line 1 put here" class="input-xlarge">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Address 2:</label>
													<div class="controls">
														<input type="text" name="addressline2" placeholder="Address line 2 put here" class="input-xlarge">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> City:</label>
													<div class="controls">
														<input type="text" name="city" placeholder="Enter your city here" class="input-xlarge">
													</div>
												</div>
												<div class="control-group">
													<label class="control-label"><span class="required">*</span> Electron card Number:</label>
													<p>Please enter your Electron card number with 16 digits. </p>
													<div class="controls">
														<input type="text" name="debitcreditCard" placeholder="Your Electron card number enter here" class="input-xlarge" maxlength=16>
													</div>
												</div>

												<div class="control-group">
													<label class="control-label"><span class="required">*</span> Printed name of Electron card</label>
													<div class="controls">
														<input type="text" name="electronCardName" placeholder="Electron card holders' name" class="input-xlarge">
													</div>
												</div>

													<div class="control-group">
													<label class="control-label"><span class="required">*</span> Expire date of Electron card</label>
													<div class="controls">
														<input type="date" name="electronCardExpireDate" placeholder="Electron cards' expirary date" class="input-xlarge">
													</div>
												</div>
											
												
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="accordion-group">
								<div class="accordion-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">Confirm Order</a>
								</div>
								<div id="collapseThree" class="accordion-body collapse">
									<div class="accordion-inner">
										<div class="row-fluid">
											<div class="control-group">
												<label for="textarea" class="control-label">Comments</label>
												<div class="controls">
													<textarea rows="3" name="commenttext" id="textarea" class="span12" placeholder="comments put here"></textarea>
												</div>
											</div>	
											<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="confirmBtn" value="Confirm order" onclick="checkingCard(debitcreditCard)"/></div>								
											<!--<button class="btn btn-inverse pull-right" name="confirmBtn">Confirm order</button>-->
										</div>
									</div>
								</div>
							</div>
						</div>				
					</div></form>
				</div>
			</section>			
			<?php
			include 'footer.php';
			?>
		</div>
		<script src="themes/js/common.js"></script>

		<script>
			function checkingCard(debitcreditCard){
				var passedCreditCardNumber = debitcreditCard;
				var convertedIntoString = passedCreditCardNumber.toString();
				var firstLetterCard = convertedIntoString.charAt(0);
				//alert("got");
				if(firstLetterCard = 4){
					alert("You enterd a creit card number");
				}
				else if(firstLetterCard = 5){
					alert("You enterd a master card number");
				}
				else if(firstLetterCard = 6){
					alert("You enterd an American express card number");
				}
				else{
					alert("Another card");
				}
			}
			
			
		</script>
    
    </body>
</html>