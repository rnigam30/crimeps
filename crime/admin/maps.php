<?php
session_start();

if(!isset($_SESSION['fname'])){

	//echo "You are logged out!!";
	
	header('location:../index.html');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Maps</title>
	<link rel="stylesheet" href="amain.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="googlemap.js"></script>
	<style type="text/css">
		.abc{
			margin: 18px;
    		text-decoration: underline;
		}
		#map_canvas{
			width: 99%;
    		height: 100%;
    		border: 1px solid black;
    		padding: 226px 10px;
    		margin: 22px 7px;			
		} 
	</style>

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
						<li><a href="../index.html" class=" ">
								<span class="icon"><i class="fas fa-home"></i></span>
								<span class="text">Home</span>
							</a></li>
						<li><a href="mofficer.php">
								<span class="icon"><i class="fas fa-user"></i></span>
								<span class="text">Manage Officer</span>
							</a></li>
						<li><a href="mcase.php">
								<span class="icon"><i class="fas fa-file-alt"></i></span>
								<span class="text">Manage Case</span>
                            </a></li>
                        <li><a href="graph.php">
								<span class="icon"><i class="fas fa-chart-pie"></i></span>
								<span class="text">Graph</span>
                            </a></li>
                        <li><a href="maps.php" class="active">
								<span class="icon"><i class="fas fa-map-marker"></i></span>
								<span class="text">Maps</span>
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
                        <center><h1 class="abc">Map with crime location</h1></center>
						<div id="map_canvas" class="mapping"></div>
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
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuDO90VFdKpNa7Np_3ts6ILVIPJJdAEdA&callback=initialize"
    ></script>
</html>