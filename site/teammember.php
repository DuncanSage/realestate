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
    $sql = "SELECT * FROM `dsage_team` WHERE `id` = $current_id ";
    $result = mysqli_query($dbconn, $sql);
    $row = mysqli_fetch_array($result);
 }
 else 
 {
	header('Location: about.php');
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
			
			<h2><?php echo $row['fname']. ' ' .$row['lname']; ?></h2>
			
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
			<a href="about.php"><i class="fa fa-angle-right"></i>About us</a>
			<span><i class="fa fa-angle-right"></i><?php echo $row['fname']. ' ' .$row['lname']; ?></span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section">
		<div class="container">
			
			<div class="row about-text">
				<div class="col-xl-4 about-text-right order-xl-2">
					<img class="mb-5" src="img/team/<?php echo $row['profilepic']; ?>" alt="Team member profile image for <?php echo $row['fname']. ' ' .$row['lname']; ?>" style="width:100%; border-radius: 3px; ">
					<h5  tabindex="0" ><?php echo $row['fname']. ' ' .$row['lname']; ?></h5>
					<div class="member-contact"  tabindex="0">
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
				<div class="col-xl-8 about-text-left order-xl-1">
					<h5  tabindex="0">ABOUT <?php echo $row['fname'] ?></h5>
					<p  tabindex="0">
					<?php 
						$subject = $row['description'];
						// $string = str_replace(".", ".<br><br>", $subject);
						$subject = nl2br($subject);
						echo $subject;
					?>
					 	
					 </p>
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