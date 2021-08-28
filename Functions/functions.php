<?php

session_start();

$db=mysqli_connect("localhost","root","","mechanico");

	//getdays function start
	function getGarageData(){
		global $db;
        $userID=$_SESSION['user_id'];
                    
		$garageView="select * from GarageView g inner join CusAuto c on c.PlateNumber=g.CarID where c.NIC_ID=$userID";
		$run_GView=mysqli_query($db, $garageView);
		while($row_GView=mysqli_fetch_array($run_GView)){

			$CAD=$row_GView['Car_Arrival_Date'];
			$CName=$row_GView['CarName'];
            $MName=$row_GView['Name'];
            $work=$row_GView['Work'];
            $CostWork=$row_GView['CostOfWork'];
            $partInstall=$row_GView['PartsInstalled'];
            if($partInstall==null){
                $partInstall='None';
            }

			echo "<div class='box-6 top-2'> <img src='images/page3-img4.jpg' alt='' class='img-indent-2'>
            <div class='extra-wrap'>
                <p class='text-2'><strong>Car Name:</strong> $CName</p>
                <p class='text-2'><strong>Car Arrival Date:</strong> $CAD</p>
                <p class='text-2'><strong>Mechanic Working:</strong> $MName</p>
                <p class='text-2'><strong>Cost Of Work:</strong> Rs $CostWork</p>
                <p class='text-2'><strong>Parts Installed:</strong> $partInstall</p>

            </div>
          </div>";
		}
	}

    function getCarData(){
		global $db;
        $userID=$_SESSION['user_id'];

		$car="select * from Automobile where cusID is null";
		$run_car=mysqli_query($db, $car);
		while($row_car=mysqli_fetch_array($run_car)){
            $PN=$row_car['PlateNumber'];
            $Carname=$row_car['Name'];
            $Price=$row_car['Price'];

			echo "<div class='box-6 top-2'> <img src='images/page3-img4.jpg' alt='' class='img-indent-2'>
            <div class='extra-wrap'>
                <p class='text-2'><strong>Car Name:</strong> $Carname</p>
                <p class='text-2'><strong>Plate Number:</strong> $PN</p>
                <p class='text-2'><strong>Price:</strong> $Price</p>
                <form method='post' action=''>
                <button value='Buy Now' type='submit' name='update_car' >BUY NOW</button>
                </form>
            </div>
          </div>";
		}
        if (isset($_POST['update_car']))
	    {

            $update_exer = "UPDATE Automobile SET CusId='$userID' WHERE PlateNumber='$PN'";
			$run_update = mysqli_query($db, $update_exer);
			if ($run_update) {
				echo "<script>alert('Car Updated')</script>";
                echo "<script>window.open('Car.php')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
        }
	}

    // function AddCarButton(){
	// 	global $db;
    //     $userID=$_SESSION['user_id'];

	// 	$car="select * from Automobile where cusID=$userID";
	// 	$run_car=mysqli_query($db, $car);

    //     echo "<a href='#' value='Add' type='submit' name='add_car' class='button'>ADD</a>";
	// 	while($row_car=mysqli_fetch_array($run_car)){
    //         $PN=$row_car['PlateNumber'];
    //         $Carname=$row_car['Name'];
    //         $Price=$row_car['Price'];

			
	// 	}
    //     if (isset($_POST['add_car']))
	//     {

    //         $update_exer = "UPDATE Automobile SET CusId='$userID' WHERE PlateNumber='$PN'";
	// 		$run_update = mysqli_query($db, $update_exer);
	// 		if ($run_update) {
	// 			echo "<script>alert('Garage Updated')</script>";
    //             echo "<script>window.open('index.php')</script>";
	// 		}
	// 		else{
	// 			echo "<script>alert('Error')</script>";
	// 		}
    //     }
	// }



    function getCarOwnerData(){
		global $db;
        $userID=$_SESSION['user_id'];

		$car="select * from Automobile where cusID=$userID";
		$run_car=mysqli_query($db, $car);
		while($row_car=mysqli_fetch_array($run_car)){
            $PN=$row_car['PlateNumber'];
            $Carname=$row_car['Name'];
            $Price=$row_car['Price'];

			echo "<div class='box-6 top-2'> <img src='images/page3-img4.jpg' alt='' class='img-indent-2'>
            <div class='extra-wrap'>
                <p class='text-2'><strong>Car Name:</strong> $Carname</p>
                <p class='text-2'><strong>Plate Number:</strong> $PN</p>
                <p class='text-2'><strong>Price:</strong> $Price</p>
                
            </div>
          </div>";
		}
	}

    function getLocation(){
		global $db;
		$loc="select * from location";
		$run_loc=mysqli_query($db, $loc);
		while($row_loc=mysqli_fetch_array($run_loc)){
            $Province=$row_loc['Province'];
            $City=$row_loc['City'];
            $Code=$row_loc['id'];

			echo "<div class='box-6 top-2'> <img src='images/page1-img2.jpg' alt='' class='img-indent-2'>
            <div class='extra-wrap'>
                <p class='text-2'><strong>CITY:</strong> $City</p>
                <p class='text-2'><strong>PROVINCE:</strong> $Province</p>
                <p class='text-2'><strong>POSTAL CODE:</strong> $Code</p>
                
            </div>
          </div>";
		}
	}

    function AddCarToGarage(){
		global $db;
        $userID=$_SESSION['user_id'];

		$car="select * from Automobile where cusID=$userID";
		$run_car=mysqli_query($db, $car);
		while($row_car=mysqli_fetch_array($run_car)){
            $PN=$row_car['PlateNumber'];
            $Carname=$row_car['Name'];
            $Price=$row_car['Price'];

			echo "<div class='box-6 top-2'> <img src='images/page3-img4.jpg' alt='' class='img-indent-2'>
            <div class='extra-wrap'>
                <p class='text-2'><strong>Car Name:</strong> $Carname</p>
                <p class='text-2'><strong>Plate Number:</strong> $PN</p>
                <p class='text-2'><strong>Price:</strong> $Price</p>" ?>
                <button onclick="document.getElementById('id01').style.display='block'" style='width:auto;' value='Add to Garage' type='submit' >Add to Garage</button>
                </div>
                


                   <div id='id01' class='modal'>
            
                            <form class='modal-content animate' action='' method='post'>
                                <div class='imgcontainer'>
                                <span onclick="document.getElementById('id01').style.display='none'" class='close' title='Close Modal'>&times;</span>
                                <img src='images/page3-img4.jpg' width='100' height='100'>
                                </div>

                            <table width="794px" align="center" border="1" bgcolor="#f1533e">
                                        <tr>
                                        <td>
                                <select name="mechanic">
                                    <option>Select Mechanic</option>
                                    <?php
                                        $mechanic="select * from Mechanic";
                                        $run_mech=mysqli_query($db, $mechanic);
                                        while($row_mech=mysqli_fetch_array($run_mech)){
                                            $mechId=$row_mech['id'];
                                            $TitleJob=$row_mech['TitleOfJob'];
                                            echo "<option value='$mechId'>$TitleJob</option>";
                                        }
                                    ?>
                                </select>
                                        </td>
                                        </tr>


                                        <tr>
                                        <td>
                                <select name="job">
                                    <option>Select Job</option>
                                    <?php
                                        $job="select * from Job";
                                        $run_job=mysqli_query($db, $job);
                                        while($row_job=mysqli_fetch_array($run_job)){
                                            $jobId=$row_job['id'];
                                            $work=$row_job['Work'];
                                            echo "<option value='$jobId'>$work</option>";
                                        }
                                    ?>
                                </select>
                                        </td>
                                        </tr>

                                        <tr>
                                        <td>

                                <select name="parts">
                                    <option>Select Part if any</option>
                                    <?php
                                        $parts="select * from PartsShop";
                                        $run_parts=mysqli_query($db, $parts);
                                        while($row_parts=mysqli_fetch_array($run_parts)){
                                            $partId=$row_parts['id'];
                                            $PName=$row_parts['Name'];
                                            echo "<option value='$partId'>$PName</option>";
                                        }
                                    ?>
                                </select>

                                        </td>
                                        </tr>
                                </table>

                                <div class='container' style='background-color:#f1f1f1'>

                                <button value='Add Now' type='submit' name='add_car'>Add Now</button>
                                <?php echo "
                                </div>
                            </form>
                        </div>


                    </div>";
                    if (isset($_POST['add_car']))
                    {

                        

                        $PID= $_POST['parts'];
                        $JID= $_POST['job'];
                        $MID= $_POST['mechanic'];

                        if($JID==''){
                            echo "<script>alert('Please Fill All The Fields!')</script>";
                            exit();
                        }
                        elseif ($MID=='') {
                            echo "<script>alert('Please Fill All The Fields!')</script>";
                            exit();
                        }

                        $add_exer = "INSERT INTO Garage (MechanicId,JobID, PartID, LocID, Car_Arrival_Date,AutomobileID) values ('$MID','$JID','$PID',6731,'2021-06-16','$PN') ";
                        $run_add = mysqli_query($db, $add_exer);
                        if ($run_add) {
                            echo "<script>alert('Car Added to Garage')</script>";
                            echo "<script>window.open('index.php')</script>";
                        }
                        else{
                            echo "<script>alert('Error')</script>";
                        }
                    }
                
            
		}
        
	}

?>