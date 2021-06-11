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
	<title>Manage Officer</title>
	<link rel="stylesheet" href="mofficer.css">
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
						<li><a href="../index.html" class=" ">
								<span class="icon"><i class="fas fa-home"></i></span>
								<span class="text">Home</span>
							</a></li>
						<li><a href="mofficer.php">
								<span class="icon"><i class="fas fa-user"></i></span>
								<span class="text">Manage Officer</span>
							</a></li>
						<li><a href="mcase.php" class="active">
								<span class="icon"><i class="fas fa-file-alt"></i></span>
								<span class="text">Manage Case</span>
                            </a></li>
                        <li><a href="graph.php">
								<span class="icon"><i class="fas fa-chart-pie"></i></span>
								<span class="text">Graph</span>
                            </a></li>
                        <li><a href="maps.php">
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
				 <div class="form1">
					<div class="main-div">
						<h1> Case List</h1>
							<div class="center-div">
								<div class="table-responsive">
									<table>
										<thead>
											<tr>
											<th>CASE-ID</th>
											<th>CASE-NAME</th>		
											<th>CRIME</th>
											<th>CRIMINAL-ID</th>
											<th>CRIMINAL-NAME</th>
											<th>CRIME-LOCATION</th>
											<th>CRIME-EVIDENCE</th>
											<th>CASE-STATUS</th>	
											<th>OPERATION</th>
											</tr>
										</thead>
										<tbody>
										<?php
										include 'config.php';
										
										$selectquery = "select * from fir where case_status='COMPLETED' ";

										$query = mysqli_query($conn,$selectquery);
										
										$nums = mysqli_num_rows($query);
										
										while($res = mysqli_fetch_array($query)){
										?>	

										<tr>
										
										<td><?php echo $res['case_id']; ?></td>
                                		<td><?php echo $res['case_name']; ?></td>
										<td><?php echo $res['crime_type']; ?></td>
										<td><?php echo $res['criminal_id']; ?></td>
										<td><?php echo $res['criminal_name']; ?></td>
										<td><?php echo $res['crime_location']; ?></td>
										<td><?php echo $res['crime_evidence']; ?></td>
										<td class="blink"><?php echo $res['case_status']; ?></td>
										<td><a href="deletec.php?id=<?php echo $res['case_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="DELETE"><i class="fas fa-trash"></i></a></td>
										</tr> 										
										<?php
										}
										?>
											
										</tbody>
									
									</table>
								</div>
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
		
		$(document).ready(function(){
  			$('[data-toggle="tooltip"]').tooltip();
		});
		
</script>
</body>

</html>
