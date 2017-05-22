<?php 
	if( empty($_SESSION) ){
		session_start();
	} 
?>
<?php
	require_once'../inc/lib.php'

?>

<?php
if (isset($_POST["submit"])) {
		// lấy thông tin người dùng
		$username = $_POST["name"];
		$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "select * from user where name='$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$_SESSION['name'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                header('Location: index.php');
			}
		}
	}

?>

<?php
	require_once("template/head.php");

?>






	<div class="container">
	
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-success">
							<div class="panel-heading text-center"> Login </div>
							<div class="panel-body">
								<form action="" method="POST" role="form">
										
								
									<div class="form-group">
										<label for="">Name</label>
										<input type="text" name="name" class="form-control" id="" placeholder="Input field">
									</div>

								
									<div class="form-group">
										<label for="">Password</label>
										<input type="password" name="password" class="form-control" id="" placeholder="Input field">
									</div>

									
								
									
									<div class="col-lg-12 text-center">
										<button type="submit" name="submit" class="btn btn-success">Đăng nhập</button>
									</div>
									
								</form>
								
							</div>
						</div>
					</div>
				</div> <!-- .row -->

		</div> <!-- .container -text -->
<?php
	
	require_once("template/footer.php");
?>