

    <?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "shoppingcart");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="women.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
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
                     echo '<script>window.location="women.php"</script>';  
                }  
           }  
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
        tr:nth-child(even){background-color: #f2f2f2}
    </style>
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<h2>Kailash Fashion</h2>
						<form method="POST" action ="search1.php">
						<input type="search" name="searchTextBox" class="input-block-level search-query" Placeholder="Search here" name="">
						<input type="submit" name="searchDetails" style="margin-top:5px;" class="btn btn-success" value="Search" />  
					</form>
				</div>

				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">
							<li><a href="search1.php"><img src="themes/images/search.png"> Search</a></li>				
							<li><a href="contact.php"><img src="themes/images/contact.png"> Contact</a></li>
					<!--		<li><a href="cart.php"><img src="themes/images/yourcart.png"> Your Cart</a></li>-->
					<!--		<li><a href="checkout.php"><img src="themes/images/checkout.png"> Checkout</a></li>		-->			
							<li><a href="login.php"><img src="themes/images/login.png"> Login</a></li>
							<li><a href="adminpassword.php"><img src="themes/images/administrator.png"> Admin</a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<!--<a href="index.html" class="logo pull-left"><img src="G:\Desktop\Web Project\V1\new index\17457338_1895434257345497_4865683872874359765_n.jpg" class="site_logo" alt=""></a>-->
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="./index.php">Home</a></li>
							<li><a href="./women.php">Women</a></li>															
							<li><a href="./men.php">Men</a></li>
							<li><a href="./wedding.php">Weddings</a></li>	
							<li><a href="./kids.php">Kids</a></li>
						</ul>
					</nav>
				</div>
			</section>

	</div>
		<div class="container">
			<section class="header_text sub">
		<!--	<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >-->
				<h4><span>Our Products</span></h4>
			</section>
			<section class="main-content">
				
				<div class="row">						
					<div class="span9">								
						<ul class="thumbnails listing-products">
							
								<!--	 <h3 align="center">Simple PHP Mysql Shopping Cart</h3><br />  -->
                <?php 
                if(isset($_POST['searchDetails'])){ 
                	$searchDetails = $_POST['searchTextBox'];
                $query = "SELECT * FROM clothes WHERE brand LIKE '%$searchDetails%' OR type LIKE '%searchDetails%' ORDER BY productCode ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?> 
                <li class="span3">
								<div class="product-box"> 
                <div class="col-md-4">  
                     <form method="post" action="women.php?action=add&id=<?php echo $row["productCode"]; ?>">  <!-- there were id before now-->
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                            <!--   <img src="<?php //echo $row["image"]; ?>" class="img-responsive" /><br />  -->
                    <!--       <?php	//echo '<img src="data:image/jpg;base64,'.base64_encode( $row['image'] ).'"/>'; ?> -->
                            <?php echo "<img src='themes/images/imagesForDB/".$row["image"]."'/>";
?>                               <h4 class="text-info"><?php echo $row["brand"]; ?></h4>  
                               <h5 class="text-danger">Rs<?php echo $row["newprice"]; ?></h5>  
                               <h5 class="text-danger"><del>Rs<?php echo $row["oldprice"]; ?></del></h5>
                               <input type="text" name="quantity" class="form-control" placeholder="Enter quantity here" /> 
                                <select name="size">
                                  <option value="">Select Your Preference Size</option> 
                                  <option value="XSmall">X-Small</option> 
                                  <option value="small">Small</option>
                                  <option value="medium">Medium</option>
                                  <option value="large">Large</option>
                                  <option value="Xlarge">X-Large</option> 
                                </select>
                                <select name="color">
                                  <option value="">Select Your Preference Color</option> 
                                  <option value="green">Green</option> 
                                  <option value="blue">Blue</option>
                                  <option value="yellow">Yellow</option>
                                  <option value="red">Red</option>
                                  <option value="white">White</option>
                                  <option value="black">Black</option>  
                                </select> 
                               <input type="hidden" name="hidden_name" value="<?php echo $row["type"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["newprice"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div> 
                	
								</div>
							</li>   
                <?php  
                     }  }
                }  
                ?>  
							     
						
						
						
						</ul>


						<!--  table data getting-->



						 <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                                <th width="40%">Item ID</th> 
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;
                               $delivery = 1000;
                               $vat ; 
                               $finalValue;   
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>
                               <td><?php echo $values["item_id"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="kids.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                    $discount = $total*0.05;
                                    $subValue = $total - $discount;
                                     $subSubValue = $subValue + $delivery;
                                    if($subSubValue < 15000){
                                    	$finalValue = $subSubValue*1.01;
                                    } 
                                    else if($subSubValue < 50000){
                                    	$finalValue = $subSubValue*1.05;
                                    } 
                                    else if($subSubValue < 100000){
                                    	$finalValue = $subSubValue*1.08;
                                    }
                                    else{
                                    	$finalValue =$subSubValue*1.1;
                                    }    
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">Rs. <?php echo number_format($total, 2); ?></td> 
                               <td></td> 
                                
                          </tr> 
                          <tr>
                          		<td colspan="3" align="right">Discount</td>
                          		<td align="right">Rs. <?php echo number_format($discount, 2); ?></td>
                          		<td></td>
                          </tr> 
                          <tr>
                          		<td colspan="3" align="right">Final Amount(Added delivery fees and VAT)</td>
                          		<td align="right">Rs. <?php echo number_format($finalValue, 2); ?></td>
                          		<td></td>
                          </tr> 
                          <?php  
                          }  
                          ?>  
                     </table>  								
						<hr>
					<button class="btn btn-inverse" type="submit" id="checkout" ><a href ="checkout.php">Checkout</a></button>
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
					
					</div>
				</div>
			</section>

			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<ul class="nav">
							<li><p>Main Branch:Kailash Fashion, No.20, Bazar Street,Badulla.</li>  
							<li>Tel:055 2289789, 055 2215947</li>
							<li>Fax:055 2289789</li>
							<li>Emai:kailash_fashion@gmail.com</li>
							<li><a href="https://www.google.com/maps/search/kailash+fashion+badulla/@6.9888658,81.0563497,17z/data=!3m1!4b1">How to find us</li>							
						</ul>					
					</div>
					<div class="span4">
						<h4>Connect with us </h4>
						<ul class="nav">
							<li><a href="https://www.facebook.com/chirantha.jananath.9" target="_black">Facebook <img class="fbtwitlinkImage"src="themes/images/fb.png"></a></li>
							<li><a href="https://twitter.com/Twitter?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_black">Twitter <img class="fbtwitlinkImage" src="themes/images/twitter.png"</a></li>
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
						</ul>
					</div>
				

				</div>	
			</section>
			<section id="copyright">
				<span >&copy; 2017 BSc (Hons) Software Engineering , University of Kelaniya , Sri lanka.<br>All Rights Reserved</span>
			</section>
			<script src="themes/js/common.js"></script>
		</div>
			
		</div>
		
    </body>
</html>