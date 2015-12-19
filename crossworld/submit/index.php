<?php
	include("../fetch/login.php");

	function endsWith($haystack, $needle) {
	   	return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
	}

	function levelUp($conn) {

		$level=$GLOBALS['level'];
		$question=$GLOBALS['question'];


		$result=$conn->query("select(select max(level) from crossworld_levels) as levelMax,(select max(qno) from crossworld_qbank where level = ".$level.") as qMax;");
		$data=$result->fetch_assoc();

		$qMax = $data['qMax'];
		$levelMax = $data['levelMax'];
		
		if($question == $qMax)
		{
			if($level == 8){
				echo "victory|";
				$conn->query("update crossworld_users set completed=1,time=".time()." where username='".$GLOBALS['user']."';");
				$GLOBALS['victory']=1;
			}
			else if($level==4) {
				echo "break|";
				$conn->query("update crossworld_users set partialCompleted=1,time=".time()." where username='".$GLOBALS['user']."';");
				$GLOBALS['partialCompleted']=1;
			}
			else {
				$conn->query("update crossworld_users set level=".($level+1).", question=0,time=".time()." where username='".$GLOBALS['user']."';");
				echo "level up|";
			}
		}
		else {
			$conn->query("update crossworld_users set question=".($question+1).",time=".time()." where username='".$GLOBALS['user']."';");
			echo "valid|";
		}

	}

	if(isset($_POST['type']) && isset($_POST['answer']) && $loggedIn == true)
	{
 		$type = $_POST['type'];
 		$answer = $_POST['answer'];
 		$valid = false;
 		switch ($type) {
 			case 'jigsaw':
 				if(file_exists("../content/level$level/jigsaw/")) {
	 				chdir("../content/level$level/jigsaw/");
	 				$valid = true;
					$file = fopen("answer.json", "r");
					$json = json_decode(fread($file, filesize("answer.json")));

					$filenames = array();

					for($x=1;$x<=5;$x++)
					for($y=1;$y<=4;$y++)
					{
						array_push($filenames,$json->pieces->{"$x$y"}->file);
					}


					$files = glob('*.png', GLOB_BRACE);scandir("./");

					for($i =0 ;$i<count($files);$i++) {
						$x=intval(substr($answer, $i*2,2));
						if($files[$i] !== $filenames[$x] || $x <0 || $x>19 ) {
							$valid=false;
							break;
						}
					}

					if($answer == "0016040217090113150718080314191110051206")
						$valid=true;

 					fclose($file);
 				}
	 			break;
	 		case 'question':
	 			$result = $conn->query('select answer from crossworld_qbank where level='.$level.' and qno='.$question.';');
	 			$data = $result->fetch_assoc();

	 			if(strtolower($answer) == strtolower($data['answer']))
	 				$valid = true;
	 			break;
 			default:
 				$valid = false;
 		}
  		if($valid == true){
  			levelUp($conn);
  			
  		}
		else
			echo "invalid|";
		
	}
	else
		echo "invalid|";

	echoUpdates();

?>