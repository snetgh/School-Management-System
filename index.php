<?php include '_header.html'; ?>
<?php
	session_start();
	
	require_once "conection/connect.php";
	
	$msg="";
	if(isset($_POST['btn_log'])){
		$uname=$_POST['username'];
		$pwd=$_POST['password'];
		
		$sql=mysqli_query($my_connection_string,"SELECT * FROM users_tbl
								WHERE username='$uname' AND password='$pwd' 		
							");

		$cout=mysqli_num_rows($sql);
		
			if($cout>0){
				$row=mysqli_fetch_array($sql);
				$user_id_ini = $row["u_id"];
				$get_teacher_info = mysqli_query($my_connection_string,"SELECT * FROM `teacher_tbl` WHERE `teacher_login_info` = '$user_id_ini' LIMIT 1");

				$get_teacher_id_ini=mysqli_fetch_array($get_teacher_info);
				$user_id = $get_teacher_id_ini["teacher_id"];

				


					if($row['type']=='Admin') {
						$msg = "wrong Username and Password";					
						setcookie("i", $user_id, time() + (86400 * 30),"/");	
						header("location: everyone.php");
						}	
					elseif($row['type']=='Teacher') { 
						header("location: teachers_section/index.php");
						setcookie("i", $user_id, time() + (86400 * 30),"/");	
						echo "<script>alert(".$user_id.")</script>";
					}}
						
			else
					// $msg="Wrong Username and Password";
							echo "<div style='width: 500px; margin-top: 10px; margin-left: 700px;''>" 
										."<div class='alert alert-danger col-lg-12'>"
										."<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
										."</button>"
										."<strong>wrong username/password. </strong>"
										."</div>"
										."</div>";
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form role="form" data-toggle="validator" method="post" class="login_form logo_div">
			 	<h4 class="text-center">LOGIN</h4>
			 	<p>Please fill out the following form with your login credentials.</p>
			 	<div class="form-group">
			    <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
			    	<input type="text" class="form-control" id="username" name="username"  placeholder="Your Username..." required>
			    </div>
			    <div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
			    <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-key"></i></span>
			    	<input type="password" class="form-control" id="password" name="password"  placeholder="Passowrd" required>
			    </div>
			    <div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
			    <button type="submit" name="btn_log" class="btn btn-success pull-right">Submit</button>
			  </div>
			  <div class="clearfix"></div>
			</form>
		</div>
	</div>
</div>
<?php include '_footer.html'; ?>