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
			
			<h2>About Us</h2>
			
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
			<span><i class="fa fa-angle-right"></i>About us</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section">
		<div class="container">
			<div class="row about-text">
				<div class="col-12" tabindex="0">
					<h5>ABOUT US</h5>
					<h4>We are a real estate company based in Grafton NSW.</h4>
				</div>
			</div>
		</div>
		
		<!-- Team section -->
		<section class="team-section spad">
			<div class="container">
				<div class="section-title text-center" tabindex="0">
					<h3>OUR TEAM</h3>
					<p></p>
				</div>
				<div class="row">

<?php
$query  = "SELECT * FROM dsage_team";

$result = mysqli_query($dbconn, $query);
$num_records = mysqli_num_rows($result);
if ($num_records < 1)
{
	echo "<h3 style=color:#990000> No records found</h3>";
} 
else
{

	while($row = mysqli_fetch_array($result))
	{
?>

<!--================================ block repeating for Team items ================================-->

					<div class="col-lg-3 col-md-6" style="margin-bottom: 30px;">
						<div class="team-member">
							<a href="teammember.php?id=<?php echo $row['id']; ?>"><span id="details-link"></span></a>
							<div class="member-pic">
								<img src="img/team/<?php echo $row['profilepic']; ?>" alt="Team member profile image for <?php echo $row['fname']. ' ' .$row['lname']; ?>">
								<!-- <div class="member-social">
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-twitter"></i></a>
								</div> -->
							</div>
							<div class="member-info">
								<h5><?php echo $row['fname']. ' ' .$row['lname']; ?></h5>
								<span><?php echo $row['role']?></span>
								<div class="member-contact">
									<?php 
									if (!empty($row['workphone'])) 
									{
										echo '<p><i class="fa fa-phone"></i>' .$row['workphone']. '</p>';
									}
									elseif (!empty($row['mobilephone'])) 
									{
										echo '<p><i class="fa fa-phone"></i>' .$row['mobilephone']. '</p>';
									}
									?>
									
									<p><i class="fa fa-envelope"></i><?php echo $row['email']; ?></p>
								</div>
							</div>
						</div>
					</div>
<!--================================ block repeating for Team items ================================-->

<?php
	}
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