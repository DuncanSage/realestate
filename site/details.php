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

	// $sql = "SELECT `dsage_property`.*, `dsage_team`. `fname`, `lname`, `workphone`, `mobilephone`, `email`, `profilepic`
	// FROM `dsage_property`
	// INNER JOIN `dsage_team` 
	// 	ON `dsage_team`.`id` = `dsage_property`.`salesrepid`
	// WHERE `dsage_property`.`id` = $current_id";
	
	// $sql2 = "SELECT `dsage_propertyimages`. `imagepath`
	// FROM `dsage_propertyimages`
	// WHERE `dsage_propertyimages`.`propertyid` = $current_id";

	//$sql = "SELECT * FROM `dsage_property` WHERE `id` = $current_id ";

	$sql = "SELECT `dsage_property`.*, `dsage_propertyimages`.*, `dsage_team`. `fname`, `lname`, `workphone`, `mobilephone`, `email`, `profilepic`
	FROM `dsage_property`
	INNER JOIN `dsage_team` 
		ON `dsage_team`.`id` = `dsage_property`.`salesrepid`
	LEFT JOIN `dsage_propertyimages` 
		ON `dsage_property`.`id` = `dsage_propertyimages`.`propertyid`  
	WHERE `dsage_property`.`id` = $current_id";
	//echo "$sql";

    

    $result = mysqli_query($dbconn, $sql);
  	$resultloop = mysqli_query($dbconn, $sql);
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
    						while ($rowloop = mysqli_fetch_array($resultloop)) {    							
    					?>

    							<div class="sl-item set-bg" style="background-position: center;" data-setbg="img/<?php echo $rowloop['imagepath']; ?>">
    								<div class="<?php echo $row['status']; ?>-notice">FOR <?php echo strtoupper($rowloop['status']); ?></div>
    							</div>
    							<?php
    						}
    						mysqli_data_seek($resultloop, 0);
    						
						?>

					</div>

					<div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
						<?php
    						while ($rowloop = mysqli_fetch_array($resultloop)) {	
    					?>

     				<div class="sl-thumb set-bg" data-setbg="img/<?php echo $rowloop['imagepath']; ?>"></div>
 
    					<?php
    						}
    						mysqli_data_seek($resultloop, 0);
						?>
						
					</div>
					<div class="single-list-content">
						<div class="row">

							<div class="col-xl-8 sl-title">
								<?php
    						
    						//mysqli_data_seek($result, 1);
						?>
								<h2><?php echo $row['streetnumber'].' '.$row['streetname'];?></h2>
								<p><i class="fa fa-map-marker"></i><?php echo $location;?></p>
							</div>

							<div class="col-xl-4">
								<h3>
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
								</h3>
							</div>

						</div>
						<h3 class="sl-sp-title">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<?php
										//echos details of property if not empty
											if (!empty($row['size'])) 
											{
											echo '<p><i class="fa fa-th-large"></i>Size '.$row['size'].'m<sup>2</sup></p>';
											}
										
											if (!empty($row['bedrooms'])) 
											{
												echo '<p><i class="fa fa-bed"></i>Bedrooms: '.$row['bedrooms'].'</p>';
											}
									
										?>
								<p><i class="fa fa-user"></i><?php echo $repname; ?></p>
							</div>
							<div class="col-md-4 col-sm-6">
								<?php
											if (!empty($row['garages'])) 
											{
												echo '<p><i class="fa fa-car"></i>Garages: '.$row['garages'].'</p>';
											}
										
											if (!empty($row['barthroom'])) 
											{
												echo '<p><i class="fa fa-bath"></i>Barthrooms: '.$row['barthroom'].'</p>';
											}
										?>
							
								
							</div>
							<div class="col-md-4">
								<?php 

								if (!empty($row['type'])) 
											{
												echo '<p><i class="fa fa-home"></i>Type: '.$row['type'].'</p>';
											}

											if ( $datediff > 0) 
											{
												echo '<p><i class="fa fa-clock"></i>Listed ' .$datediff. ' days ago</p>';
											};
											?>
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
							<a href="teammember.php?id=<?php echo $row['id']; ?>">
								<h5><?php echo $repname; ?></h5>
							</a>
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
						<h5>Enquiries</h5>
						<?php

							if (isset($_SESSION['re'])){ 

					    		$result = $_SESSION['re'];

					    		if ($result == 'succss'){
					    		?>

					    		<div class="section-title">
									<h3>Thank you for contacting us.</h3>
									<h5>We will get back to you as soon as possible</h5>
									<h5><a href="">Back to form.</a></h5>
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
									<textarea id="" class='' name="message" required></textarea>
									<button class="" type="submit"  tabindex="0">Send</button>							
								</div>

							</div>
						</form>
						<!-- Contact form section end. -->
						<?php 
						};
						unset($_SESSION['re']);
						?>

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