<?php 

include "../session.php";

if(checkSession()) {

	$username = $_SESSION['username'];

	$result = $conn->query("select * from electrific_users where username='$username'");

	$num = $result->num_rows;

	if($num == 0){
		$conn->query("insert into electrific_users values('$username',1,'A',1,0,0)");
		$result = $conn->query("select * from electrific_users where username='$username'");
	}



	$data = $result->fetch_assoc();

	$question = $data['question'];
	$subquestion   = $data['subquestion'];

	$json_ques = array();

	if($data['victory'] == 1) {
		array_push($json_ques, array('victory'=> $data['victory']));
		echo json_encode(array("json" => $json_ques));
		exit(0);
	}

	$response = mysqli_query($conn, "select * from electrific_quest where question_no = $question and subgroup='$subquestion'");

	// json



	while ($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {
	

	    array_push($json_ques, array('question_no' => $row['question_no'],
	    						'subgroup' => $row['subgroup'],
	    						'question' => $row['question'],
	    						'file' => $row['file']));
	}
	echo json_encode(array("json" => $json_ques));

}
?>