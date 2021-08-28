<?php 

session_start();
include ("includes/db.php");

?>
<html>
<head>
	<title>MECHANICO | Admin Login</title>
  <style>
  body{background-image: url(images/carW.jpg); background-repeat: no-repeat;background-attachment: fixed;
  background-size: cover;}
  </style>
	<link rel="stylesheet" type="text/css" href="styles/login.css">
</head>
<body >
	<h1>Admin Login</h1>

<div style="align-self: center">
  <form action="login.php" method="post">
    <label for="Aname">Name</label>
    <input type="text" id="Aname" name="admin_name" placeholder="Your Name...">

    <label for="Apass">Password</label>
    <input type="password" id="Apass" name="admin_pass" placeholder="Your Password...">

  
    <input type="submit" name="Admin_login" value="Login">
  </form>
</div>

</body>
</html>

<?php 

	//Login Script Start
  if (isset($_POST['Admin_login'])){
    $admin_name= ($_POST['admin_name']);
    $admin_password= ($_POST['admin_pass']);
    $select_admin="SELECT * FROM admin WHERE adminName='$admin_name' AND adminPass='$admin_password'";
    $run_admin=mysqli_query($con, $select_admin);
    $row_count=mysqli_num_rows($run_admin);
    if ($row_count==1) {
      $_SESSION['admin_name']=$admin_name; //create session variable
      header('location: index.php');
    }
    else{
      echo "<script>alert('Invalid Email or Password')</script>";
    }
  }  //Login Script End

?>