<?php
session_start();

if(!isset($_SESSION['name'])){

	echo "You are logged out!!";
	
	header('location:../index.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Case Enquiry</title>
	<link rel="stylesheet" href="enquiry.css">
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
						<li><a href="../index.html" class=" ">
								<span class="icon"><i class="fas fa-home"></i></span>
								<span class="text">Home</span>
							</a></li>
                            <li><a href="newfir.php">
								<span class="icon"><i class="fas fa-file-alt"></i></span>
								<span class="text">Add New FIR</span>
							</a></li>
                        <li><a href="enquiry.php" class="active">
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
                <div class="type label">
                        <form action="" method="post">
						<B><label for="type">CASE NAME: </label></B>
                        <input type="search" name="filter" class="value" required>
						<input type="submit" name="search" class="search" value="SEARCH">
						</form>				
					</div>
				<h1> Case List</h1>
					<div class="center-div">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
									<th>CASE-ID</th>
									<th>CASE-NAME</th>
									<th>CRIME</th>
									<th>CRIMINAL-ID</th>
									<th>CRIMINAL-NAME</th>
									<th>CASE-STATUS</th>
									<th>OPERATION</th>
									</tr>
								</thead>
								<tbody>
								<?php
								include 'config.php';
								if(isset($_POST['search'])){
									$value_filter = $_POST['filter'];
									$selectquery = "SELECT * FROM fir where CONCAT(case_name,criminal_name,crime_type) LIKE '%$value_filter%' ";
								}else{
									$selectquery = "select * from fir where case_status='PENDING' or case_status='REVIEWED'";
									$value_filter = "";
								}
									
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
								<td class="blink"><?php echo $res['case_status']; ?></td>
								<td><a href="updatec.php?id=<?php echo $res['case_id']; ?>">OPEN</a></td>
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