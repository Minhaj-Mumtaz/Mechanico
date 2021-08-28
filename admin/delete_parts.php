<?php 

include ("includes/db.php");

	if (isset($_GET['delete_parts'])) {
		$delete_id=$_GET['delete_parts'];

		$delete_tran="DELETE FROM PartsShop WHERE id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_tran);
		if ($run_delete) {
			echo "<script>alert('Deleted Successfully!')</script>";
			echo "<script>window.open('index.php?view_Parts','_self')</script>";
		}

	}

?>