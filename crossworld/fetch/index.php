<?php

	$headers = apache_request_headers();
	$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
	include("login.php");

	if($loggedIn == true)
	{
		
		if($question == 0 && !isset($_POST['start'])) {
			echo "story|";
				include("story.php");
		}
		else {
			if($question == 0 && isset($_POST['start']))
				$conn->query("update crossworld_users set question=".(++$question).",time=".time()." where username='".$GLOBALS['user']."';");
		
			$result = $conn->query("select type,data from crossworld_qbank where level=$level and qno=$question;");
			$data = $result->fetch_assoc();
			switch($data['type']) {
				case 'jigsaw':
					echo "jigsaw|";
					include("jigsaw.php");
					break;
				case 'question':
					echo "question|";
					include("question.php");
					break;
				case 'crossword':
					echo "crossword|";
					include("crossword.php");
					break;
			}
		}
	}
	else
	{
		header('HTTP/1.0 404 Not Found');
		include("../errors/404.html");
	}
	if($is_ajax) {
		header('HTTP/1.0 404 Not Found');
		include("../errors/404.html");
	}
?>