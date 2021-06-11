<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<link rel="stylesheet" href="register.css">
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
					<ul class="menu">
						<li><a href="../index.html">
								<span class="icon"><i class="fas fa-home"></i></span>
								<span class="text">Home</span>
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
								<form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
								<div id="firstname-div"><p class="name">
									FIRST NAME<span class="color" style="color: red">*</span> :</p>
								<p>
									<input type="text" name="fname" id="fname" placeholder="First Name"
									class="name-inp" required>
									
								</p>
								</div>
								<div id="lastname-div"><p class="name">
									LAST NAME<span class="color" style="color: red">*</span> :</p>
								<p>
									<input type="text" name="lname" id="lname" placeholder="Last Name" class="name-inp" required>
									
								</P>
								</div>
								<div id="email-div"><p class="name">
									EMAIL<span class="color" style="color: red">*</span> :</p>
								<p>
									<input type="email" name="email" id="email" placeholder="Email" class="name-inp" required>
								
								</p>
								</div>
								<div id="phone-div"><p class="name">
								PHONE<span class="color" style="color: red">*</span> :</P>
								<p>
									<input type="text" name="phone" id="phone" placeholder="Phone" class="name-inp" required>
									
								</p>
								</div>
								<div id="username-div"><p class="name">
									USERNAME<span class="color"style="color: red">*</span> :</P>
									<p>
										<input type="text" name="username" id="username" placeholder="Username" class="name-inp" required>
										
									</p>
								</div>
								<div id="pass-div"><p class="name">
									PASSWORD<span class="color"style="color: red">*</span> :</p>
									<p>
										<input type="password" name="password" placeholder="Password" id="password" class="pass" rrquired></p>
								</div>
								<div id="conf-div"><p class="name">
										CONFIRM PASSWORD<span class="color" style="color: red">*</span> :</p>
										<p>
											<input type="password" name="confirm_password" placeholder="Confirm Password" id="password_confirm" class="pass" rrquired>
										</p>
										
								</div>
								<div id="gender-div"><p class="name">
									GENDER<span class="color"style="color: red">*</span>:</p>
								</div>
								<input type="radio" name="gender" id="gender" class="genm" value="MALE"> MALE<br>
								<input type="radio" name="gender" id="gender" class="genm" value="FEMALE"> FEMALE<br>
								<center>
								<input class="sub" type="submit" name="submit" value="Submit"><input class="sub" type="reset" value="Reset">
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
<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "crime";

$con = mysqli_connect($server,$user,$password,$db);

if(isset($_POST['submit'])){
	$FIRSTNAME = mysqli_real_escape_string( $con, $_POST['fname']);
	$LASTNAME =   mysqli_real_escape_string( $con, $_POST['lname']);
	$EMAIL =  mysqli_real_escape_string( $con, $_POST['email']);
	$PHONE =  mysqli_real_escape_string( $con, $_POST['phone']);
	$USERNAME =  mysqli_real_escape_string( $con, $_POST['username']);
 	$PASSWORD =  mysqli_real_escape_string( $con, $_POST['password']);
 	$CONFIRM_PASSWORD =  mysqli_real_escape_string( $con, $_POST['confirm_password']);
	$GENDER =  mysqli_real_escape_string( $con, $_POST['gender']);

	$PASS = password_hash($PASSWORD, PASSWORD_DEFAULT); 
	$CPASS = password_hash($CONFIRM_PASSWORD, PASSWORD_BCRYPT); 

	$unamequery = "select * from admins where USERNAME='$USERNAME' ";
	$query = mysqli_query($con, $unamequery);

	$USERNAMEcount = mysqli_num_rows($query);

	if($USERNAMEcount>0){
		?>
			<script>
			alert ("Username already exists");
			</script>
		<?php
	}
	else{
		if($PASSWORD === $CONFIRM_PASSWORD){
			$insertquery = "insert into admins(fname, lname, username, email, phone, password, gender) values('$FIRSTNAME', '$LASTNAME', '$USERNAME', '$EMAIL', '$PHONE', '$PASS', '$GENDER') ";
			
			$iquery = mysqli_query($con, $insertquery);
			
			if($iquery){
			?>
				<script>
				alert("Inserted successfully");
				window.location="../index.html";

				</script>
			<?php
			} 
			else{
			?>
				<script>
				alert("Insertion is not successfull");
				</script>
			<?php
			}

			}
		else
		{
		 	?>
				<script>
				alert ("Password does not match");
				</script>
			<?php
		}
	}
}

?>
