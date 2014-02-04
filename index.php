<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome-ie7.css" rel="stylesheet">
    <link href="css/boot-business.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<header>
	<center>	
		<div id = "header" class = "well">
			<form name = "loginForm" action = "logged_in.php" method = "POST" class="form-horizontal form-signin-signup">
				<input type="email" id="email" name = "email" placeholder = "E-mail">
				<input type="password" id="password" name = "password" placeholder = "Password">
				<input type="submit" value="Log In" class="btn btn-primary" id = "login">
			</form>
		</div>
	</center>

</header>
<body>
 	<div class = "well span3" style ="margin-left: 0px"><center><h2>Register</h2>
		<div class = "span3" id = "block" style = "margin-left: 0px">
			<form method="POST" action="index.php" name = "registerForm">
				<input type="text" name="firstname" id="firstname" placeholder = "First Name" />
				<div id = "line"></div>
				<input type="text" name="lastname" id="lastname"placeholder = "Last Name" />	
				<input type="email" name="email1" id = "email_input" placeholder = "Email Address"/>
				<div id = 'emailHtml'></div>
				<input type="password" name="password1" id = "password1" placeholder = "Password"/>	
				<input type="password" name="password2" id= "confirm" placeholder = "Confirm Password"/>
				<div id = 'confirmPass'></div>
				<div>
					<input type="submit" value = "Register" id="register2" class="btn btn-primary pull-right">	
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery.1.10.2.js"></script>
	<script type="text/javascript" src="js/loginRegister.js"></script>
	 <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/boot-business.js"></script>

</body>
</html>

<?php  
include_once('examDAO.php');

if((isset($_POST['firstname'])) && (isset($_POST['lastname'])) && (isset($_POST['email1'])) && (isset($_POST['password1'])) && (isset($_POST['password2']))){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email1'];
	$password = $_POST['password1'];
	$confirm = $_POST['password2'];

	if($firstname && $lastname && $email && $password && $confirm !== NULL){
		$email_exist = examDAO::emailExist($email);
		if($password == $confirm){
			if($email_exist == 0){	
				$register = examDAO::createUser($firstname, $lastname, $email, $password, $confirm);				
			}
		}
	} 
}
?>


