<?php 

include ("includes/db.php");

?>
<html>
<head>
	<title>MECHANICO | Add Parts</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="add_parts.php" enctype="multipart/form-data">
		<table width="794px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>Add New Parts</h1></td>
			</tr>
			<tr>
				<td align="right"><b>Part ID</b></td>
				<td><input type="text" name="id"></td>
			</tr>

			<tr>
				<td align="right"><b>Part Name</b></td>
				<td><input type="text" name="name"></td>
			</tr>
			
			<tr>
				<td align="right"><b>Price</b></td>
				<td><input type="text" name="price"></td>
			</tr>

			<tr>
				<td align="right"><b>Instock</b></td>
				<td><input type="text" name="instock"></td>
			</tr>

			<tr>
				<td align="right"><b>Vendors</b></td>
				<td>
					<select name="vendor">
						<option>Select a Vendor</option>
						<?php
							$get_day="SELECT * FROM Vendor";
							$run_day=mysqli_query($con, $get_day);
							while($row_days=mysqli_fetch_array($run_day)){
								$VN=$row_days['id'];
								$day_name=$row_days['Name'];
								echo "<option value='$VN'>$day_name</option>";
							}
						?>
					</select>
				</td>
			</tr>
			
			<tr>
				<td colspan="2" align="center"><input type="submit" name="add_parts" value="Add Parts"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php 

	if (isset($_POST['add_parts']))
	{

		//Text Data Variables
		$name= $_POST['name'];
		$id= $_POST['id'];
		$price= $_POST['price'];
		$IS= $_POST['instock'];
		$VNA= $_POST['vendor'];

		//Validations
		if($name==''){
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($id=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($price=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}elseif ($IS=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}elseif ($VNA=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}

		else{

			//Query For Inserting New Trainer Into Database.....
			$insert_tran = "insert into PartsShop(ID, Name, CostOfProduct, InStock, VendorId) values($id,'$name',$price,$IS,$VN)";
			$run_tran = mysqli_query($con, $insert_tran);
			if ($run_tran) {
				echo "<script>alert('1 New Part Added Successfully')</script>";
				echo "<script>window.open('index.php?add_Parts','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>