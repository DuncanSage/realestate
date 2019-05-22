<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<?php 

	include "head.php";

?>

<body>
	<!-- Page Preloder -->
	<!-- <div id="preloder">
		<div class="loader"></div>
	</div> -->
	 
<!-- Hero section -->
	<section class="hero-section page-top-section set-bg" data-setbg="img/page-top-bg.jpg" data-setbgcover="img/cover.png">
		<div class="hero-text text-white set-bg" data-setbgcover="img/cover2.png" tabindex="0">
			
			<h2>Contact</h2>
			
		</div>

		<!-- Header section -->
		<?php 
			include "header.php"
		?>
		<!-- Header section end -->
	</section>
	<!-- Hero section end -->

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
			
	<section class="services-section contact-spad contact-info">
		<div class="container">
			<div class="row">

				<div class="col-lg-6 col-md-12" tabindex="0">

					<div class="section-title">
						<h1>Get in touch</h1>
					</div>
					<br>
						<h4>
							Looking at renting, buying or leasing?
						</h4>
						<br>
						<h4>
							The first step towards your new home or bussines is to contact Allison Whaites. 
						</h4>
						<br>
						<h4>
							Real estate sales and property management made simple.
						</h4>
						


				</div>

				<div class="col-lg-3 col-md-6 contact-details" tabindex="0">
					
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
							<div class="service-text ">
								<h5>Available times</h5>
								<p>9 AM to 5 PM <br>Monday to Friday</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 contact-details"  tabindex="0">
					
					<div class="services">			
						<div class="section-title">
							<h3>Social Media</h3>
						</div>

						<div class="service-item">
							<i class="fab fa-facebook-square"></i>
							<div class="service-text">
								<h5>Facebook</h5>
								<p><a href="https://www.facebook.com/AllisonWhaitesClarenceValley/" target="_blank">Allison Whaites</a></p>
							</div>
						</div>

						<div class="service-item">
							<i class="fab fa-instagram"></i>
							<div class="service-text">
								<h5>Instagram</h5>
								<p><a href="https://www.instagram.com/allison_whaites_estate_agent/" target="_blank">allison_whaites_estate_agent</a></p>
							</div>
						</div>

					</div>
				</div>

				
				
			</div>
		</div>
	</section>
	<br>

			<div class="row">

				<div class="col-lg-6 order-md-2"  >
					<div class="mapouter">
						<div class="gmap_canvas">
							<iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=grafton%20NSW%20Aus&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" tabindex="-1"></iframe>
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
									<textarea name="message" required></textarea>
									<button class="site-btn" type="submit"  tabindex="0">Send</button>							
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

	<!-- Footer section -->
	<?php

		include "footer.php"

	?>
	<!-- Footer section end -->
                                        
	<!--====== Javascripts & Jquery ======-->


</body>
</html>