<?php
session_start();

include 'config.php';

if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($conn, $_POST['uname']);
 	$password = mysqli_real_escape_string($conn, $_POST['password']);


	 $uname_search = "select * from police where username = '$username' ";
	 $query = mysqli_query($conn, $uname_search);

	 $uname_count = mysqli_num_rows($query);


	if($uname_count)
	{
		$uname_pass = mysqli_fetch_assoc($query);

		
		$str_pass = $uname_pass['password'];
		$_SESSION['name'] = $uname_pass['name'];

	
		if($str_pass==$password)
		{
			?>
				<script>
				alert ("Login successfull");
				location.replace("pmain.php");
				</script>
			<?php
		}
		else
		{
			?>
				<script>
				alert ("Incorrect password");
				</script>
			<?php 
		}
	}
	else{
			?>
				<script>
				alert ("Invalid Username");
				</script>
			<?php
		}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Police Login</title>
	<link rel="stylesheet" href="plogin.css">
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
							<h1>Police Login</h1>
						</div>
						<div class="form4">
							<form method="POST" action="">
								<p class="name">
									Enter Username :</p>
								<p>
									<input type="text" name="uname" placeholder="Username" class="name-inp"></p>
									<br>
								<p class="name">
									Enter Password :</p>
								<p>
									<input type="password" name="password" placeholder="Password" class="name-inp"></P>
								<input type="submit" name="submit" value="LOGIN" class="sub">
							</form>
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