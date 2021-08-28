<?php 

session_start();

if($_SESSION['admin_name']==true){
	}
	else{
		header('location: login.php');
	}

include ("includes/db.php");
?>
<html>
<head>
	<title>Mechanico | Index</title>
	
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all" />
</head>
<body>
	<!-- Main Container Start -->
	<div class="wrapper">
		
		<!-- Header Start -->
		<div class="header">
			<a href="index.php"><img src="images/header.jpg"></a>
			<!-- <img src="images/add2card.jpg" style="float: right"> -->
		</div>
		<!-- Header End -->
		
		<!-- Content Start -->
		<div class="content_wrapper">
			<div class="right" style="background-image: url(images/carw4.jpg); background-repeat: no-repeat;  background-size: cover">
					<a href="index.php?view_users">View Customer</a>
					<a href="index.php?view_cars">View Cars</a>
					<a href="index.php?add_cars">Add Cars</a>
					<a href="index.php?view_garage">View Garage</a>
					<a href="index.php?view_Parts">View PartsShop</a>
					<a href="index.php?add_Parts">Add Parts</a>
					<a href="logout.php">Admin Logout</a>
			</div>
			<div class="left" style="background-image: url(images/carw2.jpg); background-repeat: no-repeat;  background-size: cover">
				<!-- Product Display Box Start -->
					<div id="products_box">
						<?php
							if (isset($_GET['view_users'])) {
								include("view_users.php");
							}
							if (isset($_GET['view_cars'])) {
								include("view_cars.php");
							} 
							if (isset($_GET['add_cars'])) {
								include("add_cars.php");
							}
							if (isset($_GET['view_garage'])) {
								include("view_garage.php");
							}
							if (isset($_GET['view_Parts'])) {
								include("view_parts.php");
							}
							if (isset($_GET['add_Parts'])) {
								include("add_parts.php");
							}
							if (isset($_GET['edit_parts'])) {
								include("edit_parts.php");
							}
							if (isset($_GET['edit_cars'])) {
								include("edit_cars.php");
							}
							if (isset($_GET['delete_cars'])) {
								include("delete_cars.php");
							}
							if (isset($_GET['delete_parts'])) {
								include("delete_parts.php");
							}
							if (isset($_GET['delete_user'])) {
								include("delete_user.php");
							}

						?>
					</div>
					<!-- Product Display Box End -->
			</div>
		</div>
		<!-- Content End -->

		<!-- footer Start -->
		<div class="footer" style="background-image: url(images/carw5.jpg); background-repeat: no-repeat;  background-size: cover">
			<h5 style="color:#fff; padding-top:30px; text-align:center; font-family: Verdana, Geneva, sans-serif">&copy; 2021 all rights reserved | Developed By: MECHANICO</h5>
		</div>
		<!-- Footer End -->

	</div>
	<!-- Main Container End -->
</body>
</html>