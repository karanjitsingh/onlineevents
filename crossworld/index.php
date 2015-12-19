<!doctype html>
<?php

	session_start();
	include "../session.php";
		if(!checkSession()) {
			die( "<script>if(parent.logout) parent.logout(301); else document.location.href=\"http://onlineevents.techtatva.in/?nologin=true\";</script>");
		}


	include("./fetch/login.php");
?>
<!doctype html>
<html>

<head>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300|Montserrat:400,700|Roboto:500,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="./style/page.css">
	<link rel="stylesheet" type="text/css" href="./style/jigsaw.css">
	<link rel="stylesheet" type="text/css" href="./style/question.css">
	<link rel="stylesheet" type="text/css" href="./style/story.css">
	<script type="text/javascript" src="./scripts/page.js"></script>
	<script type="text/javascript" src="./scripts/jigsaw.js"></script>
</head>

<body>

<div id="cover-content">
	<table class="cover-content-wrapper">
		<tr><td style="margin-bottom:5px;"><h1 class="title">Cross World</h1></td></tr>
		<tr><td><a onclick="showContent();" class="register" style="margin-right:5px;">Start</a><!--<a href="#" class="register" style="margin-left:5px;">Register</a>--></td></tr>
	</table>
</div>
<div id="loading-div" class=""><div></div></div>
<div id="page-content">
	<div id="stats" class="info-overlay">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
			<path d="M148.527,360.5H81.334v-139h67.193V360.5z M242.527,360.5h-67.193V79.167h67.193V360.5z M336.527,360.5h-67.193V164.667h67.193V360.5z M430.527,360.5h-67.193v-70.578h67.193V360.5z M462,387.834H50v45h412V387.834z"/>
		</svg>
	</div>
	<div id="user">kj</div>
	<div id="image-content">
		
		<?php
			echoMapData();
		?>
		<svg id="path-container" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 1100 530" width="1100px" height="530px" style="enable-background:new 0 0 1100 530;" xml:space="preserve"></svg>
	</div>
</div>
<div id="level-content">

</div>

<div id="overlay">
	<table>
		<tr>
			<td style="height:100%;"></td>
		</tr>
		<tr>
			<td style="height:8px;">
				<svg width="12px" height="8px">
					<polygon points="0,8 6,0 12,8"/>
				</svg>
			</td>
		</tr>
		<tr>
			<td style="padding:8px; background:rgba(0,0,0,0.7);">
				<span id="overlay-data">Current: 16<br/>Question: 24</span>
			</td>
		</tr>
		<tr>
			<td style="height:8px;">
				<svg width="12px" height="8px">
					<polygon points="0,0 6,8 12,0"/>
				</svg>
			</td>
		</tr>
		<tr>
			<td style="height:100%;"></td>
		</tr>
	</table>
</div>
<div id="notification">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" style=" fill: #eee; float: left;">

<path id="info-5-icon" d="M256,50.002C142.229,50.002,50,142.228,50,256c0,113.769,92.229,205.998,206,205.998   c113.77,0,206-92.229,206-205.998C462,142.228,369.77,50.002,256,50.002z M251.989,376.93   c-29.694,10.436-54.175-1.531-49.264-30.049c4.913-28.523,33.09-89.589,37.11-101.135c4.017-11.547-3.687-14.712-11.943-10.015   c-4.763,2.749-11.84,8.254-17.916,13.606c-1.685-3.393-4.055-7.27-5.833-10.983c9.915-9.936,26.488-23.256,46.108-28.083   c23.441-5.787,62.624,3.463,45.783,48.271c-12.024,31.937-20.529,53.976-25.888,70.388c-5.356,16.418,1.006,19.861,10.382,13.464   c7.325-5.001,15.129-11.804,20.849-17.079c2.646,4.301,3.494,5.672,6.11,10.614C297.559,346.105,271.584,369.924,251.989,376.93z	M313.516,179.372c-13.469,11.463-33.433,11.216-44.601-0.561c-11.166-11.77-9.302-30.606,4.163-42.072   c13.468-11.463,33.435-11.215,44.6,0.553C328.843,149.066,326.98,167.902,313.516,179.372z"></path>

</svg>
  <span></span>
</div>

<div id="fullPageNotify" style="display:none;">
	<div class="message"><div><span></span>
		<a class="submit" onclick="hideNotification()">Okay</a></div></div>
</div>

</body>

<script type="text/javascript">

	var info = {
		current: <?php echo $current ?>,
		ahead: <?php echo $ahead ?>,
		loggedIn: <?php echo ($loggedIn?"true":"false") ?>,
		user: <?php echo "\"$user\"" ?>,
		level: <?php echo $level ?>,
		question: <?php echo $question ?>
	}


	$id("cover-content").setAttribute("class","visible");
	$id("loading-div").setAttribute("class","stop");

	initLogin();

</script>

</html><?php 
	$conn->close();
?>