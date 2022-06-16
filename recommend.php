<?php
	$seq = $_GET["seq"];
	
	$con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
	$sql = "select * from broadCast where seq= $seq";
	$result = mysqli_query($con, $sql); 
	$row = mysqli_fetch_array($result);
	$recommend = $row['recommend'];
	$recommend++;
	
	$sql1 = "update broadCast set recommend = $recommend where seq = $seq";
	mysqli_query($con, $sql1);

	echo "
		<script>
			history.go(-1);
		</script>
	";
					
?>