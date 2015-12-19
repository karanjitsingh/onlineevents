<?php 

include "../session.php";

if(checkSession()) {
if(isset($_REQUEST['answer']))
if($_REQUEST['answer'] != "")
{

	$answer = $_REQUEST['answer'];

	$result = $conn->query("select * from electrific_users");


	$data = $result->fetch_assoc();

	$username = $data['username'];
	$question = $data['question'];
	$subquestion   = $data['subquestion'];

	$response = mysqli_query($conn, "select * from electrific_quest where question_no = $question and subgroup='$subquestion'");

	$row = mysqli_fetch_array($response, MYSQLI_ASSOC);

	$json_ques = array();

	if( strtolower($answer) == strtolower($row['answer'])) {

		$subquestion++;

		$response = mysqli_query($conn, "select * from electrific_quest where question_no = $question and subgroup='$subquestion'");


		$num = $response->num_rows;

		if($num == 0) {
			$question++;
			$subquestion = 'A';
			$response = mysqli_query($conn, "select * from electrific_quest where question_no = $question and subgroup='$subquestion'");

			$num = $response->num_rows;

			if($num == 0) {
				mysqli_query($conn, "update electrific_users set question=$question, subquestion='$subquestion', victory=1 ,time=".time()."  where username='$username'");

				array_push($json_ques, array('result' => 'victory'));
				
				echo json_encode(array("json" => $json_ques));
				exit(0);
			}
		}

		$row = mysqli_fetch_array($response, MYSQLI_ASSOC);

		mysqli_query($conn, "update electrific_users set question=$question, subquestion='$subquestion',time=".time()." where username='$username'");


		array_push($json_ques, array('result' => 'valid',
								'question_no' => $row['question_no'],
	    						'subgroup' => $row['subgroup'],
	    						'question' => $row['question'],
	    						'file' => $row['file']));
	}
	else {
		array_push($json_ques, array('result' => 'invalid'));
	}

	echo json_encode(array("json" => $json_ques));

}
}
?>