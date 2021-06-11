<?php
session_start();

if(!isset($_SESSION['fname'])){

	header('location:../index.html');
}
?>
 <?php
								include 'config.php';

								$ids = $_GET['id'];

								$showquery = "select * from police where id = {$ids}";

								$showdata = mysqli_query($conn,$showquery);

								$arrdata = mysqli_fetch_array($showdata);

								if(isset($_POST['submit'])){

									$idupdate = $_GET['id'];

									$name = $_POST['name'];
									$username = $_POST['uname'];
									$email = $_POST['email'];
									$phone = $_POST['phone'];
									$address = $_POST['address'];
									$location = $_POST['location'];
									$password = $_POST['password'];
									$gender = $_POST['ge'];

									$query = "update police set name='$name', username='$username', email='$email', phone='$phone', address='$address', location='$location', password='$password', gender='$gender' where id='$idupdate'";
								
									$res = mysqli_query($conn,$query);
								
									if($res){
										?>
										<script>
											alert("Officer Updated successfully!!!"); 
											window.location="mofficer.php";

										</script>
										<?php
									}else{
										?>
										<script>
											 alert("Officer not updated!!!"); 
										</script>
										<?php
									}
								}
								?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Update Officer</title>
	<link rel="stylesheet" href="addp.css">
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
						
						<li><a href="mofficer.php">
								<span class="icon"><i class="fas fa-user"></i></span>
								<span class="text">Manage Officer</span>
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
						<div class="form3">
						<img src=" <?php echo $arrdata['pic']; ?>">
						</div>
						<div class="form4">
							<div class="container">
								<form method="POST" action="">
                               
								

								<div id="name-div"><p class="name">
									NAME<span class="color">*</span> :</p>
								<p>
									<input type="text" name="name" id="fname" placeholder="Name" class="name-inp" value="<?php echo $arrdata['name']; ?>">
									
								</p>
								</div>
								<div id="username-div"><p class="name">
									USERNAME<span class="color">*</span> :</p>
								<p>
									<input type="text" name="uname" id="lname" placeholder="Userame" class="name-inp" value="<?php echo $arrdata['username']; ?>">
									
								</P>
								</div>
								<div id="email-div"><p class="name">
									EMAIL<span class="color">*</span> :</p>
								<p>
									<input type="email" name="email" placeholder="Email" class="name-inp" value="<?php echo $arrdata['email']; ?>">
								
								</p>
								</div>
								<div id="phone-div"><p class="name">
								PHONE<span class="color">*</span> :</P>
								<p>
									<input type="text" name="phone" placeholder="Phone" class="name-inp" value="<?php echo $arrdata['phone']; ?>">	
								</p>
								</div>
								<div id="address-div"><p class="name">
									ADDRESS<span class="color">*</span> :</P>
									<p>
										<input type="text" name="address" placeholder="Address" class="name-inp"value="<?php echo $arrdata['address']; ?>">	
									</p>
								</div>
								<div id="location-div"><p class="name">
									LOCATION<span class="color">*</span> :</P>
									<p>
										<input type="text" name="location" placeholder="Location" class="name-inp" value="<?php echo $arrdata['location']; ?>">	
									</p>
								</div>
								<div id="pass-div"><p class="name">
									PASSWORD<span class="color">*</span> :</p>
									<p>
										<input type="password" name="password" placeholder="Password" id="password" class="pass" value="<?php echo $arrdata['password']; ?>"></p>
								</div>
								<div id="gender-div"><p class="name">
									GENDER:</p>
								</div>
								<input type="radio" name="ge" class="genm" value="MALE"> MALE<br>
								<input type="radio" name="ge" class="genm" value="FEMALE"> FEMALE<br>
								<div id="image-div"><p class="name">
									<!-- Image:</p>
									<p>
										<input type="file" name="pic" >
								</p> -->
								</div>
								<center>
									<input class="sub" type="submit" value="Update" name="submit">
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


