<?php
include "session.php";
$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

header('Location: http://onlineevents.techtatva.in/m');

?>
<!doctype html>
<html>
<head>
<title>Online Events</title>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
<script src="./scripts/particles.js/particles.js"></script>
<script type="text/javascript" src="./scripts/form.js"></script>
<style>
	html,body {
		height:100%;
		overflow:hidden;
		padding:0px;
		margin:0px;
		font-family: 'Open Sans';
		background: #111;
	}
	#left-half {
		width:50%;
		position:absolute;
		left:0px;
		height: 100%;
		top:0px;
		background: #222;
		transition: left 0.5s ease-out, box-shadow 0.5s ease-out;

	}

	#right-half {
		width:50%;
		position:absolute;
		right:0px;
		height: 100%;
		top:0px;
		background: #222;
		transition: right 0.5s ease-out, box-shadow 0.5s ease-out;
	}

	#right-half.register,#right-half.signin {
		right:-250px;
		box-shadow: 0px 0px 10px #000;
	}

	#left-half.register,#left-half.signin {
		left:-250px;
		box-shadow: 0px 0px 10px #000;
	}

	#right-half.leaderboard {
		right:-400px;
		box-shadow: 0px 0px 10px #000;
	}

	#left-half.leaderboard {
		left:-400px;
		box-shadow: 0px 0px 10px #000;
	}

	.overlay {
		height: 100%;
		width: 100%;
		left:0px;
		right:0px;
	}

	.icon {
		cursor: pointer;
		height:128px; width:128px; background:rgba(255,255,255,0.3); border-radius:100px; position:absolute; 
		margin-top:-64px;
		opacity:0;
		transition:left 0.2s ease-out,top 0.2s ease-out,opacity 0.2s ease-out;

		z-index: 5;
	}

	/*#left-half .icon {
		right:-40px;
		top:400px;
	}
	
	#right-half .icon {
		left:-40px;
		top:400px;
	}*/

	.tint {
		opacity:0;
		z-index: -1;
		background:#fff;
		position: absolute;
		left:0px;
		top:0px;
		height: 100%;
		width: 100%;
		transition: opacity 0.5s ease-out;

	}

	#right-half.register .tint,#left-half.register .tint,#right-half.leaderboard .tint,#left-half.leaderboard .tint,#right-half.signin .tint,#left-half.signin .tint {
		z-index: 10 !important;
		opacity: 0.05 !important;
	}

	table,td,tr {
		border:0px;
		padding:0px;
		border-spacing: 0px;
	}

	input,a {
		outline: none !important;
	}

	input[type='text'],input[type='password'] {
		background: rgba(255,255,255,0.05);
		font-size:16px;
		border: 1px;
		outline:none !important;
		padding:8px 8px 6px 8px;
		box-sizing:border-box;
		width:400px;
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

	#event {
		height:100%; width:100%; position:absolute; background:#333;
		transition: top 0.3s ease-out;
		z-index: 100;
		top:0%;
	}

	#event.hidden {
		top:100%;
	}

	#iconCaption {
		font-family:'Roboto'; font-size:42px; color:#fff; font-weight:300; text-align:center;
		transition: opacity 0.2s;
		opacity:0;
	}

	#register table, #signin table, #leaderboard table {
		opacity: 0;
		background: rgba(17,17,17,0.3);
		padding:50px;
		transition: opacity 0.2s linear;
	}

	#register,#signin {
		position:absolute; width:500px;top:0px; left:50%; margin-left:-250px; height:100%; width:100%; background:#111; display:none;overflow-y:scroll;
	}

	#register.show table, #signin.show table, #leaderboard.show table {
		opacity: 1;
		z-index: 5;
	}

	#userinfo, #leaderboardinfo {
		z-index: 10;
	}

	#register svg,#signin svg {
		opacity:0;
		transition: opacity 0.2s ease-out;
		margin-right: 10px;
	}

	.disabled {
		cursor: default !important;
		filter:grayscale(100%);
		-webkit-filter:grayscale(100%);
		-moz-filter:grayscale(100%);
		-ms-filter:grayscale(100%);
		-o-filter:grayscale(100%);
		
	}

	#left-half .icon:nth-child(1){
		cursor:default !important;
	}

	.err {
		font-size: 14px; margin: 16px 0px 0px 10px;float: left;
	}

	#notification {
		position:fixed;bottom: -60px;width: 250px;left: 50%;height: 60px;margin-left: -125px;border-radius: 3px;background: #555;box-shadow: 0px 1px 1px 0px #000;padding: 14px;box-sizing: border-box;
		opacity: 0;
		transition: transform 0.2s ease-out,opacity 0.2s ease-out;
		z-index: 110;

	}

	#notification.visible {
		transform: translateY(-110px);
		opacity: 1;
	}

	#notification span {
		float: left;
		font-size: 14px;
		line-height: 32px;
		padding-left: 10px;
		color: #ddd;
	}
