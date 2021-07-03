<?php
session_start();

if(isset($_SESSION['userlogin'])){
	header("Location: index.php");
}
    
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="LoginStyle.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<title>Login Form</title>
<body>
	

<div class="container h-100">
<div class="d-flex justify-content-center h-100">
<div class="user_card">
<div class="d-flex justify-content-center">
	<div class="logo_container">
	<img src="logo.png" class="logo" alt="Login logo">
	</div>

</div>
	<hr>
	<p></p>

	<div class="d-flex justify-content-center form_container">
	<form>
		<div class="form-group">
		<h2>Create account</h2>
		</div>
		<div class="form-group">
				<label class="control-label" for="loginEmail">Your Email</label>
				<input name="email" type="email" maxlength="50" id="email" class="form-control input_user" placeholder="Email" required>
		</div>
		<div class="form-group">
			 <label class="control-label" for="loginPassword">Your Password</label>
			 <input name="password" type="password" maxlength="50" id="password" class="form-control" placeholder="Password" required>
		</div>
		<div class="form-group">
			<div class="custom-control custom-checkbox">
				<input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline">
				<label class="custom-control-label" for="customControlInline">Remember me</label>
		</div>
		<p></p>
		<div class="form-group">
		<button name="login" type="submit" id="login" class="btn btn-primary btn-block">Login</button>
		</div>
		<div class="mt-4">
		 <div class="d-flex justify-content-center links">
		  Don't have an account? &nbsp; <a href="../registration/registration.php" class="m1-2">Sign Up </a>
		  </div>
		  <p>
		  <div class="d-flex justify-content-center">
		  <a href="#">Forget your password?</a>
		  </div>
		  </p>	
	 </form>
	
</div>
</div>
</div>
</div>
</body>

<script>
	$(function(){
		$('#login').click(function(e){
			var valid= this.form.checkValidity();
			if(valid){
				var email=$('#email').val();
				var password=$('#password').val();
		
				
			}

			e.preventDefault();

			 $.ajax({
				type: 'POST',
				url: 'jslogin.php',
				data: {email: email, password: password},
				success: function(data){
					alert(data);
					if($.trim(data) === "Successfully Logged In"){
						setTimeout(' window.location.href= "index.php" ' , 1000);
					}
					
				},
				error: function(data){
					alert('data');
				}

			});

		});

	});
</script>



</html>