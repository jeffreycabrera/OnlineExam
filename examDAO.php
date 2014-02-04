<?php  
include_once('connectDB.php');

class examDAO{


	public static function getQuestion($id){
		try{
			$query = "SELECT question, a, b, c, d FROM exam WHERE exam_id = '$id'";
			$result = mysql_query($query);
			return $result;
		}catch (Exeption $e) {
			error_log(getMessage($e));
		}
			return false;
		}

	// public static function validateAnswer($id){
	// 	try{
	// 		$query = "SELECT answer FROM exam WHERE exam_id = '$id'";
	// 		$result = mysql_query($query);
	// 		return $result;
	// 	}catch (Exeption $e) {
	// 		error_log(getMessage($e));
	// 	}
	// 		return false;
	// 	}

	public static function createUser($fname, $lname, $email, $password, $confirm){
		try{
			$query = "INSERT INTO `examinee`(`firstname`, `lastname`, `email`, `password`, `confirm`) 
						VALUES ('$fname','$lname','$email','$password','$confirm')";
			$insert = mysql_query($query);
			return $insert;
		}catch (Exeption $e) {
			error_log(getMessage($e));
		}
			return false;
		}

	public static function emailExist($email){
		try{
			$query = "SELECT email FROM examinee WHERE email = '{$email}'";
			$result = mysql_query($query);
			$num_rows = mysql_num_rows($result);
			return $num_rows;
		}catch (Exeption $e) {
			error_log(getMessage($e));
		}
			return false;
		}

	public static function user_id_from_email($email){
		try{
			$user_id_from_email = mysql_result(mysql_query("SELECT user_id FROM examinee WHERE email = '$email'"), 0, 'user_id');
			return $user_id_from_email;
		}catch (Exeption $e) {
			error_log(getMessage($e));
		}
			return false;
		}

	public static function login($email, $password){
		try{
			$user_id = examDAO::user_id_from_email($email);
			$query = "SELECT COUNT(`user_id`) FROM examinee WHERE email = '$email' AND password = '$password'";
			$result = (mysql_result(mysql_query($query), 0) == 1) ? $user_id : false;
			return $result;
		}catch (Exeption $e) {
			error_log(getMessage($e));
		}
			return false;
		}

	public static function get_user_by_email($email){
		try{
			$query = "SELECT firstname, lastname FROM examinee WHERE email = '$email'";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			return $row;
		}catch (Exeption $e) {
			error_log(getMessage($e));
		}
			return false;
		}

	public static function getAnswers(){			
		try{
			$query = "SELECT answer FROM exam ORDER BY exam_id";
			$result = mysql_query($query);
			$answers = array();
			while($row = mysql_fetch_assoc($result)){
				$answers[] = $row['answer'];
			}
			return $answers;
		}catch (Exeption $e) {
			error_log(getMessage($e));
			}
				return false;
			}

	public static function checkAnswers($answers) {
		$correct = self::getAnswers();

		if($correct === false) {
			error_log("Not Ready");
		}
		if (count($correct) != strlen($answers)) {
			error_log("Invalid Answers");
			return false;
		}
		$score = 0;
		for ($i = 0; $i < count($correct); $i++){
			if($correct[$i] == $answers[$i]){
				$score++;
			}
		}
			return $score;
		}
}
?>