<html>
<head>
	<title>MECHANICO | View Cars</title>
<style type="text/css">
	table{
		background-color: darkgrey;
	}
	tr,th{
		border: 2px solid white;
	}
</style>
</head>
<body>
	<?php
		if(isset($_GET['view_cars'])) { 
	?>
	<table align="center" width="794" style="color:white;">
		<tr align="center">
			<td colspan="6"><h2>View All Cars</h2><br></td>
		</tr>
		<tr>
			<th>Car PlateNumber</th>
			<th>Car Name</th>
			<th>Car Price</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php 
			$sel_exer="SELECT * FROM Automobile";
			$run_exer=mysqli_query($con, $sel_exer);
			while ($row_exer=mysqli_fetch_array($run_exer)) {
				$exer_id=$row_exer['PlateNumber'];
				$exer_name=$row_exer['Name'];
				$exer_price=$row_exer['Price'];
			
		?>
		<tr align="center">
			<td><?php echo $exer_id; ?></td>
			<td><?php echo $exer_name; ?></td>
			<td><?php echo $exer_price; ?></td>
			<td><a href="index.php?edit_cars=<?php echo $exer_id; ?>">Edit</a></td>
			<td><a href="index.php?delete_cars=<?php echo $exer_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
	<?php } ?>
</body>
</html>