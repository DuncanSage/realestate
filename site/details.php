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

	$sql = "SELECT `dsage_property`.*, `dsage_team`. `fname`, `lname`, `workphone`, `mobilephone`, `email`, `profilepic`
	FROM `dsage_property`
	INNER JOIN `dsage_team` 
		ON `dsage_team`.`id` = `dsage_property`.`salesrepid`
	WHERE `dsage_property`.`id` = $current_id";
	
	$sql2 = "SELECT `dsage_propertyimages`. `imagepath`
	FROM `dsage_propertyimages`
	WHERE `dsage_propertyimages`.`propertyid` = $current_id";

	// $sql = "SELECT `dsage_property`.*, `dsage_propertyimages`.*, `dsage_team`. `fname`, `lname`, `workphone`, `mobilephone`, `email`, `profilepic`
	// FROM `dsage_property`
	// INNER JOIN `dsage_team` 
	// 	ON `dsage_team`.`id` = `dsage_property`.`salesrepid`
	// INNER JOIN `dsage_propertyimages` 
	// 	ON `dsage_propertyimages`.`propertyid` = `dsage_property`.`id` 
	// WHERE `dsage_property`.`id` = $current_id";


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
	 $row['addresstype'].' ' 
	.$row['addressid'].' '
	.$row['streetnumber'].' '
	.$row['streetname'].' '
	.$row['suburb'].' '
	.$row['city'].' '
	.$row['state'];
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

						<?php  

							$result2 = mysqli_query($dbconn, $sql2);
    						$row2 = mysqli_fetch_array($result2);

    						// while ($row2 = mysqli_fetch_array($result2)) {
    						// 	echo $row2['imagepath'];
    						// }
							// foreach ($row2 as $key => $value) {
							// 	echo "$value";
							// }

						?>

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
								<h2><?php echo $row['streetnumber'].' '.$row['streetname'];?></h2>
								<p><i class="fa fa-map-marker"></i><?php echo $location;?></p>
							</div>

							<div class="col-xl-4">
								<a href="#" class="price-btn">
									<?php
								
									if ($row['status'] == 'rent') 
									{
										echo '$'.number_format($row['price']). ' perweek'; 
									}
									elseif ($row['status'] == 'sale')
									{
										echo '$'.number_format($row['price']);

									}
									else 
									{
										echo 'For Auction'; 
									}

									?>
								</a>
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
								<p  tabindex="0">
									<?php 
										$subject = $row['description'];
										$subject = nl2br($subject);
										echo $subject;
									?>
								</p>
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
						<div class="author-img set-bg" data-setbg="img/team/<?php echo $row['profilepic']; ?>"></div>
						<div class="author-info">
							<h5><?php echo $repname; ?></h5>
						</div>
						<div class="author-contact">
							<?php 
								function displayContact($con) 
								{
									if (!empty($con)) {
										if (strpos($con, '@') == false) 
										{
											$x = "<p><a href='tel: ".$con."'><i class='fa fa-phone'></i>  " .$con. "</p></a>";
										}
										else 
										{
											$x = "<p><a href='mailto: ".$con."'><i class='fa fa-envelope'></i>  " .$con. "</p></a>";
										}
										return $x;
									}
									return;
								}
								
								echo displayContact( $row['workphone'] );
								echo displayContact( $row['mobilephone'] );
								echo displayContact( $row['email'] );
								
							?>
						</div>
					</div>

					<div class="col-md-12">
					<?php 
						if (!empty($row['highlights'])) {
							// echos the highlights of the property from the database
							// Im sure there is a better way to do this but i can't find one and this works

							echo '<h4>Property Highlights</h4><br>';

							// turns the value of the highlights element in the array "$row" into a string.
							$highlights = $row['highlights'];

							//turns the string into a array
							$highlights = explode(',', $highlights);

							//echos the new array's elements
							foreach ($highlights as $a) {
							echo "<p><i class='fas fa-check-circle'></i> $a </p>";
							}
						}
					?>
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