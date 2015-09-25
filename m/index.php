<?php
include "../session.php";
?>
<!doctype html>
<html>
<head>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="/scripts/particles.js/particles.js"></script>
<script type="text/javascript" src="/scripts/form.js"></script>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<style>
	html,body {
		height:100%;
		padding:0px;
		margin:0px;
		font-family: 'Open Sans';
		background: #111;
	}

	input[type='text'],input[type='password'] {
		background: rgba(255,255,255,0.05);
		font-size:16px;
		border: 1px;
		outline:none !important;
		padding:8px 8px 6px 8px;
		box-sizing:border-box;
		width:100%;
		margin-bottom:5px;
		color:#fff;
		transition: background-color 0.2s ease-out;
	}
	input[type='text']:hover,input[type='password']:hover {
		background-color: rgba(255,255,255,0.15);
	}

	::-webkit-input-placeholder {
	   color: #888;
	}

	:-moz-placeholder { /* Firefox 18- */
	   color: #888;  
	}

	::-moz-placeholder {  /* Firefox 19+ */
	   color: #888;  
	}

	:-ms-input-placeholder {  
	   color: #888;  
	}

	span.registration {
		color:#fff;
		font-size: 20px;
		font-weight: 300;
		padding:10px 0px 10px 0px;
		display: block;
	}

	input[type='button'] {
		border:0px;
		transition: background-color 0.2s ease-out;
		font-size: 14px;
		color:#aaa;
		height:32px;
		width: 100px;
		float: right;
		margin-top: 10px;
		margin-left: 10px;
		cursor: pointer;
	}

	#userinfo span {
		color:#ddd;
	}

	input[type='button'].submit {
		background-color: rgba(5,136,201,0.3);
	}

	input[type='button'].cancel {
		background-color: rgba(255,255,255,0.1);
		margin-left: 0px;
	}

	input[type='button'].cancel:hover {
		background-color: rgba(255,255,255,0.2);
	}

	input[type='button'].submit:hover {
		background-color: rgba(5,136,201,0.7);
	}
	
	#userinfo span {
		color:#ddd;
	}

	#userinfo a, #leaderboardinfo a {
		margin-left:8px;
		color:#ddd;
		cursor: pointer;
		z-index: 100;

	}

	#userinfo a:hover, #leaderboardinfo a:hover {
		color: #0588C9;
	}

	#userinfo.loggedout section:nth-child(1),#userinfo.loggedin section:nth-child(2) {
		display:none;
	}
	#userinfo.loggedout section:nth-child(2),#userinfo.loggedin section:nth-child(1) {
		display:block;
	}

	.eventContainer .iconContainer {
		list-style-type: none;
		padding:0px;
		padding: 80px 0px 40px 0px;
		margin:0 auto 0 auto;
		text-align:center;
	}

	.iconContainer div {
		margin:0px 5px 10px 5px;
		display:inline-block;
	}

	.float_center {

}

	.icon {
		height: 150px;
		width:230px;
		background: rgba(255,255,255,0.1);
		margin:0 auto 0 auto;
		z-index: 1;
		transition:background-color 0.2s ease-out, opacity 0.2s ease-out;
		opacity: 0;
		background-position: center center;
		background-repeat: no-repeat;
	}

	.icon:hover {
		background-color:rgba(255,255,255,0.2);
	}

	.icon:nth-child(1) {
		background-color: transparent !important;
	}

	.disabled{
		background-color:transparent !important; 
	}

	.eventContainer {
		z-index: 5;
	}

	#userinfo,#leaderboardinfo {
		z-index: 10;
	}

	table,td,tr {
		border:0px;
		padding:0px;
		border-spacing: 0px;
	}

	.open {
		right:0px !important;
	}

	#register,#signin,#leaderboard {
		transition:right 0.3s ease-out;
		right:-100%;
		padding-bottom: 50%;
	}

	#register div,#signin div,#leaderboard div{
		max-width: 400px !important;
		margin:0 auto 0 auto;
	}

	#leaderboard li {
		color:#eee;
	}


	#signin svg,#register svg {
		opacity:0;
		transition: opacity 0.2s ease-out;
		margin-right:10px;
	}

	.disabled {
		cursor: default !important;
		filter:grayscale(100%);
		-webkit-filter:grayscale(100%);
		-moz-filter:grayscale(100%);
		-ms-filter:grayscale(100%);
		-o-filter:grayscale(100%);
	}

	.icon td:nth-child(1) {
		color:#fff;
		display:block;
	}

	.icon td,.icon table {
		vertical-align: bottom !important;
		height: 100%;
	}

	.err {
		font-size: 14px; margin: 16px 0px 0px 10px;float: left;
	}
	
	#notification {
		position:fixed;bottom: -32px;width: 100%;height: 32px;background: #444; padding: 4px;
		opacity: 0; box-sizing:border-box;
		transition: transform 0.2s ease-out,opacity 0.2s ease-out;

	}

	#notification.visible {
		transform: translateY(-32px);
		opacity: 1;
	}

	#notification span {
		float: left;
		font-size: 14px;
		line-height: 24px;
		padding-left: 6px;
		color: #ddd;
	}