</style>
</head>
<body>
<div id="register">
	<table style=" width:400px; padding:50px; padding-top:100px; position:absolute; height:100%;">
		<tr>
			<td style="vertical-align:middle;">
				<div style="width:400px;">
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
					<span class="err"></span><input type="button" class="submit" value="Submit" onclick="register()"/><input type="button" class="cancel" value="Cancel" onclick="closePage()"/>

						<svg class="loadingSVG" width="28px" height="28px" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#fff" style="margin-top: 12px; margin-left: 6px; float: right;">
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
<div id="signin">
	<table style=" width:400px; padding:50px; padding-top:100px; position:absolute; height:100%;">
		<tr>
			<td style="vertical-align:middle;">
				<div style="width:400px;">
					<ul style="list-style-type:none; margin:0px; padding:0px;">
					<li><span class="registration">Login:</span></li>
					<li><input type="text" placeholder="Username"/></li>
					<li><input type="password" placeholder="Password"/></li>
					<li><span class="err"></span><input type="button" class="submit" value="Login" onclick="login()"/><input type="button" class="cancel" value="Cancel" onclick="closePage()"/>
						<svg class="loadingSVG" width="28px" height="28px" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#fff" style="margin-top: 12px; margin-left: 6px; float: right;">
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
<div id="leaderboard" style="position:absolute; left:0px; top:0px; height:100%; width:100%; background:#111; display:none">
	<table style="height:100%; width:700px; position:absolute; top:0px; left:50%; margin-left:-400px;">
	<tr>
		<td>
			<div style="width:700px; height:400px; background:rgba(255,255,255,0.1)">

			</div>
		</td>
	</tr>
	</table>
</div>
<div id="left-half">
	<div class="tint"></div>
	

	<div style="height:440px; right:0px; margin-top:-220px; top:50%; position:absolute; width:400px;">
		<div class="icon" style="right:6px; top:10px; background:url(./images/tt.png);" eventname="" catname="Techtatva 15"></div>
		<div class="icon disabled" style="right:110px; top:90px; background:url(./images/constructure.png);" catname="Constructure" eventname="Crossworld"></div>
		<div class="icon disabled" style="right:155px; top:220px; background:url(./images/alacrity.png);" catname="Alacrity" eventname="Battle of Branches"></div>
		<div class="icon disabled" style="right:110px; top:350px; background:url(./images/electrific.png);" catname="Electrific" eventname="Electrific"></div>
		<div class="icon disabled" style="right:6px; top:430px; background:url(./images/cryptoss.png);" catname="Cryptoss" eventname="Online Coding"></div>
		
	</div>
</div>
<div id="right-half">
	<div class="tint"></div>
	
	<div style="height:440px; left:0px; margin-top:-220px; top:50%; position:absolute; width:400px;">
		<div class="icon" style="left:6px; top:10px; background:url(./images/mechatron.png);" catname="Mechatron" eventname="Tech Tac Go"></div>
		<div class="icon disabled" style="left:110px; top:90px; background:url(./images/acumen.png);" catname="Acumen" eventname="Hopeless Opus"></div>
		<div class="icon disabled" style="left:155px; top:220px; background:url(./images/kraftwagen.png);" catname="Kraftwagen" eventname="Kraftwagen"></div>
		<div class="icon disabled" style="left:110px; top:350px; background:url(./images/bizzmaestro.png);" catname="Bizzmaestro" eventname="Wallstreet"></div>
		<div class="icon disabled" style="left:16px; top:430px; background:url(./images/cyberhawk.png);" catname="Cryptoss" eventname="Cyberhawk"></div>
	</div>
</div>
<div class="overlay">
<div id="particles-js" style="position:absolute; left:0px; top:0px; height:100%; width:100%;"></div>
	<div id="userinfo" class="<?php if(checkSession()) echo "loggedin"; else echo "loggedout";?>" style="position:absolute; right:50px; top:50px"><section><span><?php if(checkSession()) echo "Welcome! ".$_SESSION['username'];?></span><a onclick="logout()">Logout</a></section><section><a onclick="openPage('register')">Register</a><a onclick="openPage('signin')">Sign in</a></section></div>
	<div id="leaderboardinfo" class="loggedout" style="position:absolute; left:50px; top:50px"><a onclick="openPage('leaderboard')">Leaderboard</a></div>
	<table style="height:100px; width:300px; margin:-50px 0px 0px -150px; position:absolute; top:50%; left:50%; ">
		<tr><td id="iconCaption"><span style="display:block;"></span><span style="font-size:26px; display:block;"></span></td></tr>
	</table>
