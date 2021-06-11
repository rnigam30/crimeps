<?php
include 'config.php';

$ids = $_GET['id'];
$query = "update fir set case_status='COMPLETED' where case_id='$ids'";
$res = mysqli_query($conn,$query);
								
if($res){
	?>
	<script>
		alert("CASE ADDED SUCCESSFULLY!!!"); 
		window.location="final.php";
	</script>
	<?php
}else{
	?>
	<script>
		 alert("CASE NOT ADDED!!!"); 
	</script>
	<?php
}

?>