<?php  
include_once('examDAO.php');
$email = $_POST['email_exist'];

$email_exist = examDAO::emailExist($email);

if($email_exist > 0){
	echo "E-mail is already in use";
	return false;
}


?>