<DOCTYPE! html>
	<head>
	</head>
<?php
	
	include("navbar.html");

	if(isset($_GET["submit"])){
	$n=$_GET["name"];
	$e=$_GET["email"];
	$p=$_GET["password"];
	if($n==''){
		echo '<script type="text/javascript">alert("missing username !");</script>';
	}

	if($e==''){
		echo '<script type="text/javascript">alert("missing email!");</script>';
	}
	
	if($p==''){
		echo '<script type="text/javascript">alert("missing password!");</script>';
	
	}
	
	else{
	$con=mysqli_connect("localhost","root","","meta");
	$query="insert into user(username,email,password) values('$n','$e','$p')";
	$result=mysqli_query($con,$query);
	if($result){
		
		header('Location:home.php');
		}
	}	
	}
?>
	<body>

	<h1>Create an Account</h1>

	<div class="container padding-top-10">
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="signup.php" method="GET">
					<label for="name" class="control-label">Name:</label>
					<div class="row">
						<div class="col-md-12">
							<input type ="text" class="form-control" name="name" placeholder="Name" />
						</div>		 		
					</div>


					<label for="email" class="control-label">Email:</label>
					<div class="row">
						<div class="col-md-6">
							<input type ="text" class="form-control" name="email" placeholder="Email" />
						</div>		 		
					</div>
					

					<label for="password" class="control-label">Password:</label>
					<div class="row">
						<div class="col-md-12">
							<input type ="text" class="form-control" name="password" placeholder="*****" />
						</div>		 		
					</div>

					<div class="row">
						<div class="col-md-2">
							<input id="signupbtn"type ="submit" class="btn btn-success" value="Create Account" name="submit"/>
						</div>		 		
					</div>


				</form>
			</div>
		
		</div>
	</div>
</body>
</html>		



