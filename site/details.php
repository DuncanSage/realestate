<!DOCTYPE html>

<?php
include "opendb.php";

if (!$dbconn) 
{
	die("Connection failed: " . mysqli_connect_error());
} 
if (isset($_REQUEST['id']))
{ 
    $current_id = $_REQUEST['id']; 

	$sql = "SELECT `dsage_property`.*, `dsage_team`.*
	FROM `dsage_property`
	INNER JOIN `dsage_team` ON `dsage_team`.`id` = `dsage_property`.`salesrepid` 
	WHERE `dsage_property`.`id` = $current_id";
	
    //$sql = "SELECT * FROM `dsage_property` WHERE `id` = $current_id ";
    $result = mysqli_query($dbconn, $sql);
    $row = mysqli_fetch_array($result);
    $num_records = mysqli_num_rows($result);

	$repname = $row['fname']. ' ' .$row['lname'];

	$timestamp = $row['listdate']; //date from DB to string

	$now = time(); //todays
	$listdate = strtotime("$timestamp");
	$datediff = $now - $listdate;

	$datediff = round($datediff / (60 * 60 * 24));

	$location = 
	'<p><i class="fa fa-map-marker"></i>'
	.$row['addresstype'].' ' 
	.$row['addressid'].' '
	.$row['streetnumber'].' '
	.$row['streetname'].' '
	.$row['suburb'].' '
	.$row['city'].' '
	.$row['state']. '</p>';
 }
 else 
 {
	header('Location: properties.php');
 }

?>
<html lang="en">

<?php 

	include "head.php";

?>