</style>
</head>
<body>
<div style="width:100%; position:absolute;" class="eventContainer">
	<div class="iconContainer">
		<div class="icon" style="background-image:url(/images/tt.png);" eventname="" catname="Techtatva 15"></div>
		<div class="icon disabled" style=" background-image:url(/images/constructure.png);" catname="Constructure" eventname="Crossworld">

		</div>
		<div class="icon disabled" style="background-image:url(/images/alacrity.png);" catname="Alacrity" eventname="Battle of Branches"></div>
		<div class="icon disabled" style="background-image:url(/images/electrific.png);" catname="Electrific" eventname="Electrific"></div>
		<div class="icon disabled" style="background-image:url(/images/cryptoss.png);" catname="Cryptoss" eventname="Online Coding"></div>
		<div class="icon" style="background-image:url(/images/mechatron.png);" catname="Mechatron" eventname="Tech Tac Go"></div>
		<div class="icon disabled" style="background-image:url(/images/acumen.png);" catname="Acumen" eventname="Hopeless Opus"></div>
		<div class="icon disabled" style="background-image:url(/images/kraftwagen.png);" catname="Kraftwagen" eventname="Kraftwagen"></div>
		<div class="icon disabled" style="background-image:url(/images/bizzmaestro.png);" catname="Bizzmaestro" eventname="Wallstreet"></div>
		<div class="icon disabled" style="background-image:url(/images/cyberhawk.png);" catname="Cryptoss" eventname="Cyberhawk"></div>
	</div>
</div>

<div id="register" style="position:fixed; top:0px; height:100%; width:100%; background:#111; z-index:9; overflow-y:scroll;">
	<table style="height:100%; width:100%; padding:30px; padding-top:60px; box-sizing:border-box;">
		<tr>
			<td style="vertical-align:middle;">
				<div style="width:100%;;">
					<ul style="list-style-type:none; margin:0px; padding:0px;">
					<li><span class="registration">Details:</span></li>
					<li><input type="text" placeholder="Name"/></li>
					<li><input type="text" placeholder="Registration"/></li>
					<li><input type="text" placeholder="Phone"/></li>
					<li><input type="text" placeholder="Email"/></li>
					<li><input type="text" placeholder="College"/></li>
					<li><span class="registration">Login:</span></li>
					<li><input type="text" placeholder="Username"/></li>
					<li><input type="password" placeholder="Password"/></li>
					<li><input type="password" placeholder="Confirm Password"/></li>
					<li>
					<span class="err"></span>
					<input type="button" class="submit" value="Submit" onclick="register()" /><input type="button" class="cancel" value="Cancel" onclick="closePage()"/>
					<svg width="28px" height="28px" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#fff" style="margin-top: 12px; margin-left: 6px; float: right;">
						    <g fill="none" fill-rule="evenodd">
						        <g transform="translate(1 1)" stroke-width="2">
						            <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
						            <path d="M36 18c0-9.94-8.06-18-18-18" transform="rotate(341.553 18 18)">
						                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>
						            </path>
						        </g>
						    </g>
						</svg>
					</li>
					</ul>
				</div>
			</td>
		</tr>
	</table>
