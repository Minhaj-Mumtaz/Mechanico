<?php 

include ("includes/db.php");

if (isset($_GET['edit_cars'])) {
	$edit_exer_id=$_GET['edit_cars'];

	$sel_exer="SELECT * FROM Automobile WHERE PlateNumber='$edit_exer_id'";
	$run_exer=mysqli_query($con, $sel_exer);
	$row_exer=mysqli_fetch_array($run_exer);
	$exer_name=$row_exer['Name'];
	$exer_CP=$row_exer['Price'];
}



?>
<html>
<head>
	<title>MECHANICO | Edit Cars</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="" enctype="multipart/form-data">
		<table width="794px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>Edit or Update Cars</h1></td>
			</tr>
			<tr>
				<td align="right"><b>Name Of Car</b></td>
				<td><input type="text" name="name" value="<?php echo $exer_name; ?>"></td>
			</tr>
			
			<tr>
				<td align="right"><b>Car Price</b></td>
				<td><input type="text" name="price" value="<?php echo $exer_CP; ?>"></td>
			</tr>
			
			<tr>
				<td colspan="2" align="center"><input type="submit" name="update_car" value="Update car"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php 

	if (isset($_POST['update_car']))
	{

		//Text Data Variables
		$exer_name= $_POST['name'];
		$price= $_POST['price'];

		//Validations
		if ($exer_name=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($price=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		else{
			//Query For Inserting Workout Into Database.....
			$update_exer = "UPDATE Automobile SET Name='$exer_name', Price=$price WHERE PlateNumber='$edit_exer_id'";
			$run_update = mysqli_query($con, $update_exer);
			if ($run_update) {
				echo "<script>alert('Car Updated')</script>";
				echo "<script>window.open('index.php?view_cars','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>