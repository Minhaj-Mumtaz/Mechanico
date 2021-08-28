<html>
<head>
	<title>MECHANICO | View Garage</title>
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
	<table align="center" width="794" style="color:white;">
		<tr align="center">
			<td colspan="6"><h2>View Garage</h2><br></td>
		</tr>
		<tr>
			<th>Mechanic Working</th>
			<th>Car Name</th>
			<th>Car Arrival Date</th>
			<th>Work</th>
			<th>Cost of Work</th>
		</tr>
		<?php 
			$sel_user="SELECT * FROM GarageView";
			$run_user=mysqli_query($con, $sel_user);
			while ($row_user=mysqli_fetch_array($run_user)) {
				$user_name=$row_user['Name'];
				$user_cName=$row_user['CarName'];
				$user_date=$row_user['Car_Arrival_Date'];
				$user_work=$row_user['Work'];
				$user_CW=$row_user['CostOfWork'];
			
		?>
		<tr align="center">
			<td><?php echo $user_name; ?></td>
			<td><?php echo $user_cName; ?></td>
			<td><?php echo $user_date; ?></td>
			<td><?php echo $user_work; ?></td>
			<td><?php echo $user_CW; ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>