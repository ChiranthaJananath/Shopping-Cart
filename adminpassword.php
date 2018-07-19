<?php
	$connection = mysqli_connect("localhost","root","","shoppingcart");
	if($connection){
	//	echo "conected!";
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
				include 'header.php'; ; 
			?>
		</div>
		<div class="container">
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/adminImage.jpg" alt="New products" >
				
			</section>
			
			<section class="main-content">

				
				<div class="row">						
					<div class="span9" align="center">	
					<?php 
						if(isset($_SESSION['msg'])){
							$msg=$_SESSION['msg'];
							echo "<h3 class='text-center'>".$msg."</h3>";
						}
					 ?>
						<h4 class="title"><span class="text"><strong>Administrator Login Division</strong></span></h4>							
						<form action="admin.php" method="post"  alingment="center" enctype="multipart/form-data">	
							<fieldset>
							<!--		<label class="control-label">Product Code</label>
									<div class="controls">
										<input type="text" name="productcode" placeholder="Enter product code" id="username" class="input-xlarge">
									</div>-->

									<label class="control-label">Administrator User Name</label>
									<div class="controls">
										<input type="text" name="administratorname" id="name" class="input-xlarge" placeholder="Admin user name">
									</div> 


									<label class="control-label">Administrator Password</label>
									<div class="controls">
										<input type="password" name="administratorpassword" id="name" class="input-xlarge" placeholder="Admin password">
									</div> 

									<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="loginadminBtn" value="LOGIN" /></div>
									



									</fieldset>					
								</form>

								<!-------->





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