</div>
<div id="event" class="hidden">
<iframe id="eventIframe" style="display:none; height:100%; width:100%; border:0px;"></iframe>
</div>
<div id="particles-js"></div>

<div id="notification">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" style=" fill: #eee; float: left;">

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

	$id("eventIframe").onload = function() {
		$id("eventIframe").style.display="block";
	};

	for(var i=0;i<icons.length;i++) {
		if(i) {
			if(icons[i].className.indexOf("disabled") == -1)
				icons[i].onclick = iconClick;
			icons[i].onmouseover = iconOnMouseOver;
			icons[i].onmouseout = iconOnMouseOut;
		}
		else
		{
			icons[i].onmouseover = iconOnMouseOver;
			icons[i].onmouseout = iconOnMouseOut;
		}

	}

	function iconOnMouseOver(e) {
		$id("iconCaption").getElementsByTagName("span")[0].innerHTML = e.target.getAttribute("catname");
		$id("iconCaption").getElementsByTagName("span")[1].innerHTML = e.target.getAttribute("eventname");
		$id("iconCaption").style.opacity = 1; 
	}

	function iconOnMouseOut() {
		$id("iconCaption").getElementsByTagName("span")[0].innerHTML = " ";
		$id("iconCaption").getElementsByTagName("span")[1].innerHTML = " ";
		$id("iconCaption").style.opacity = 0;
	}

	function openEvent(catname) {
		$id("eventIframe").src = "http://onlineevents.techtatva.in/" + catname;
		$id("event").removeAttribute("class");
	}

	function unloadIframe(){
		var frame = $id("eventIframe");
		var frameDoc = frame.contentDocument || frame.contentWindow.document;
		frameDoc.removeChild(frameDoc.documentElement);
		frame.src="";
	}

	function closeEvent() {
		$id("event").className = "hidden";
		setTimeout(unloadIframe,300);
	}

	function iconClick(e) {
		if(document.getElementById('userinfo').className == "loggedin")
			openEvent(e.target.getAttribute("catname").toLowerCase());
		else
			notification.show("You're not logged in.");

	}

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

	function openPage(page) {
		if(ajaxwaiting)
			return;
		if(page == pageOpen){
			closePage();
			return;
		}
		else 
			pageOpen = page;
		$id("register").style.display="none";
		$id("leaderboard").style.display="none";
		$id("signin").style.display="none";
		$id("register").removeAttribute("class");
		$id("signin").removeAttribute("class");
		$id("leaderboard").removeAttribute("class");
		$id(page).style.display="block";
		setTimeout(function(){$id(page).className="show";},500);	
		$id("left-half").className = page;
		$id("right-half").className = page;
		
	}

	function closePage() {
		$id("register").removeAttribute("class");
		$id("signin").removeAttribute("class");
		$id("leaderboard").removeAttribute("class");
		//if (pageOpen == "register" || pageOpen == "siginin") {
		//	clearForm(openPage);
		//}
		pageOpen = "";
		setTimeout(function(){
			$id("left-half").removeAttribute("class");
			$id("right-half").removeAttribute("class");
		},200);
	}

	function initAnimate() {
		for(var i=0;i<icons.length/2;i++) {
			icons[i].style.transitionDelay = 0.1*i + "s";
			if(icons[i].className.indexOf("disabled") == -1)
				icons[i].style.opacity = 1;
			else 
				icons[i].style.opacity = 0.3;
			icons[i+5].style.transitionDelay = 0.1*i + "s";
			if(icons[i+5].className.indexOf("disabled") == -1)
				icons[i+5].style.opacity = 1;
			else
				icons[i+5].style.opacity = 0.3;
		}
	}


	initAnimate();

	particlesJS.load('particles-js', 'scripts/particles.js/config.json', function() {
		//console.log('callback - particles.js config loaded');
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
	};

	<?php 

		if(isset($_REQUEST['nologin']))
			if($_REQUEST['nologin']==true)
					echo "document.body.onload = function() {notification.show(\"You're not logged in.\");};\n";

	?>
</script>
</html>