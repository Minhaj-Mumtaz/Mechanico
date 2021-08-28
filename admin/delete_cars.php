<?php 

include ("includes/db.php");

	if (isset($_GET['delete_cars'])) {
		$delete_id=$_GET['delete_cars'];

		$delete_exer="DELETE FROM Automobile WHERE PlateNumber='$delete_id'";
		$run_delete=mysqli_query($con,$delete_exer);
		if ($run_delete) {
			echo "<script>alert('Deleted Successfully!')</script>";
			echo "<script>window.open('index.php?view_cars','_self')</script>";
		}

	}

?>