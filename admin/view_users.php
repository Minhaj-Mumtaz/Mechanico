<html>
<head>
	<title>MyGym | View Users</title>
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
			<td colspan="6"><h2>View All User</h2><br></td>
		</tr>
		<tr>
			<th>User NIC-ID</th>
			<th>User Name</th>
			<th>User CarName</th>
			<th>User Car PlateNumber</th>
			<th>Delete</th>
		</tr>
		<?php 
			$sel_user="SELECT a.Name as CarName,c.Name as CusName,c.NIC_ID, a.PlateNumber FROM Automobile a inner join customer c on a.CusId=c.nic_id";
			$run_user=mysqli_query($con, $sel_user);
			while ($row_user=mysqli_fetch_array($run_user)) {
				$user_id=$row_user['NIC_ID'];
				$user_name=$row_user['CusName'];
				$user_cName=$row_user['CarName'];
				$user_PN=$row_user['PlateNumber'];
			
		?>
		<tr align="center">
			<td><?php echo $user_id ?></td>
			<td><?php echo $user_name; ?></td>
			<td><?php echo $user_cName; ?></td>
			<td><?php echo $user_PN; ?></td>
			<td><a href="index.php?delete_user=<?php echo $user_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>