</div>

<div id="signin" style="position:fixed; top:0px; height:100%; width:100%; background:#111; z-index:9; overflow-y:scroll;">
	<table style="height:100%; width:100%; padding:30px; padding-top:60px; box-sizing:border-box;">
		<tr>
			<td style="vertical-align:middle;">
				<div style="width:100%;;">
					<ul style="list-style-type:none; margin:0px; padding:0px;">
					<li><span class="registration">Login:</span></li>
					<li><input type="text" placeholder="Username"/></li>
					<li><input type="password" placeholder="Password"/></li>
					<li>
					<span  class="err"></span>
					<input type="button" class="submit" value="Login" onclick="login()"/><input type="button" class="cancel" value="Cancel" onclick="closePage()"/>
					<svg width="28px" height="28px" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#fff" style="margin-top: 12px; margin-left: 6px; float: right;">
						    <g fill="none" fill-rule="evenodd">
						        <g transform="translate(1 1)" stroke-width="2">
						            <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
						            <path d="M36 18c0-9.94-8.06-18-18-18" transform="rotate(341.553 18 18)">
						                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>
						            </path>
						        </g>
						    </g>
						</svg></li>
					</ul>
				</div>
			</td>
		</tr>
	</table>
</div>

<div id="leaderboard" style="position:fixed; top:0px; height:100%; width:100%; background:#111; z-index:9">
	<table style="height:100%; width:100%; padding:40px; padding-top:80px; box-sizing:border-box;">
		<tr>
			<td style="vertical-align:top;">
				<div style="width:100%;;">
					<ul style="list-style-type:none; margin:0px; padding:0px;">
					<li><span class="registration">Leaderboard:</span></li>
					<li>Coming Soon.</li>
					<li><input type="button" class="cancel" value="Close" onclick="closePage()" style="float:none; margin:20px 0px 0px 0px;"/></li>
					</ul>
				</div>
			</td>
		</tr>
	</table>
</div>


<div class="overlay">

<div id="particles-js" style="position:fixed; left:0px; top:0px; height:100%; width:100%;"></div>
	<div id="userinfo" class="<?php if(checkSession()) echo "loggedin"; else echo "loggedout";?>" style="position:absolute; right:30px; top:30px"><section><span><?php if(checkSession()) echo "Welcome! ".$_SESSION['username'];?></span><a onclick="logout()">Logout</a></section><section><a onclick="openPage('register')">Register</a><a onclick="openPage('signin')">Sign in</a></section></div>
	<div id="leaderboardinfo" class="loggedout" style="position:absolute; left:30px; top:30px"><a style="margin-left:0px;" onclick="openPage('leaderboard')">Leaderboard</a></div>
</div>

<div id="notification">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" style=" fill: #eee; float: left;">

<path id="info-5-icon" d="M256,50.002C142.229,50.002,50,142.228,50,256c0,113.769,92.229,205.998,206,205.998   c113.77,0,206-92.229,206-205.998C462,142.228,369.77,50.002,256,50.002z M251.989,376.93   c-29.694,10.436-54.175-1.531-49.264-30.049c4.913-28.523,33.09-89.589,37.11-101.135c4.017-11.547-3.687-14.712-11.943-10.015   c-4.763,2.749-11.84,8.254-17.916,13.606c-1.685-3.393-4.055-7.27-5.833-10.983c9.915-9.936,26.488-23.256,46.108-28.083   c23.441-5.787,62.624,3.463,45.783,48.271c-12.024,31.937-20.529,53.976-25.888,70.388c-5.356,16.418,1.006,19.861,10.382,13.464   c7.325-5.001,15.129-11.804,20.849-17.079c2.646,4.301,3.494,5.672,6.11,10.614C297.559,346.105,271.584,369.924,251.989,376.93z	M313.516,179.372c-13.469,11.463-33.433,11.216-44.601-0.561c-11.166-11.77-9.302-30.606,4.163-42.072   c13.468-11.463,33.435-11.215,44.6,0.553C328.843,149.066,326.98,167.902,313.516,179.372z"></path>

