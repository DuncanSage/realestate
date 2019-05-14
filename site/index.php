<!DOCTYPE html>
<?php
include "opendb.php";

	if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
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

	<!-- Hero section -->
	<section class="hero-section page-top-section main set-bg" data-setbg="img/bg7.jpg" data-setbgcover="img/cover.png">
		<div class="hero-text text-white set-bg" data-setbgcover="img/cover2.png" tabindex="0">
			<h2>find your place</h2>
			<p>Renting or Buying Comercial or Private<br>Professional Property management in the Clarence Valley</p>
			<!-- <a href="#" class="site-btn">VIEW DETAIL</a> -->
		</div>
		<!-- Header section -->
		<?php 
			include "header.php"
		?>
		<!-- Header section end -->
	</section>
	<!-- Hero section end -->

	<!-- Services section -->
	<section class="services-section spad">

		<div class="container">

			<div class="row justify-content-center">
				<div class="section-title text-center" tabindex="0">
					<h3>OUR SERVICES</h3>
					<h5>We provide the perfect service for </h5>
				</div>
			</div>

			<div class="row justify-content-center">

				<div class="col-lg-4" tabindex="0">
					<div class="service-item">
						<i class="fas fa-suitcase"></i>
						<div class="service-text">
							<h5>Sales and Rental</h5>
							<br>
							<p>Expertise in residential, commercial, industrial, and rural properties. <br>The support and understanding of a professional real estate agent with local market knowledge makes all the difference.</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4" tabindex="0">
					<div class="service-item">
						<i class="fa fa-home"></i>
						<div class="service-text">
							<h5>Property Management</h5>
							<br>
							<p>Whether you are a first time investor, multiple owner or you’re considering leasing out your family home, our Property Management can make a world of difference.</p>
						</div>
					</div>
				</div>	

				<div class="col-lg-4" tabindex="0">
					<div class="service-item">
						<i class="fas fa-balance-scale"></i>
						<div class="service-text">
							<h5>Fair Trading</h5>
							<br>
							<p>Fair Trading Legislations explained with answers to all your questions whether you are a vendor, purchaser or tenant.</p>
						</div>
					</div>
				</div>

			</div>
					
		</div>

	</section>
	<!-- Services section end -->


	<!-- feature section -->
	<section class="feature-section spad">
		<div class="container">
			<div class="section-title text-center" tabindex="0">
				<h3>Featured Properties</h3>
				<p></p>
			</div>
			<div class="row justify-content-center">

			<?php 

			$sql = "SELECT `dsage_property`.*, `dsage_team`.`fname`, `dsage_team`.`lname`
			FROM `dsage_property`
			INNER JOIN `dsage_team` ON `dsage_team`.`id` = `dsage_property`.`salesrepid` 
			WHERE `active` AND `featured` = 1";


			// echo "sql statement $sql";


			$result = mysqli_query($dbconn, $sql);

			if (mysqli_num_rows($result) > 0) 
			{
    			while($row = mysqli_fetch_assoc($result)) 
    			{

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

			?>

<!--================================ block repeating for items ================================-->
				<div class="col-xl-3 col-lg-4 col-md-6" tabindex="0">
					<!-- feature -->
					<div class="feature-item">
						<a href="https://www.fngrafton.com.au/" target="_blank"><span id="details-link"></span></a>
						<div class="feature-pic set-bg" data-setbg="<?php echo 'img/properties/'.$row['thumbnail'] ?>">
							<div class="<?php echo $row['status']; ?>-notice">FOR <?php echo strtoupper($row['status']); ?></div>
						</div>
						<div class="feature-text">
							<div class="text-center feature-title">
								<?php  

								echo '<h5>'.$row['streetnumber'].' '.$row['streetname'].'</h5>';

								echo $location;

								?>
							</div>
							<div class="room-info-warp">
								<div class="room-info">
									<div class="rf-left">
										<?php
											if ($row['size'] > 0) 
											{
											echo '<p><i class="fa fa-th-large"></i>'.$row['size'].'m<sup>2</sup></p>';
											}
										
											if ($row['bedrooms'] > 1) 
											{
												echo '<p><i class="fa fa-bed"></i>'.$row['bedrooms'].' Bedrooms</p>';
											}
											elseif ($row['bedrooms'] = 1) 
											{
												echo '<p><i class="fa fa-bed"></i>'.$row['bedrooms'].' Bedroom</p>';
											}
										?>
									</div>
									<div class="rf-right">
										<?php
											if ($row['garages'] > 1) 
											{
												echo '<p><i class="fa fa-car"></i>'.$row['garages'].' Garages</p>';
											}
											elseif ($row['garages'] = 1) 
											{
												echo '<p><i class="fa fa-car"></i>'.$row['garages'].' Garage</p>';
											}
										
											if ($row['barthroom'] > 1) 
											{
												echo '<p><i class="fa fa-bath"></i>'.$row['barthroom'].' Barthrooms</p>';
											}
											elseif ($row['barthroom'] = 1) 
											{
												echo '<p><i class="fa fa-bath"></i>'.$row['barthroom'].' Barthroom</p>';
											}
										?>
									</div>	
								</div>
								<div class="room-info">
									<div class="rf-left">
										<p><i class="fa fa-user"></i></i><?php echo $repname; ?></p>
									</div>
									<div class="rf-right">
										<?php 
											if ( $datediff > 0) 
											{
												echo '<p>Listed ' .$datediff. ' days ago</p>';
											};
											?>
										
									</div>	
								</div>
							</div>
							<p href="http://www.fngrafton.com.au/real-estate/1238184/2-15-gosford-close-grafton-nsw-2460" target="_blank" class="room-price">
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
							</p>
						</div>
					</div>
				</div>
<!--=================================== block repeating for featuerd items end =================================-->
			<?php
				} 
			} 
			else 
			{
				echo "<h3 style=color:#990000> No records found</h3>";
			}
			?>

			</div> <!-- end row -->
		</div>
	</section>
	<!-- feature section end -->

	<?php 
		include "footer.php"
	?>
	<!-- Footer section end -->
                                        
<!--====== Javascripts & Jquery ======-->

</body>
</html>