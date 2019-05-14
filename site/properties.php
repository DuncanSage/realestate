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

	<!-- Page top section -->
	<section class="hero-section page-top-section set-bg" data-setbg="img/about.jpg" data-setbgcover="img/cover.png">
		<div class="hero-text text-white set-bg" data-setbgcover="img/cover2.png" tabindex="0">
			
			<h2>Properties</h2>
			
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
			<span><i class="fa fa-angle-right"></i>Properties</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section">
		<div class="container">
			<div class="row about-text">
				<div class="col-12" tabindex="0">
					<h5>Properties</h5>
					<!-- <h4>For rent or sale.</h4> -->
				</div>
			</div>
		</div>
		
		<!-- Property section -->
		<section class="feature-section spad">
			<div class="container">
				<div class="section-title text-center" tabindex="0">
					<h3>Current Properties</h3>
					<p></p>
				</div>
				<div class="row">

				<?php 

				$sql = "SELECT `dsage_property`.*, `dsage_team`.`fname`, `dsage_team`.`lname`
				FROM `dsage_property`
				INNER JOIN `dsage_team` ON `dsage_team`.`id` = `dsage_property`.`salesrepid` 
				WHERE `active` = 1";

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
						<a href="https://www.fngrafton.com.au/"><span id="details-link"></span></a>
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
<!--=================================== block repeating for items end =================================-->
<?php
    } 
} else {
    	echo "<h3 style=color:#990000> No records found</h3>";
    }
?>
				</div>
			</div>
		</section>
		<!-- Team section end-->

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