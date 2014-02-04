<?php  
include_once('examDAO.php');

if((isset($_POST['email'])) && (isset($_POST['password']))){
	$email = $_POST['email'];
	$password = $_POST['password'];

	if($email && $password !== NULL){
		$login = examDAO::login($email, $password);
		if($login === false){
			header('Location: index.php');
			exit();
		}else {
			$row = examDAO::get_user_by_email($email);
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
		}
	}else{
		header('Location: index.php');
	}
}

?>

<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome-ie7.css" rel="stylesheet">
    <link href="css/boot-business.css" rel="stylesheet">
    <link href="css/styleForExam.css" rel="stylesheet">
</head>
<body style = "background-image:url('img/background.jpg')">
	  <div class = "fluid" >
    <div class = "container">
      <div class = "well" style = "height: 500px">
        <div>
        	<div><h2>Hi,<?php echo " " . $firstname . " " . $lastname . "!"; ?></h2></div><br /><br /><br />
        	<center><div><h2>Welcome to online examination system.</h2></div><br /><br /><br />
        	<div><h2>Please click the Continue button to proceed to the exam.</h2></div><br /><br /><br />
        	<input type = "submit" value = "Continue" id = "take_the_exam" class = "btn btn-primary"></center>
      </div>
    </div>
  </div>
<script type="text/javascript" src = "js/jquery.1.10.2.js"></script>
<script type="text/javascript">
	$('#take_the_exam').click(function(){
		window.location = 'exam2.php'
	});

</script>
</body>
</html>