<?php
session_start();

if(!isset($_SESSION['name'])){

	header('location:../index.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Update Officer</title>
	<link rel="stylesheet" href="newfir.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
</head>

<body>
	<div class="wrapper">
		<div class="wrapper_inner">
			<div class="vertical_wrap">
				<div class="backdrop"></div>
				<div class="vertical_bar">
					<div class="profile_info">
						<div class="img_holder">
							<img src="../logo.png" alt="profile_pic">
						</div>
					</div>
					<ul class="menu" id="myDIV">
						
						<li><a href="enquiry.php">
								<span class="icon"><i class="fas fa-info-circle"></i></span>
								<span class="text">CASE ENQUIRY</span>
							</a></li>
                        <li><a href="logout.php">
								<span class="icon"><i class="fas fa-power-off"></i></span>
								<span class="text">Logout</span>
							</a></li>
					</ul>
				</div>
			</div>
			<div class="main_container">
				<div class="top_bar">
					<div class="hamburger">
						<i class="fas fa-bars"></i>
					</div>
					<div class="logo">
						<h2>Crime Prediction System</h2>
					</div>
				</div>
				 <div class="form1">
					<div class="form2">
						<div class="form4">
							<div class="container">
								<form method="POST" action="" enctype="multipart/fom-data">
                                <?php
								include 'config.php';

								$ids = $_GET['id'];

								$showquery = "select * from fir where case_id = {$ids}";

								$showdata = mysqli_query($conn,$showquery);

								$arrdata = mysqli_fetch_array($showdata);

								if(isset($_POST['submit'])){

									$idupdate = $_GET['id'];

									$casename = $_POST['casename'];
   								 	$crime = $_POST['crime-type'];
    								$location = $_POST['area'];
    								$evidence = $_POST['evidence'];
    								$criminalname = $_POST['criminalname'];
    								$criminalid = $_POST['criminalid'];
    								$address = $_POST['address'];
    								$age = $_POST['age'];
    								$gender = $_POST['gender'];
    								$month = $_POST['month'];
    								$year = $_POST['year'];

									$query = "update fir set case_name = '$casename', criminal_id = '$criminalid', criminal_name = '$criminalname', crime_type = '$crime', crime_location = '$location', crime_evidence = '$evidence', criminal_address = '$address', criminal_age = '$age', criminal_gender = '$gender', crime_month = '$month', crime_year = '$year', case_status = 'REVIEWED' where case_id='$idupdate'";
								
									$res = mysqli_query($conn,$query);
								
									if($res){
										?>
										<script>
											alert("FIR Updated successfully!!!"); 
											window.location="enquiry.php";
										</script>
										<?php
									}else{
										?>
										<script>
											 alert("FIR not updated!!!"); 
										</script>
										<?php
									}
								}
								?>
					<div class="name label">
                       CASE NAME: 
							<input type="text" name="casename" placeholder="case name" class="value" required value="<?php echo $arrdata['case_name']; ?>">
							<p style="margin: -4px 86px; text-align: right; float: right;"><img src=" <?php echo $arrdata['criminal_image']; ?>" alt="image" width="150px" height="150px"></p>
							<B><P style="margin: 149px -234px; text-decoration: underline; sstext-align: right; float: right;">CRIMINAL IMAGE</P></B>
                    </div>
					<div class="type label">
                    <label for="type">TYPE OF CRIME: </label>
                    <input type="text" name="crime-type" placeholder="crime name" class="value" required value="<?php echo $arrdata['crime_type']; ?>">
                    </div>
                    <div class="area label">
                    <label for="area">CRIME LOCATION: </label>
                    <input type="text" name="area" placeholder="Location" class="value" required value="<?php echo $arrdata['crime_location']; ?>">
                    </div>
                    <div class="evidence label">
                    <label for="evidence">CRIME EVIDENCE: </label>
                    <input type="text" name="evidence" placeholder="evidence" class="value" required value="<?php echo $arrdata['crime_evidence']; ?>">
                    </div>
                    <div class="name label">
                       CRIMINAL ID: 
							<input type="text" name="criminalid" placeholder="criminal ID" class="value" required value="<?php echo $arrdata['criminal_id']; ?>">
                    </div>
                    <div class="name label">
                       CRIMINAL NAME: 
							<input type="text" name="criminalname" placeholder="criminal name" class="value" required value="<?php echo $arrdata['criminal_name']; ?>">
                    </div>
                    <div class="add label">
					CRIMINAL ADDRESS: 
							<input type="text" name="address" placeholder="address" class="value" required value="<?php echo $arrdata['criminal_address']; ?>"> 
                    </div>
                    <div class="age label">
					CRIMINAL AGE: 
							<input type="text" name="age" placeholder="age" class="value" required value="<?php echo $arrdata['criminal_age']; ?>">
                    </div>
                    <div class="gen label">
					CRIMINAL GENDER: 
                       <input type="text" name="gender" id="gender" class="value" value="<?php echo $arrdata['criminal_gender']; ?>"> 
                    </div>
                    <div class="month label">
                    <label for="month">CRIME MONTH: </label>
                    <input type="text" id="month" name="month" class="value" value="<?php echo $arrdata['crime_month']; ?>">
                    </div>            
                    <div class="year label">
                    <label for="year">CRIME YEAR: </label>
                    <input type="text" id="year" name="year" class="value" value="<?php echo $arrdata['crime_year']; ?>">
                        </div>

								<center>
									<input class="search" type="submit" value="Update" name="submit">
								</center>

								
								
							</form>
						</div>
					</div> 
				</div> 
			</div>
		</div>
	</div>
	<script>
		var hamburger = document.querySelector(".hamburger");
		var wrapper = document.querySelector(".wrapper");
		var backdrop = document.querySelector(".backdrop");

		hamburger.addEventListener("click", function () {
			wrapper.classList.add("active");
		})

		backdrop.addEventListener("click", function () {
			wrapper.classList.remove("active");
		})
	</script>
</body>

</html>
