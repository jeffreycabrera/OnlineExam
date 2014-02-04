<?php 
include_once('examDAO.php');
session_start();
$answers = $_SESSION['answers'];

$result = examDAO::checkAnswers($answers);


?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/styleForExam.css">
</head>
<body>
	<div id = "formBorder2">
		<div id = "result">	 
			<?php echo "<h1>Your Score is " . $result . "</h1><br><br><br>";
				if($result >= 7){
					echo "<h1 style = 'color: blue'>Congratulations! You Passed!</h1>";
				}else{
					echo "<h1 style = 'color: red'>Sorry! You Failed!</h1>";
				}
			?>	
		</div>		
		<div id = "exit"><input type = "submit" value = "Exit" id = "exitButton"></div>
	</div>
<script type="text/javascript" src = "js/jquery.1.10.2.js"></script>
<script>

	$('#exitButton').click(function() {
		window.location = 'exit.php'
	});
</script>
</body>
</html>