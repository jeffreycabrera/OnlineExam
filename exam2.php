<?php

include_once('examDAO.php');

define('QUESTION_NUMBER', 3);

$q_number = (isset($_POST['q_number'])) 
		? $_POST['q_number'] + 1
		 : 1;

$answers = (isset($_POST['answers'])) 
		? $_POST['answers'] ++
		 : '';

$answer = (isset($_POST['answer'])) 
		? $_POST['answer'] 
		: '';
$answers .= $answer;

if($q_number > QUESTION_NUMBER) {
	session_start();
	$_SESSION['answers'] = $answers;
	header('Location: result2.php');
}

$row =examDAO::getQuestion($q_number);
$q = mysql_fetch_array($row);
 

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/styleForExam.css">
</head>
<body>
	<div id = "formBorder">
		<form action = "<?= $_SERVER['PHP_SELF'] ?>" method = "POST">
			<input hidden name = 'answers' value = "<?= $answers ?>" />
			<input hidden name = 'q_number' value = "<?= $q_number ?>" /></br>
			<h1><?php echo $q['question']. "<br/>";?></h1>
			<div id = "choices">	
				<p><input type = 'radio' id = 'btn' name = 'answer' value = 'A' /><?php echo "A.  " . $q['a'] ?></p><br />
				<p><input type = 'radio' id = 'btn' name = 'answer' value = 'B'/><?php echo "B.  " . $q['b'] ?></p><br />
				<p><input type = 'radio' id = 'btn' name = 'answer' value = 'C'/><?php echo "C.  " . $q['c'] ?></p><br />
				<p><input type = 'radio' id = 'btn' name = 'answer' value = 'D' /><?php echo "D.  " . $q['d'] ?></p><br />
			</div>
			<input type = "submit" value = "Next" id = "submit">
		</form>
	</div>
<script type="text/javascript" src = "js/jquery.1.10.2.js"></script>
<script type="text/javascript" src = "js/exam.js"></script>

</body>
</html>