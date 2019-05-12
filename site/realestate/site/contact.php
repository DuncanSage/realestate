<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Allison Whaites - Contact</title>
	<meta charset="UTF-8">
	<meta name="description" content="Allison Whaites Real Estate Homepage">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/mystyle.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section -->
	<?php 

		include "header.php";

	?>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Contact</h2>
		</div>
	</section>
	<!--  Page top end -->



	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="realesate/site/index.php"><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Contact</span>
		</div>
	</div>






	<!-- page -->
	<section class="page-section blog-page">
		<div class="container">

			<!-- <div class="contact-info-warp">
				<p><i class="fa fa-map-marker"></i>3711-2880 Nulla St, Mankato, Mississippi</p>
				<p><i class="fa fa-envelope"></i>info.leramiz@colorlib.com</p>
				<p><i class="fa fa-phone"></i>(+88) 666 121 4321</p>
			</div> -->
			
	<section class="services-section spad contact-info">
		<div class="container">
			<div class="row">

				<div class="col-lg-8">

					<div class="section-title">
						<h1>Get in touch</h1>
					</div>
					<br>
						<h4>Looking at renting, buying or leasing?</h4>
						<h4>The first step towards your new home or bussines is to contact Allison Whaites. <br>Real estate sales and property management made simple.</h4>


				</div>

				<div class="col-lg-4 contact-details">
					
					<div class="services">
						<div class="section-title">
							<h3>Contact details</h3>
						</div>

						<div class="service-item">
							<i class="fas fa-phone"></i>
							<div class="service-text">
								<h5>Phone numbers:</h5>
								<p><a href="tel:0487289471">Mobile: 0487 289 471</a></p>
							</div>
						</div>

						<div class="service-item">
							<i class="fas fa-envelope-square"></i>
							<div class="service-text">
								<h5>Email:</h5>
								<p><a href = "mailto:info@fngrafton.com.au">info@fngrafton.com.au</a></p>
							</div>
						</div>

						<div class="service-item">
							<i class="far fa-clock"></i>
							<div class="service-text">
								<h5>Available times</h5>
								<p>9 AM to 5 PM <br>Monday to Friday</p>
							</div>
						</div>

						<div class="section-title">
							<h3>Social Media</h3>
						</div>

						<div class="service-item">
							<i class="fab fa-facebook-square"></i>
							<div class="service-text">
								<h5>Facebook</h5>
								<p><a href="https://www.facebook.com/AllisonWhaitesClarenceValley/">Allison Whaites</a></p>
							</div>
						</div>

						<div class="service-item">
							<i class="fab fa-instagram"></i>
							<div class="service-text">
								<h5>Instagram</h5>
								<p><a href="https://www.instagram.com/allison_whaites_estate_agent/">allison_whaites_estate_agent</a></p>
							</div>
						</div>

					</div>
				</div>

				
				
			</div>
		</div>
	</section>

			<div class="row">

				<div class="col-lg-6 order-md-2">
					<div class="mapouter">
						<div class="gmap_canvas">
							<iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=grafton%20NSW%20Aus&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
						</div>
					</div>
				</div>

				<div class="col-lg-6 order-md-1">
					<div class="contact-left">

						<?php

							if (isset($_SESSION['re'])){ 

					    		$result = $_SESSION['re'];

					    		if ($result == 'succss'){
					    		?>

					    		<div class="section-title">
									<h3>Thank you for contacting us.</h3>
									<h5>We will get back to you as soon as possible</h5>
									<h5><a href="contact.php">Back to form.</a></h5>
								</div>

					    		<?php
								} elseif ($result == 'error') {
								?>

								<div class="section-title">
									<h3>Error please try again.</h3>
									<h5><a href="contact.php">Back to form.</a></h5>
								</div>

								<?php
								}
					    	} else{

					    ?>

						<div class="section-title">
							<h3>Send us a message</h3>
						</div>

						<!-- Contact form section. -->
						<form class="contact-form" method="post" action="send_mail.php">
							<p style="color: red">*required field</p>
							<div class="row">

								<div class="col-md-6">
									<label>First Name:<span style="color: red"> *</span></label>
									<input type="text" name="fname" required >
								</div>

								<div class="col-md-6">
									<label>Last Name:<span style="color: red"> *</span></label>
									<input type="text" name="lname" required >
								</div>

								<div class="col-md-12">
									<label>Email:<span style="color: red"> *</span></label>
									<input type="email" name="email" required>
								</div>

								<div class="col-md-12">
									<label>Phone number: (optional)</label>
									<input type="number" name="pnumber">
								</div>

								<div class="col-md-12" style="display: none;">
									<label>do not enter press tab again</label>
									<input type="text" name="firstname">
								</div>							

								<div class="col-md-12">
									<label>Your message:<span style="color: red"> *</span></label>
									<textarea class='autoexpand' rows='1' data-min-rows='3' name="message" required></textarea>
									<button class="site-btn" type="submit">Send</button>							
								</div>

							</div>
						</form>
						<!-- Contact form section end. -->
						<?php 
						};
						unset($_SESSION['re']);
						?>


						<!-- Extra contact forms will be added -->

					</div>
				</div>


			</div>

		</div>
	</section>
	<!-- page end -->


	<!-- Clients section -->
	<!-- <div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel">
				<a href="#">
					<img src="img/partner/1.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/2.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/3.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/4.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/5.png" alt="">
				</a>
			</div>
		</div>
	</div> -->
	<!-- Clients section end -->


	<!-- Footer section -->
	<?php

		include "footer.php"

	?>
	<!-- Footer section end -->
                                        
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/myscript.js"></script>

	<!-- load for map -->
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
	<script src="js/map.js"></script> -->

	<!-- form captcha -->
	<!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->


</body>
</html>