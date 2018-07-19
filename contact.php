<?php
$connection = mysqli_connect("localhost","root","","shoppingcart");
	if($connection){
		//echo "conected!";
	}
?>

<?php
	/*if(isset($_POST['sendBtn'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	//$dropdown = $POST['dropdown'];
	$message = $_POST['message'];
	$formcontent="From: $name \n Message: $message";
	$recipient = "chiranthajtk@gmail.com";
	$subject = "Contact Form";
	$mailheader = "From: $email \r\n";
	mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
	echo "Thank You!";
}*/
/*	if(isset($_POST['sendBtn'])){
 	$name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $from = 'From: TangledDemo'; 
    $to = 'chiranthajtk@gmail.com'; 
    $subject = 'Hello';
    $human = $_POST['human'];
			
    // $body = "From: $name\n E-Mail: $email\n Message:\n $message";
    $body = "dgfghjkuhgyutyf";
				
    if ($_POST['submit'] && $human == '4')
     {			
     mail($to, $subject, $body);	 
  //       if (mail ($to, $subject, $body)) 
  //       { 
	 //    	echo '<p>Your message has been sent!</p>';
		// } 
		// else 
		// { 
	 //   		 echo '<p>Something went wrong, go back and try again!</p>'; 
		// } 
    } 
    else if ($_POST['submit'] && $human != '4') 
    {
		echo '<p>You answered the anti-spam question incorrectly!</p>';
    }
}*/


/*if ( isset( $_REQUEST ) && !empty( $_REQUEST ) ) {
 if (
 isset( $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['message'] ) &&
  !empty( $_REQUEST['email'] ) &&
  !empty( $_REQUEST['message'] ) && $_POST['human']==4
 ) {
  $message = wordwrap( $_REQUEST['message'], 70 );
  $to = $_REQUEST['email'] . '@' . $_REQUEST['message'];
  $result = @mail( $to, '', $message );
  print 'Message was sent to ';
 } else {
  print 'Not all information was submitted.';
 }
}*/

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email  =$_POST['email'];
	$message = $_POST['message'];
	$human = $_POST['human'];
		  $emailTo = 'chiranthajtk@gmail.com';
        $body = "Name: $name \n\nEmail: $email \n\nMessage: $message\n\nHuman: $human ";
        $headers = 'From: WebBestow <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

        mail($emailTo, $name, $message, $human);
        $emailSent = true;
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
    <body >		
	<div>
		<?php
			include 'header.php';
		?>
	</div>	
	<div class="container">						
			<!--<section class="google_map">
				<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=74%2F6+Nguy%E1%BB%85n+V%C4%83n+Tho%E1%BA%A1i,+S%C6%A1n+Tr%C3%A0,+%C4%90%C3%A0+N%E1%BA%B5ng,+Vi%E1%BB%87t+Nam&amp;aq=0&amp;oq=74%2F6+Nguyen+Van+Thoai+Da+Nang,+Viet+Nam&amp;sll=37.0625,-95.677068&amp;sspn=41.546728,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=74+Nguy%E1%BB%85n+V%C4%83n+Tho%E1%BA%A1i,+Ng%C5%A9+H%C3%A0nh+S%C6%A1n,+Da+Nang,+Vietnam&amp;t=m&amp;ll=16.064537,108.24151&amp;spn=0.032992,0.039396&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
			</section>-->
			<section class="header_text sub">
		<!--	<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >-->
				<h4><span>Contact Us</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">				
					<div class="span5">
						<div>
							<h5>GENERAL INFORMATION</h5>
							<p><strong>Phone:</strong>&nbsp; 055 2212389<br>
							<strong>Fax:</strong>&nbsp; 055 2212389<br>
							<strong>Email:</strong>&nbsp;<a href="mailto:chiranthajtk@gmail.com">chiranthajtk@gmail.com</a>								
							</p>
							<br/>
							<h5>OWNER INFORMATION</h5>
							<p><strong>Owner: Karunasena Hettiarachchi</strong><br>
							<p><strong>Phone:</strong>&nbsp;079 22158794<br>
											
							</p>
						</div>
					</div>
					<div class="span7">
						<p> We are giving for you last amount of service from our organization. Visit our place and go on our online shopping mall. If you happy or no , please note down below.
							We are going on your comments.</p>
						<form method="post" action="mailto:chiranthajtk@gmail.com" enctype="text/plain">
							<fieldset>
								<div class="clearfix">
									<label for="name"><span>Name:</span></label>
									<div class="input">
										<input tabindex="1" size="18" id="name" name="name" type="text" value="" class="input-xlarge" placeholder="Name">
									</div>
								</div>
								
								<div class="clearfix">
									<label for="email"><span>Email:</span></label>
									<div class="input">
										<input tabindex="2" size="25" id="email" name="email" type="email" value="" class="input-xlarge" placeholder="Email Address">
									</div>
								</div>
								
								<div class="clearfix">
									<label for="message"><span>Message:</span></label>
									<div class="input">
										<textarea tabindex="3" class="input-xlarge" id="message" name="message" rows="7" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="clearfix">
									<label for="spam"><span>*What is 2+2? (Anti- spam)</span></label>
									<div class="input">
									<input tabindex="1" size="18" id="name" name="human" type="text" value="" class="input-xlarge" placeholder="value">
									</div>
								</div>
								
								<div class="actions">
									<button tabindex="3" type="submit" name="sendBtn" class="btn btn-inverse">Send message</button>
								</div>
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
    </body>
</html>