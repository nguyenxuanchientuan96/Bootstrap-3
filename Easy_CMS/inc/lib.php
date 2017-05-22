<?php
	$conn=mysqli_connect("localhost","root","","cms");
	if($conn){
		mysqli_set_charset($conn,"utf8");
	}
	else{
		die("Có lỗi khi kết nối với db".mysqli_error($conn));
	}

?>