</svg>
  <span></span>
</div>

</body>
<script type="text/javascript">
	function $id(obj) {
		return document.getElementById(obj);
	}

	var pageOpen = "";
	var icons = document.getElementsByClassName("icon");

		for(var i=0;i<icons.length;i++) {
		if(i) {
			if(icons[i].className.indexOf("disabled") == -1)
				icons[i].onclick = iconClick;
		}
		else
		{
		}

	}

	function iconOnMouseOver(e) {
		$id("iconCaption").innerHTML = e.target.getAttribute("eventname");
		$id("iconCaption").style.opacity = 1; 
	}

	function iconOnMouseOut() {
		$id("iconCaption").innerHTML = " ";
		$id("iconCaption").style.opacity = 0;
	}

	function iconClick(e) {
		if(document.getElementById('userinfo').className == "loggedin")
			document.location.href = "http://onlineevents.techtatva.in/" + e.target.getAttribute("catname").toLowerCase();
		else
			notification.show("You're not logged in.");

	}

	function openPage(page) {
		if(ajaxwaiting)
			return;
		if(page == pageOpen){
			closePage();
			return;
		}
		else 
			pageOpen = page;
		$id("register").removeAttribute("class");
		$id("signin").removeAttribute("class");
		$id("leaderboard").removeAttribute("class");

		$id(page).className = "open";

		document.body.style.overflow="hidden";
	}

	function closePage() {
		$id("register").removeAttribute("class");
		$id("signin").removeAttribute("class");
		$id("leaderboard").removeAttribute("class");
		document.body.style.overflow="initial";
		pageOpen = "";
	}
	
	function initAnimate() {
			for(var i=0;i<icons.length/2;i++) {
				icons[i].style.transitionDelay = 0.1*i + "s";
				if(icons[i].className.indexOf("disabled") == -1)
					icons[i].style.opacity = 1;
				else
					icons[i].style.opacity = 0.5;
				icons[i+5].style.transitionDelay = 0.1*i + "s";
				
				if(icons[i+5].className.indexOf("disabled") == -1)
					icons[i+5].style.opacity = 1;
				else
					icons[i+5].style.opacity = 0.5;
			}
	}

	initAnimate();

	particlesJS.load('particles-js', '../scripts/particles.js/config.json', function() {
		//console.log('callback - particles.js config loaded');
	});


	function clearForm(type) {
		if(type == "register") {
			var inputs = document.getElementById("register").getElementsByTagName("input");
			var errText = document.getElementById("register").getElementsByTagName("span");
			errText=errText[errText.length-1];
			errText.innerHTML=" ";
			for(var i=0; i<inputs.length;i++)
				inputs[i].value="";
		} else if(type == "signin") {

			var inputs = document.getElementById("signin").getElementsByTagName("input");
			var errText = document.getElementById("signin").getElementsByTagName("span");
			errText=errText[errText.length-1];
			errText.innerHTML=" ";
			for(var i=0; i<inputs.length;i++)
				inputs[i].value="";
		}
	}



	initAnimate();

	particlesJS.load('particles-js', '/scripts/particles.js/config.json', function() {
		console.log('callback - particles.js config loaded');
	});
	
	var notification = {
		timeout:0,

		show:function(msg) {
			$id("notification").getElementsByTagName("span")[0].innerHTML = msg + " ";
			$id("notification").className = "visible";
			clearTimeout(notification.timeout);
			notification.timeout = setTimeout(notification.hide,4000);
		},

		 hide:function() {
			$id("notification").removeAttribute("class");
		}
	}
	
	<?php 

		if(isset($_REQUEST['nologin']))
			if($_REQUEST['nologin']==true)
					echo "document.body.onload = function() {notification.show(\"You're not logged in.\");};\n";

	?>
</script>
</html>