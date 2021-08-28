<?php 

session_start();

if($_SESSION['user_id']==true){
	}
	else{
		header('location: login.php');
	}

include ("includes/db.php");
include ("Functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Mechanico | Index</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.7.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script>
$(document).ready(function () {
    $('.slider')._TMS({
        show: 0,
        pauseOnHover: true,
        prevBu: '.prev',
        nextBu: '.next',
        playBu: false,
        duration: 500,
        preset: 'fade',
        pagination: true, //'.pagination',true,'<ul></ul>'
        pagNums: false,
        slideshow: 8000,
        numStatus: false,
        banners: 'fromBottom', // fromLeft, fromRight, fromTop, fromBottom
        waitBannerAnimation: false,
        progressBar: false
    })
})
$(function () {
    if ($(window).width() <= 1066) {
        $("#slider .prev").css("left", "55px")
        $("#slider .next").css("right", "55px")
    }
})
</script>
<style>
  
button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}
</style>
<!--[if lt IE 9]>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/html5.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<div class="bg">
  <header>
    <div class="main wrap">
      <h1><a href="index.php"><img src="images/logo.png" alt=""></a></h1>
      <p>8901 Marmora, Glasgow <span>8 (800) 552 5975</span></p>
    </div>
    <nav>
      <ul class="menu">
        <li class="current"><a href="index.php" >GARAGE</a></li>
        <li><a href="Car.php">Car</a></li>
        <li><a href="locations.php">Locations</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
      <div class="clear"></div>
    </nav>
  </header>
  <div id="slider">
    <div class="slider-block">
      <div class="slider">
        <ul class="items">
          <li><img src="images/slide-1.jpg" alt="">
            <div class="banner">
              <div><span>Ford</span><strong>Сiriure dolor nhendrerit</strong>
                <p>Nam liber tempor cum soluta nobis eleifenoption congue nigfif аil imperdiet doming id quod mazim placerat facer. Lorjem ipsum dolor sit amet, consecer adipiscing elit.</p>
                <a href="#" class="button">Read More</a></div>
            </div>
          </li>
          <li><img src="images/slide-2.jpg" alt="">
            <div class="banner">
              <div><span>Maserati GT</span><strong>Vulputate velit esse</strong>
                <p>sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.</p>
                <a href="#" class="button">Read More</a></div>
            </div>
          </li>
          <li><img src="images/slide-3.jpg" alt="">
            <div class="banner">
              <div><span>Honda HSC</span><strong>Molestie consequat vel</strong>
                <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit.</p>
                <a href="#" class="button">Read More</a></div>
            </div>
          </li>
        </ul>
      </div>
      <a href="#" class="prev"></a> <a href="#" class="next"></a>
    </div>

      
  </div>





  <section id="content">
    <div class="sub-page">
      <div class="sub-page-left">
        <h2 class="p4">MECHANICO -- YOUR GARAGE</h2>

        <?php 
            getGarageData();
        ?>

        <h2 class="top-1 p3">ADD NEW CAR TO GARAGE</h2>
        

        <a href="AddCar.php" class="button">ADD</a>
    </div>
  </section>
  <footer> MECHANICO &copy; 2021 | <a href="#">Privacy Policy</a> </footer>
</div>
</body>
</html>

<?php
if (isset($_POST['update_car']))
{
  $update_exer = "UPDATE Automobile SET CusId='$userID' WHERE PlateNumber='$PN'";
  $run_update = mysqli_query($db, $update_exer);
  if ($run_update) {
    echo "<script>alert('Car Updated')</script>";
            echo "<script>window.open('index.php')</script>";
  }
  else{
    echo "<script>alert('Error')</script>";
  }
}

?>