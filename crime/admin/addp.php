<?php
session_start();

if(!isset($_SESSION['fname'])){

	header('location:../index.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Add Officer</title>
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
							<img src="../profile.png">
						</div>
						<div class="form4">
							<div class="container">
								<form method="POST" action="" enctype="multipart/form-data">
								<div id="name-div"><p class="name">
									NAME<span class="color">*</span> :</p>
								<p>
									<input type="text" name="name" id="fname" placeholder="Name" class="name-inp" required>
									
								</p>
								</div>
								<div id="username-div"><p class="name">
									USERNAME<span class="color">*</span> :</p>
								<p>
									<input type="text" name="uname" id="lname" placeholder="Userame" class="name-inp" required>
									
								</P>
								</div>
								<div id="email-div"><p class="name">
									EMAIL<span class="color">*</span> :</p>
								<p>
									<input type="email" name="email" placeholder="Email" class="name-inp" required>
								
								</p>
								</div>
								<div id="phone-div"><p class="name">
								PHONE<span class="color">*</span> :</P>
								<p>
									<input type="text" name="phone" placeholder="Phone" class="name-inp" required>	
								</p>
								</div>
								<div id="address-div"><p class="name">
									ADDRESS<span class="color">*</span> :</P>
									<p>
										<input type="text" name="address" placeholder="Address" class="name-inp" required>	
									</p>
								</div>
								<div id="location-div"><p class="name">
									LOCATION<span class="color">*</span> :</P>
									<p>
										<input type="text" name="location" placeholder="Location" class="name-inp" required>	
									</p>
								</div>
								<div id="pass-div"><p class="name">
									PASSWORD<span class="color">*</span> :</p>
									<p>
										<input type="password" name="password" placeholder="Password" id="password" class="pass" required></p>
								</div>
								<div id="gender-div"><p class="name">
									GENDER:</p>
								</div>
								<input type="radio" name="ge" class="genm" value="MALE" > MALE<br>
								<input type="radio" name="ge" class="genm" value="FEMALE" > FEMALE<br>
								<div id="image-div"><p class="name">
									IMAGE:</p>
									<p>
										<input type="file" name="pic" onchange="loadFile(event)">
									</p>
								</div>
									<div class="image-label" >
									<P><img id="output" width="150px" height="200px"/></P>
									</div>  
								
								<center>
									<input class="sub" type="submit" value="Save" name="submit"><input class="sub" type="reset" value="Reset">
								</center>

								
								
							</form>
						</div>
					</div> 
				</div> 
			</div>
		</div>
	</div>
	<script>
		var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
		};
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

<?php

include 'config.php';

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $password = $_POST['password'];
    $gender = $_POST['ge'];
	$file = $_FILES['pic'];

	//print_r($file);

	$filename = $file['name'];
	$filepath = $file['tmp_name'];
	$fileerror = $file['error'];

	if($fileerror == 0){
		$destfile = 'police/'.$filename;
		move_uploaded_file($filepath, $destfile);
	}

    $insertquery = " insert into police(username,password,name,email,location,phone,address,gender,pic) values('$username',' $password','$name','$email','$location','$phone','$address','$gender','$destfile') ";

    $res = mysqli_query($conn,$insertquery);

    if($res){
        ?>
        <script>
            alert("Officer added successfully!!!");
			window.location="mofficer.php";
 
        </script>
        <?php
    }else{
        ?>
        <script>
             alert("Officer not added!!!"); 
        </script>
        <?php
    }


}

?>