<body>
	<!-- Page Preloder -->
	<!-- <div id="preloder">
		<div class="loader"></div>
	</div> -->
	
	<!-- Page top section -->
	<section class="hero-section page-top-section set-bg" data-setbg="img/about.jpg" data-setbgcover="img/cover.png">
		<div class="hero-text text-white set-bg" data-setbgcover="img/cover2.png"  tabindex="0">
			
			<h2><?php echo $row['streetnumber'].' '.$row['streetname']; ?></h2>
			
		</div>

		<!-- Header section -->
		<?php 
			include "header.php"
		?>
		<!-- Header section end -->

	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="index.php"><i class="fa fa-home"></i>Home</a>
			<?php 
				if ($_REQUEST['from'] == 'properties') 
				{
			?>
				<a href="properties.php"><i class="fa fa-angle-right"></i>Properties</a>
			<?php 
				}
			 ?>
			<span><i class="fa fa-angle-right"></i><?php echo $row['streetnumber'].' '.$row['streetname']; ?></span>
		</div>
	</div>

	<!-- Page -->
	<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 single-list-page">
					<div class="single-list-slider owl-carousel" id="sl-slider">
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/1.jpg">
							<div class="sale-notice">FOR SALE</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/2.jpg">
							<div class="rent-notice">FOR Rent</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/3.jpg">
							<div class="sale-notice">FOR SALE</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/4.jpg">
							<div class="rent-notice">FOR Rent</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/5.jpg">
							<div class="sale-notice">FOR SALE</div>
						</div>
					</div>
					<div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/1.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/2.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/3.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/4.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/5.jpg"></div>
					</div>
					<div class="single-list-content">
						<div class="row">
							<div class="col-xl-8 sl-title">
								<h2>305 North Palm Drive</h2>
								<p><i class="fa fa-map-marker"></i>Beverly Hills, CA 90210</p>
							</div>
							<div class="col-xl-4">
								<a href="#" class="price-btn">$4,500,000</a>
							</div>
						</div>
						<h3 class="sl-sp-title">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-th-large"></i> 1500 Square foot</p>
								<p><i class="fa fa-bed"></i> 16 Bedrooms</p>
								<p><i class="fa fa-user"></i><?php echo $repname; ?></p>
							</div>
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-car"></i> 2 Garages</p>
								<p><i class="fa fa-home"></i> Family Villa</p>
								<p><i class="fa fa-clock"></i> 1 days ago</p>
							</div>
							<div class="col-md-4">
								<p><i class="fa fa-bath"></i> 8 Bathrooms</p>
							</div>
						</div>
						<h3 class="sl-sp-title">Description</h3>
						<div class="description">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas fermentum ornareste. Donec index lorem. Vestibulum  aliquet odio, eget tempor libero. Cras congue cursus tincidunt. Nullam venenatis dui id orci egestas tincidunt id elit. Nullam ut vuputate justo. Integer lacnia pharetra pretium. Casan ante ipsum primis in faucibus orci luctus et ultrice.</p>
							</div>
						
						<!-- <h3 class="sl-sp-title bd-no">Floorplans</h3>
						<div id="accordion" class="plan-accordion">
							<div class="panel">
								<div class="panel-header" id="headingOne">
									<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">First Floor: <span>660 sq ft</span>	<i class="fa fa-angle-down"></i></button>
								</div>
								<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="panel-body">
										<img src="img/plan-sketch.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header" id="headingTwo">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Second Floor:<span>610 sq ft.</span>	<i class="fa fa-angle-down"></i>
									</button>
								</div>
								<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="panel-body">
										<img src="img/plan-sketch.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header" id="headingThree">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Third Floor :<span>580 sq ft</span>	<i class="fa fa-angle-down"></i>
									</button>
								</div>
								<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="panel-body">
										<img src="img/plan-sketch.jpg" alt="">
									</div>
								</div>
							</div>
						</div> -->

						<!-- <h3 class="sl-sp-title bd-no">Location</h3>
						<div class="pos-map" id="map-canvas"></div> -->
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-lg-4 col-md-7 sidebar">
					<div class="author-card">
						<div class="author-img set-bg" data-setbg="img/author.jpg"></div>
						<div class="author-info">
							<h5>Gina Wesley</h5>
							<p><?php echo $repname; ?></p>
						</div>
						<div class="author-contact">
							<?php 
									if (!empty($row['workphone'])) 
									{
										echo '<p><i class="fa fa-phone"></i>' .$row['workphone']. '</p>';
									}
									if (!empty($row['mobilephone'])) 
									{
										echo '<p><i class="fa fa-phone"></i>Mob: ' .$row['mobilephone']. '</p>';
									}
									if (!empty($row['mobilephone'])) 
									{
										echo "<p><a href='tel:$row['email']'><i class='fa fa-envelope'></i> $row['email'] </p>";
									}
									<a href="tel:0487289471">Mobile: 0487 289 471</a>
									?>
						</div>
					</div>

					<h4>Property Highlights</h4>
							<div class="col-md-4 col-sm-6">
								<p><i class="fas fa-check-circle"></i> Air conditioning</p>
								<p><i class="fas fa-check-circle"></i> Telephone</p>
								<p><i class="fas fa-check-circle"></i> Laundry Room</p>
							</div>
							<div class="col-md-4 col-sm-6">
								<p><i class="fas fa-check-circle"></i> Central Heating</p>
								<p><i class="fas fa-check-circle"></i> Family Villa</p>
								<p><i class="fas fa-check-circle"></i> Metro Central</p>
							</div>
							<div class="col-md-4">
								<p><i class="fas fa-check-circle"></i> City views</p>
								<p><i class="fas fa-check-circle"></i> Internet</p>
								<p><i class="fas fa-check-circle"></i> Electric Range</p>
							</div>

					<div class="contact-form-card">
						<h5>Do you have any question?</h5>
						<form>
							<input type="text" placeholder="Your name">
							<input type="text" placeholder="Your email">
							<textarea placeholder="Your question"></textarea>
							<button>SEND</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page end -->




	<!-- Footer section -->
	<?php 

		include "footer.php"

	?>
	<!-- Footer section end -->
                                        
	<!--====== Javascripts & Jquery ======-->
	<script src="js/magnific-popup.min.js"></script>  
	<script src="js/owl.carousel.min.js"></script> 
	<script src="js/masonry.pkgd.min.js"></script>
</body>
</html>