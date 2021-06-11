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
	<title>Add new FIR</title>
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
					<ul class="menu">
						<li><a href="../index.html" class=" ">
								<span class="icon"><i class="fas fa-home"></i></span>
								<span class="text">Home</span>
							</a></li>
                            <li><a href="newfir.php" class="active">
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
                <div class="container">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="name label">
                       CASE NAME: 
							<input type="text" name="casename" placeholder="case name" class="value" required>
                    </div>
                    <div class="type label">
                    <label for="type">TYPE OF CRIME: </label>
                    <select id="type" name="crime-type" class="value" required>
                        <option> Crime-Types </option>
                        <option>Robbing</option>
                        <optio>Chain Snatching</option>
                        <option>Murder</option>
                        <option>Defamation</option>
                        <option>Molestation</option>
                        <option>Corruption</option>
                        <option>Kidnapping</option>
                    </select>
                    </div>
                    <div class="area label">
                    <label for="area">CRIME LOCATION: </label>
                    <select id="area" name="area" class="value" required>
                        <option> Location </option>
                        <option>Bandra</option>
                        <option>Andheri</option>
                        <option>Dadar</option>
                        <option>Worli</option>
                        <option>Churchgate</option>
                        <option>Sakinaka</option>
                        <option>Versova</option>
                    </select>
                    </div>
                    <div class="evidence label">
                    <label for="evidence">CRIME EVIDENCE: </label>
                    <select id="evidence" name="evidence" class="value" required>
                        <option> Evidence-Types </option>
                        <option>Knife</option>
                        <option>Gun</option>
                        <option>Cell phone</option>
                        <option>Iron bar</option>
                        <option>Piece of cloth</option>
                        <option>Fingerprints</option>
                    </select>
                    </div>
                    <div class="name label">
                       CRIMINAL ID: 
							<input type="text" name="criminalid" placeholder="criminal ID" class="value" required>
                    </div>
                    <div class="name label">
                       CRIMINAL NAME: 
							<input type="text" name="criminalname" placeholder="criminal name" class="value" required>
                    </div>
                    <div class="add label">
                    CRIMINAL ADDRESS: 
							<input type="text" name="address" placeholder="address" class="value" required>
                    </div>
                    <div class="age label">
                    CRIMINAL AGE: 
							<input type="text" name="age" placeholder="age" class="value" required>
                    </div>
                    <div class="gen label">
                    CRIMINAL GENDER: <br>
                       <input type="radio" name="gender" id="gender" class="gen" value="MALE"> MALE<br>
                       <input type="radio" name="gender" id="gender" class="gen" value="FEMALE"> FEMALE<br>
                    </div>
                    <div class="month label">
                    <label for="month">CRIME MONTH: </label>
                    <select id="month" name="month" class="value">
                        <option> Months </option>
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                        </select>
                    </div>            
                    <div class="year label">
                    <label for="year">CRIME YEAR: </label>
                    <select id="year" name="year" class="value">
                                <option> Years </option>
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
                                <option>200</option>
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
                        </div>
                        <div class="name label">
							CRIMINAL IMAGE:
                                <input type="file" class="value" name="fileToUpload" onchange="loadFile(event)">
                        </div>  
                        <div class="image-label" >
                        <P><img id="output" width="150px"/></P>
                        </div>       
                        
                    <input type="submit" name="submit" value="ADD FIR" class="search">
                    </form>
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

$DB_server = 'localhost';
$DB_username = 'root';
$DB_password = "";
$DB_name = 'crime';

$conn = mysqli_connect($DB_server, $DB_username, $DB_password, $DB_name);

if(isset($_POST['submit'])){

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
    $file = $_FILES['fileToUpload'];

    $filename = $file['name'];
	$filepath = $file['tmp_name'];
	$fileerror = $file['error'];

    if($fileerror == 0){
		$destfile = 'criminals/'.$filename;
		move_uploaded_file($filepath, $destfile);
	}
   
    $insquery= "insert into fir(case_name,criminal_id,criminal_name,crime_type,crime_location,crime_evidence,criminal_address, criminal_age,criminal_gender,crime_month,crime_year,criminal_image) values ('$casename','$criminalid','$criminalname','$crime','$location','$evidence','$address','$age','$gender','$month','$year','$destfile')";

    $query_run = mysqli_query($conn,$insquery);
    
    if($query_run){
        ?>
        <script>
            alert("FIR added successfully!!!"); 
        </script>
        <?php
    }else{
        ?>
        <script>
             alert("FIR not added!!!"); 
        </script>
        <?php
    }
}
?>