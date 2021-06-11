<?php
session_start();

if(!isset($_SESSION['fname'])){

	header('location:../index.html');
}
?>
<?php

$con = mysqli_connect("localhost","root","","crime");

if (isset($_POST['submit'])) {
    $value_filter = $_POST['filter'];
    $sql= "SELECT crime_type, COUNT(crime_type) FROM fir WHERE CONCAT(crime_year) LIKE '%$value_filter%' GROUP BY crime_type HAVING COUNT(crime_type) >= 1";
$result = mysqli_query($con,$sql);

$chart_data="";

while ($row = mysqli_fetch_array($result)) { 
$productname[] = $row['crime_type'] ;
$sales[] = $row['COUNT(crime_type)'];
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Graph</title>
	<link rel="stylesheet" href="graph.css">
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
						<li><a href="mcase.php">
								<span class="icon"><i class="fas fa-file-alt"></i></span>
								<span class="text">Manage Case</span>
                            </a></li>
                        <li><a href="graph.php" class="active">
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
                    <div class="container">
					    <form method="POST" action="">
                            <div class="year label">
                            <label for="year">SELECT YEAR: </label>
                            <select id="year" name="filter" class="value">
                                <option>Year</option>
                                <option>2000</option>
                                <option>2001</option>
                                <option>2002</option>
                                <option>2003</option>
                                <option>2004</option>
                                <option>2005</option>
                                <option>2006</option>
                                <option>2007</option>
                                <option>2008</option>
                                <option>2009</option>
                                <option>2010</option>
                                <option>2011</option>
                                <option>2012</option>
                                <option>2013</option>
                                <option>2014</option>
                                <option>2015</option>
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                            </select>
                            <input type="submit" name="submit" class="graph" value="View Graph">
                            </div>    
                            <div style="width:68%;height:20%;text-align:center">
                            <h2 class="page-header" > Crime Analytics </h2>
                            <div class="heading"> Crime <?php if(isset($_POST['submit'])){echo $value_filter; } ?> </div>
                            <canvas id="chartjs_bar"></canvas> 
                            </div>         
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
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
var ctx = document.getElementById("chartjs_bar").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels:<?php echo json_encode($productname); ?>,
datasets: [{
backgroundColor: [
"#5969ff",
"#ff407b",
"#25d5f2",
"#ffc750",
"#2ec551",
"#7040fa",
"#ff004e"
],
data:<?php echo json_encode($sales); ?>,
}]
},
options: {
legend: {
display: true,
position: 'bottom',
labels: {
fontColor: '#71748d',
fontFamily: 'Circular Std Book',
fontSize: 14,
}
},
}
});
</script>
</html>


