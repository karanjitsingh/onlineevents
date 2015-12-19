<?php
	$level= -1;
	$question= -1;
	$current= -1;
	$ahead= -1;
	$user= -1;
	$loggedIn = false;
	$qMax=-1;
	$levelMax=-1;
	$victory = false;
	$partialCompleted = false;
	session_set_cookie_params(0);
	session_start();

	function verifySession() {
		if(isset($_SESSION['user']) && isset($_SESSION['salt'])) {
			if(isset($_COOKIE['session'])) {
				$hash = hash("sha256",$_SESSION['user'].$_SERVER['REMOTE_ADDR'].$_SESSION['salt']);
				if($hash!==$_COOKIE['session']){
					clearSession();
					return false;
				} else{
					setcookie('session',$hash,time() + 10,"/");
					return true;
				}
			}
		}
	}

	function setSession() {
		$_SESSION['user'] = $_POST['user'];
		$_SESSION['salt'] = uniqid(mt_rand(), true);
		setcookie('session',hash("sha256",$_SESSION['user'].$_SERVER['REMOTE_ADDR'].$_SESSION['salt']),time() + 10,"/");
	}

	function clearSession() {
		session_destroy();
		$_SESSION= array();
		$GLOBALS['level']=-1;
		$GLOBALS['question']=-1;
		$GLOBALS['current']=-1;
		$GLOBALS['ahead']=-1;
		$GLOBALS['user']=-1;
		$GLOBALS['loggedIn']=false;
		session_set_cookie_params(0);
		session_start();
	}

	function consolelog($data) {
		echo "<script>console.log('".$data." - via php')</script>";
	}

	function echoMapData() {

		$level = $GLOBALS['level'];
		$question = $GLOBALS['question'];
		$loggedIn = $GLOBALS['loggedIn'];
		$conn = $GLOBALS['conn'];

		if($loggedIn) {
			$result=$conn->query("Select * from crossworld_levels;");
			$result2=$conn->query("Select completed,partialCompleted from crossworld_users where username='".$GLOBALS['user']."';");
			$data2 = $result2->fetch_assoc();
			
			$clickable="";
			$onclick="";
			$q="";
			do {
				$data = $result->fetch_assoc();
				if($data['level'] == $level && $data2['completed']!=1 && $data2['partialCompleted']!=1){
					$clickable=" current";
					$onclick=" onclick=loadLevel()";
					$q=" question=".$question;
				}

				if($data['level'] == $level && $data2['completed']==0 && $data2['partialCompleted']==0)
					echo '<div level='.$data['level'].$q.' class="map-pin'.$clickable.'"'.$onclick.' style="left:'.$data["xpos"].'px; top:'.$data["ypos"].'px; background:#000;"></div>';
				else
					echo '<div level='.$data['level'].$q.' class="map-pin'.$clickable.'"'.$onclick.' style="left:'.$data["xpos"].'px; top:'.$data["ypos"].'px; background:#008800;"></div>';
			} while($data['level'] < $level);

		}
	}

	function echoUpdates() {
		$conn = $GLOBALS['conn'];
		$level = $GLOBALS['level'];
		$question = $GLOBALS['question'];
		$result = $conn->query("select count(level) as current from crossworld_users where level=$level and question=$question and completed=".$GLOBALS['victory']." and partialCompleted=".$GLOBALS['partialCompleted'].";");
		$GLOBALS['current']=$result->fetch_assoc()['current'] -1;
		$result = $conn->query("select count(level) as ahead from crossworld_users where ((level=$level and question > $question ) or (level>$level)) and completed=".$GLOBALS['victory']." and partialCompleted=".$GLOBALS['partialCompleted'].";");

		$GLOBALS['ahead']=$result->fetch_assoc()['ahead'];
		$GLOBALS['loggedIn']=true;
		echo $GLOBALS['level']."|";
		echo $GLOBALS['question']."|";
		echo $GLOBALS['current']."|";
		echo $GLOBALS['ahead']."|";
		echo $GLOBALS['user']."|";
		echo ($GLOBALS['loggedIn']?"true":"false");
	}

	function getSessionUser($conn) {
		if(isset($_SESSION['user']))
		if(checkUser($_SESSION['user'],$conn)){
			
			$GLOBALS['user']='kj';
			$_SESSION['user']='kj';
			checkUser('kj',$conn);
			
			return true;
		}
		clearSession();
		return false;
	}

	function checkUser($user,$conn) {
		$result=$conn->query("Select * from crossworld_users where username = '$user';");
	
		if($result->num_rows==0)
			return false;
		$data = $result->fetch_assoc();


		$GLOBALS['level'] = $data['level'];
		$GLOBALS['question'] = $data['question'];
		$GLOBALS['victory']=$data['completed'];
		$GLOBALS['partialCompleted'] = $data['partialCompleted'];

		return true;
	}


	$servername = "localhost";
	$dbuser = "root";
	$dbpass = "karan";
	$db="oe_crossworld";

	$conn = new mysqli($servername, $dbuser, $dbpass,$db);

	if ($conn->connect_error) {
    	//404
    	die("Connection failed: " . $conn->connect_error);
	}

	//clearSession();
	//consolelog($_SESSION['user']);

	$result=$conn->query("select(select max(level) from crossworld_levels) as levelMax,(select max(qno) from crossworld_qbank where level = ".$level.") as qMax;");
		$data=$result->fetch_assoc();

	$qMax = $data['qMax'];
	$levelMax = $data['levelMax'];

	if(isset($_POST['user'])) {
		clearSession();
		setSession();
		if(getSessionUser($conn)) {
			$loggedIn = true;
			echoUpdates();echo "|";
			echoMapData();
		}
	} else 
		if(verifySession())
			if(getSessionUser($conn)) {
				$loggedIn = true;
				if(isset($_POST['update']))
					echoUpdates($conn);
				else if(isset($_POST['relogin'])) {
					echoUpdates();echo "|";
					echoMapData();
				}
			}


?>