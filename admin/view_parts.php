<html>
<head>
	<title>MECHANICO | View Parts</title>
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
		if(isset($_GET['view_Parts'])) { 
	?>
	<table align="center" width="794" style="color:white;">
		<tr align="center">
			<td colspan="6"><h2>View All Parts</h2><br></td>
		</tr>
		<tr>
			<th>Part ID</th>
			<th>Part Name</th>
			<th>Part Price</th>
			<th>In-Stock</th>
			<th>Vendor</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php 
			$sel_exer="
			select *,v.Name as VendorName,p.Name as PartName, p.id as partId from partsshop p
			inner join vendor v
			on p.VendorId=v.id";
			$run_exer=mysqli_query($con, $sel_exer);
			while ($row_exer=mysqli_fetch_array($run_exer)) {
				$exer_id=$row_exer['partId'];
				$exer_name=$row_exer['PartName'];
				$exer_CP=$row_exer['CostOfProduct'];
				$exer_IS=$row_exer['InStock'];
				$exer_VN=$row_exer['VendorName'];
				
			
		?>
		<tr align="center">
			<td><?php echo $exer_id; ?></td>
			<td><?php echo $exer_name; ?></td>
			<td><?php echo $exer_CP; ?></td>
			<td><?php echo $exer_IS; ?></td>
			<td><?php echo $exer_VN; ?></td>
			<td><a href="index.php?edit_parts=<?php echo $exer_id; ?>">Edit</a></td>
			<td><a href="index.php?delete_parts=<?php echo $exer_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
	<?php } ?>
</body>
</html>