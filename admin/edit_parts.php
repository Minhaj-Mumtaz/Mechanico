<?php 

include ("includes/db.php");

if (isset($_GET['edit_parts'])) {
	$edit_exer_id=$_GET['edit_parts'];

	$sel_exer="SELECT * FROM PartsShop WHERE id='$edit_exer_id'";
	$run_exer=mysqli_query($con, $sel_exer);
	$row_exer=mysqli_fetch_array($run_exer);
	$exer_name=$row_exer['Name'];
	$exer_CP=$row_exer['CostOfProduct'];
	$exer_IS=$row_exer['InStock'];
	$exer_VN=$row_exer['VendorId'];
}

$sel_day="SELECT * FROM Vendor WHERE id='$exer_VN'";
$run_day=mysqli_query($con, $sel_day);
$row_days=mysqli_fetch_array($run_day);

$day_edit_name=$row_days['Name'];


?>
<html>
<head>
	<title>MECHANICO | Edit Parts</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="" enctype="multipart/form-data">
		<table width="794px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>Edit or Update Parts</h1></td>
			</tr>
			<tr>
				<td align="right"><b>Vendors</b></td>
				<td>
					<select name="vendor">
						<option value="<?php echo $exer_VN; ?>"><?php echo $day_edit_name; ?></option>
						<?php
							$get_day="SELECT * FROM Vendor";
							$run_day=mysqli_query($con, $get_day);
							while($row_days=mysqli_fetch_array($run_day)){
								$day_id=$row_days['id'];
								$day_name=$row_days['Name'];
								echo "<option value='$day_id'>$day_name</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right"><b>Name Of Part</b></td>
				<td><input type="text" name="name" value="<?php echo $exer_name; ?>"></td>
			</tr>
			
			<tr>
				<td align="right"><b>Cost of Product</b></td>
				<td><input type="text" name="price" value="<?php echo $exer_CP; ?>"></td>
			</tr>

			<tr>
				<td align="right"><b>In Stock</b></td>
				<td><input type="text" name="instock" value="<?php echo $exer_IS; ?>"></td>
			</tr>
			
			<tr>
				<td colspan="2" align="center"><input type="submit" name="update_part" value="Update Part"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php 

	if (isset($_POST['update_part']))
	{

		//Text Data Variables
		$exer_name= $_POST['name'];
		$price= $_POST['price'];
		$instock= $_POST['instock'];
		$VNI= $_POST['vendor'];

		//Validations
		if ($exer_name=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($price=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($instock=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($VNI=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}

		else{
			//Query For Inserting Workout Into Database.....
			$update_exer = "UPDATE PartsShop SET Name='$exer_name', InStock=$instock, CostOfProduct=$price,  VendorId=$VNI WHERE id=$edit_exer_id";
			$run_update = mysqli_query($con, $update_exer);
			if ($run_update) {
				echo "<script>alert('Part Updated')</script>";
				echo "<script>window.open('index.php?view_Parts','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>