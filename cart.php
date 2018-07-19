 <?php
 session_start();
	$connection = mysqli_connect("localhost","root","","shoppingcart");
	if($connection){
		echo "conected!";
	}
?>
<!--<?php/*
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 } */ 
?>-->

<?php
	

	if(isset($_POST['signInBtn'])){

	//echo "start";
		$emailForSignIn = $_POST['emailForSignIn'];
		//echo 'username' . $administratorname . "</br>";
		$passwordForSignIn = $_POST['passwordForSignIn'];
		//echo 'password' . $administratorpassword . "</br>";
		$queryToCheckSignInPassword = "SELECT * FROM customer WHERE password ='$passwordForSignIn' ";
		$resultSet1 = mysqli_query($connection,$queryToCheckSignInPassword);
        $row=mysqli_fetch_assoc($resultSet1);
        $password_from_db = $row['password'];
       // echo 'password_from_db ' .$password_from_db . "</br>";
        if($passwordForSignIn ==  $password_from_db){
        	//echo "ok";
        }
        else{
        	$_SESSION['msg']='Incorrect Email or Password';
        	echo '<script>window.location="login.php"</script>'; 
        	
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
			<script src="themes/js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<?php
			include 'header.php';
		?>
		<div="container">
			<section class="header_text sub">
		<!--	<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >-->
				<h4><span>Shopping Cart</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">
					<div class="span9">					
						<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
								 <div class="table-responsive">  
             <!--        <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                         // if(!empty($_SESSION["shopping_cart"]))  
                          {  
                             //  $total = 0;  
                              // foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php //echo $values["item_name"]; ?></td>  
                               <td><?php //echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php //echo $values["item_price"]; ?></td>  
                               <td>$ <?php //echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="cart.php?action=delete&id=<?php //echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                   // $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php// echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  -->
                </div>  
						
						<hr>
						<hr/>
						<p class="buttons center">				
						<!--	<button class="btn" type="button">Update</button>
							<button class="btn" type="button"><a href="index.php">Continue</button>-->
							<button class="btn btn-inverse" type="submit" id="checkout" ><a href ="login.php">Logout</a></button>
						</p>					
					</div>
					<div class="span3 col">
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
						<!--	<ul class="nav nav-list below">
								<li class="nav-header">MANUFACTURES</li>
								<li><a href="products.html">Adidas</a></li>
								<li><a href="products.html">Nike</a></li>
								<li><a href="products.html">Dunlop</a></li>
								<li><a href="products.html">Yamaha</a></li>
							</ul>
						</div>
						<div class="block">
							<h4 class="title">
								<span class="pull-left"><span class="text">Randomize</span></span>
								<span class="pull-right">
									<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
								</span>
							</h4>
							<div id="myCarousel" class="carousel slide">
								<div class="carousel-inner">
									<div class="active item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">
													<span class="sale_tag"></span>												
													<a href="product_detail.html"><img alt="" src="themes/images/ladies/2.jpg"></a><br/>
													<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
													<a href="#" class="category">Suspendisse aliquet</a>
													<p class="price">$261</p>
												</div>
											</li>
										</ul>
									</div>
									<div class="item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">												
													<a href="product_detail.html"><img alt="" src="themes/images/ladies/4.jpg"></a><br/>
													<a href="product_detail.html" class="title">Tempor sem sodales</a><br/>
													<a href="#" class="category">Urna nec lectus mollis</a>
													<p class="price">$134</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>	-->					
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
					document.location.href = "index.php";
				})
			});
		</script>		
    </body>
</html>