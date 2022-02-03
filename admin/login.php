<?php
require('connection.php');
require('function.inc.php');
$msg = '';

if(isset($_POST['submit'])){ 
	$username = safe_value($conn,$_POST['name']);
	$password = safe_value($conn,$_POST['password']);
	$query = "select * from admin where name=  '$username' and password = '$password'";
	$res = mysqli_query($conn,$query);
	$count = mysqli_num_rows($res);
	if($count > 0){
		$_SESSION['ADMIN_LOGIN']= 'yes';
		$_SESSION['ADMIN_NAME']= $username;
		header('location:index.php');
		die();
	}else{
		$msg = 'Please enter valid details';
	}
}


?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
	<div class="sufee-login d-flex align-content-center flex-wrap">
 <div class="container">
	<div class="login-content">
	   <div class="login-form mt-150">
		  <form method ="post">
			 <div class="form-group">
				<label>Email address</label>
				<input type="text" name="name" class="form-control" placeholder="Username" required>
			 </div>
			 <div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password" required>
			 </div>
			 <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
			</form>
			<span style="color:red;"><?php echo $msg ?></span>
	   </div>
	</div>
 </div>
</div>
	<footer class="site-footer">
            <div class="footer-inner bg-white">
               <div class="row">
                  <div class="col-sm-6">
                     Copyright &copy; 2018 Ela Admin
                  </div>
                  <div class="col-sm-6 text-right">
                     Designed by <a href="https://colorlib.com/">Colorlib</a>
                  </div>
               </div>
            </div>
         </footer>
    </div>
    <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
   </body>
</html>
      