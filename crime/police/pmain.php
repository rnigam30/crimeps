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
	<title>Police Mainpage</title>
	<link rel="stylesheet" href="pmain.css">
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
						<li><a href="logout.php" class=" ">
								<span class="icon"><i class="fas fa-home"></i></span>
								<span class="text">Home</span>
							</a></li>
                            <li><a href="newfir.php">
								<span class="icon"><i class="fas fa-file-alt"></i></span>
								<span class="text">Add New FIR</span>
							</a></li>
                        <li><a href="enquiry.php">
								<span class="icon"><i class="fas fa-info-circle"></i></span>
								<span class="text">Case Enquiry</span>
                            </a></li>
                        <li><a href="final.php">
								<span class="icon"><i class="fas fa-gavel"></i></span>
								<span class="text">Add Final Case</span>
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
				
                <div class="wrapper1">
                    <div class="main">
                        <center><p class="display">Welcome <?php echo $_SESSION['name']; ?></p></center>
                    </div>
					<img src="img2.jpg" alt="" style = "margin-left : 13em ">

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