<?php 

include ("includes/db.php");

?>
<html>
<head>
	<title>MECHANICO | Add Cars</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="add_cars.php" enctype="multipart/form-data">
		<table width="794px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>Add New Car</h1></td>
			</tr>
			<tr>
				<td align="right"><b>Car PlateNumber</b></td>
				<td><input type="text" name="pn"></td>
			</tr>

			<tr>
				<td align="right"><b>Car Name</b></td>
				<td><input type="text" name="name"></td>
			</tr>
			
			<tr>
				<td align="right"><b>Price</b></td>
				<td><input type="text" name="price"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="add_cars" value="Add Cars"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php 

	if (isset($_POST['add_cars']))
	{

		//Text Data Variables
		$name= $_POST['name'];
		$PN= $_POST['pn'];
		$price= $_POST['price'];

		//Validations
		if($name==''){
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($PN=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($price=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}

		else{

			//Query For Inserting New Trainer Into Database.....
			$insert_tran = "insert into automobile(PlateNumber, Name, Price) values('$PN','$name','$price')";
			$run_tran = mysqli_query($con, $insert_tran);
			if ($run_tran) {
				echo "<script>alert('1 New Car Added Successfully')</script>";
				echo "<script>window.open('index.php?add_cars','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>