<?php
session_start();
	$connection = mysqli_connect("localhost","root","","shoppingcart");
	if($connection){
	//	echo "conected!";
	}
?>

<?php
	if(isset($_POST['submitBtn'])){
		//$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$telephoneNumber = $_POST['telephoneNumber'];
		$pattern ="/^07[0-9]{8}$/";
		if(!preg_match($pattern,$telephoneNumber)){echo "<script> alert('Telephone number format is invalid') </script>";}
		else{
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){ echo "<script type='text/javascript'>alert('Email is not in valid format!')</script>" ;}
		else{
			if (!preg_match("/^[a-zA-Z][0-9a-zA-Z_!$@#^&]{5,8}$/", $password)){echo "<script type='text/javascript'>alert('Password is not in valid format!')</script>";}
			else {
		$queryCheckingEmail = "SELECT email FROM customer WHERE email='$email'";
		$resultSet3 = mysqli_query($connection,$queryCheckingEmail);
		$row1 = mysqli_fetch_assoc($resultSet3);
		//$email_from_database = $row1['email'];
		if(!$row1){
		$queryInsertdata = "INSERT INTO customer(email,password,firstName,lastName,telephone) VALUES('$email','$password','$firstName','$lastName','$telephoneNumber')";
		$resultSet = mysqli_query($connection,$queryInsertdata);
		if($resultSet){
					$queryGettingusername = "SELECT username from customer order by username desc limit 1";
					$gettingresultSet = mysqli_query($connection,$queryGettingusername);
					$gettingtransrow = mysqli_fetch_assoc($gettingresultSet);
					$realusernumber = $gettingtransrow['username'];
					$realusernumber ="$realusernumber";
					echo "<script> 
								alert($realusernumber +' is the your user name. Keep in mind.') ;
								alert('Successfully registered!. Visit the page and be happy!..');
								</script>";
		}  
		}
		else{
			echo "<script> alert('You alreadey logged here.Can not create another account you.') </script>";
		} 
		}
	}
	}  }
?>

<?php
	/*if(isset($_POST['recoveryBtn'])){
		$username1 = $_POST['username1'];
		$query1 = "SELECT password FROM customer WHERE username= $username1";
		$resultSet1 = mysqli_query($connection,$query1);*/
		//New code sample to reset the pass words


		if(isset($_POST['changeBtn'])){

				$username1 = $_POST['username1'];
		        $exsistingpassword = $_POST['exsistingpassword'];
		        $newpassword = $_POST['newpassword'];
		        $confirmnewpassword = $_POST['confirmationpassword'];
		        //echo "mama";
        		$query1 = "SELECT password FROM customer WHERE username='$username1'";
        		$resultSet1 = mysqli_query($connection,$query1);
        		$row=mysqli_fetch_assoc($resultSet1);
        		$password_from_db=$row['password'];
        		//echo $password_from_db;
        		if(!$resultSet1)
        			{
        				echo "<script> alert('The username you entered does not exist') </script>";
        			}
        		else if($exsistingpassword!== $password_from_db)
        			{
        				echo " <script> alert('You entered an incorrect password') </script>";
        			}
        			else{
        		if($newpassword=$confirmnewpassword){
        			$query2 ="UPDATE customer SET password='$newpassword' where username='$username1'";
        			$resultSet2 = mysqli_query($connection,$query2);
        		}
       		    if($resultSet2)
        			{
        				echo "<script> alert('Congratulations You have successfully changed your password') </script>";
        			}

       			else
        			{
       					echo "Passwords do not match";
       				}}
      
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
				<h4><span>Login and Regsiter</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
					<div class="span5">					
						<h4 class="title"><span class="text"><strong>Change</strong> Password</span></h4>
						<p>If you have any effort from unauthorized persons, change the password from here.</p>
						<form action="" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" name="username1" placeholder="Enter your username" id="username" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Exsisting Password</label>
									<div class="controls">
										<input type="password" name="exsistingpassword" placeholder="Enter exsisting password" id="password" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">New Password</label>
									<div class="controls">
										<input type="password" name="newpassword" placeholder="Enter new password" id="password" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Re-enter your Password</label>
									<div class="controls">
										<input type="password" name="confirmationpassword" placeholder="Re-enter your password" id="password" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
								<!--	<input tabindex="3" class="btn btn-inverse large" type="submit" value="Sign into your account">-->
									<hr>
									<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="changeBtn" value="Change my password" /></div>
								</div>
							</fieldset>
						</form>				
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
						<form name="loginform" action="" method="post" class="form-stacked" onsubmit="return validateForm()">
							<fieldset>
							<!--	<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" name="username" placeholder="Enter your username" class="input-xlarge">
									</div>
								</div>-->
								<div class="control-group">
									<label class="control-label">Email address:</label>
									<div class="controls">
										<input type="text" name="email" placeholder="Enter your email" class="input-xlarge" required>
									
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">First Name:</label>
									<div class="controls">
										<input type="text" name="firstName" placeholder="Enter first name" class="input-xlarge" required>
									
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Last Name:</label>
									<div class="controls">
										<input type="text" name="lastName" placeholder="Enter last name" class="input-xlarge" required>
									
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Telepnone: (07xxxxxxxx)</label>
									<div class="controls">
										<input type="tel" name="telephoneNumber" placeholder="Enter telephone number" class="input-xlarge" required>
									
									</div>
								</div>


								


								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<p>Create a password using 5-8 charactors, use numeric and letters and must start with a letter</p>
										<input type="password" name="password" placeholder="Enter your password" class="input-xlarge" >
									</div>
								</div>							                            
								<div class="control-group">
									<p>By clicking the button below, I agree to the bond Kailash Fashions' User Agreement and the privacy and policy.</p>
								</div>
								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="submitBtn" value="Create your account" /></div>
								
							</fieldset>
						</form>					
					</div>
					<!-- Sign in form-->	

					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Sign in</strong> Form</span></h4>
						<form name="loginform" action="cart.php" method="post" class="form-stacked" >
							<fieldset>
							<!--	<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" name="username" placeholder="Enter your username" class="input-xlarge">
									</div>
								</div>-->
								<div class="control-group">
									<label class="control-label">Email:</label>
									<div class="controls">
										<input type="email" name="emailForSignIn" placeholder="Enter your email" class="input-xlarge" required>
									<!--	<span class="error">* <?php// echo $emailError;?></span>-->
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										
										<input type="password" name="passwordForSignIn" placeholder="Enter your password" class="input-xlarge" >
									</div>
								</div>							                            
								<div class="control-group">
									<p>You can Sign In now</p>
								</div>
								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="signInBtn" value="Sign In" /></div>
								
							</fieldset>
						</form>					
					</div>			
				</div>
			</section>			
			<?php
				include 'footer.php';
			?>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.php";
				})
			});
		</script>
		<script>
					function validateForm() {
		    			var x = document.forms["loginform"]["password"].value;
		    			if (x == "") {
		        			alert("Name must be filled out");
		        			return false;
		    						}
					}
				</script>		
    </body>
</html>