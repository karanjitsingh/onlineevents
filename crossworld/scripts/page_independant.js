//GLOBAL
var LEVEL = "";

//Page JS


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

function hideNotification() {
	$id("fullPageNotify").style.display="none";
}

function notify(code) {
	switch(code) {
		case 101:
			msg="Correct Answer!";
			loadLevel();
			notification.show(msg);
			break;
		case 102:
			msg="Level Up!";
			closeLevel();
			notification.show(msg);
			break;
		case 103:
			msg="Break.";
			$id("fullPageNotify").getElementsByTagName("span")[0].innerHTML = "Congrats you've completed all the levels.<br/>New levels to be unlocked soon!";
			$id("fullPageNotify").style.display = "block";
			var pins = document.getElementsByClassName("map-pin");
			pins[pins.length-1].removeAttribute("onclick");
			pins[pins.length-1].style.background = "#008800";
			pins[pins.length-1].className = "map-pin";
			closeLevel()
			break;
		case 104:
			msg="You won.";
			$id("fullPageNotify").getElementsByTagName("span")[0].innerHTML = "Congrats you've completed all the levels in Crossworld.";
			$id("fullPageNotify").style.display = "block";
			closeLevel()
			break;
		case 105:
			msg="Wrong answer."
			notification.show(msg);
			break;
		case 106:
			msg="Answer can't be empty.";
			notification.show(msg);
			break;
	}
	
}


var loading=false;
function toggleLoading() {
	
	if(!loading)
		$id("loading-div").setAttribute("class","topmost");
	else
		$id("loading-div").setAttribute("class","stop");
	loading = loading==false?true:false;
}

function $id(obj) {
	return document.getElementById(obj);
}

var ajaxRequest= function() {
	this.post= function(url,data,callback) {
		var xmlhttp = new XMLHttpRequest();
		if(callback)
			xmlhttp.onreadystatechange = function() {callback(xmlhttp);}; 
		xmlhttp.open("POST",url,true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send(data);
	};
}

function hideOverlay() {
	$id("overlay").removeAttribute("class");
}

function mapPinOverlay(e) {
	var rect = $id("image-content").getBoundingClientRect();
	statDisplay(parseInt(e.target.style.left) + rect.left-60,parseInt(e.target.style.top)+rect.top-10,1,e.target);
}

function initMouseEvents() {
	$id("stats").onmouseover=function(){statDisplay(15,110,0,"stats");};
	$id("stats").onmouseout=hideOverlay;

	var rect=$id("user").getBoundingClientRect();
	$id("user").onmouseover=function(){statDisplay(rect.left + rect.width/2 - 60,rect.bottom + 10,0,"user");};
	$id("user").onmouseout=hideOverlay;
	$id("user").onclick = logout;
	
	var pins = document.getElementsByClassName("map-pin");
	for(var i=0;i<pins.length;i++) {
		pins[i].onmouseover = mapPinOverlay;
		pins[i].onmouseout=hideOverlay;
	}
}

function addMapPaths() {
	var svg = $id("path-container");
	var pins = document.getElementsByClassName("map-pin");
	if(pins.length>1) {
		var path = "<path d=\"M from Awidth,height angle 0,sweep to\"></path>";
		for(var i=0;i<pins.length-1;i++) {
			var x1 = parseInt(pins[i].style.left);
			var y1 = parseInt(pins[i].style.top);
			var x2 = parseInt(pins[i+1].style.left);
			var y2 = parseInt(pins[i+1].style.top);
			var p = path.replace("from",x1+","+y1);
			p = p.replace("to",x2+","+y2);
			p = p.replace("height","600");
			d=Math.sqrt(Math.pow(x2-x1,2) + Math.pow(y2-y1,2));
			p = p.replace("width",d);
			p = p.replace("angle",Math.acos((x2-x1)/d));
			
			if(x1<x2)
				p = p.replace("sweep",1);
			else
				p = p.replace("sweep",0);

			if(i==pins.length-2 && pins[i+1].className=="map-pin current")
				p=p.replace("<path ","<path class=\"animate\"");
			
			svg.innerHTML+=p;
		}

	}
}

function statDisplay(x,y,z,id) {
	switch(id) {
		case "stats":
			$id("overlay-data").innerHTML = "Current: "+info.current + "<br/>" + "Ahead: "+info.ahead;
			break;
		case "user":
			$id("overlay-data").innerHTML = "Logout";
			break;
		default:
			if(!id.getAttribute("onclick"))
				$id("overlay-data").innerHTML = "Level "+ id.getAttribute("level");
			else if(id.getAttribute("question") == 0)
				$id("overlay-data").innerHTML = "Level "+ id.getAttribute("level") + "<br />" + "Start";
			else
				$id("overlay-data").innerHTML = "Level "+ id.getAttribute("level") + "<br />" + "Question "+ id.getAttribute("question");

	}
	$id("overlay").style.left = x + "px";
	
	var arrow=$id("overlay").getElementsByTagName("tr");
	if(z==0){
		$id("overlay").style.top = y + "px";
		$id("overlay").className = "visible";
	}
	else {
		$id("overlay").style.top = (y-120) + "px";
		$id("overlay").className = "visible above";
	}
}



//User Session JS
function initLogin() {
	//setTimeout(function(){ 	
		if(!info.loggedIn) 
			$id("cover-content").setAttribute("class","visible");
		else {
			$id("page-content").setAttribute("class","visible");
			$id("cover-content").removeAttribute("class");
		}


		$id("loading-div").setAttribute("class","stop");
	//},1000);

	if(info.loggedIn) {
		addMapPaths();
		initMouseEvents();

		setTimeout(updateInfoRequest,3000);
	}
}

function removeSessionItems()
{
	var pins=$id("image-content").getElementsByTagName("div");
	var n = pins.length;
	for(var i=0;i<n;i++) {
		pins[0].parentNode.removeChild(pins[0]);
	}

	var paths = $id("path-container").getElementsByTagName("path");
	n=paths.length;
	for(var i=0;i<n;i++) {
		paths[0].parentNode.removeChild(paths[0]);
	}
}

function logout() {
	info.level = -1;
	info.question = -1;
	info.user = "";
	info.loggedIn = false;
	info.ahead = -1;
	info.current= -1;

	closeLevel();

	setTimeout(removeSessionItems,1500);

	var ajax = new ajaxRequest;
	ajax.post("fetch/logout.php","");

	$id("loading-div").removeAttribute("class");
	$id("cover-content").setAttribute("class","visible");
	setTimeout(function(){$id("page-content").removeAttribute("class");},1500)


}

function updateInfoCallback(xmlhttp) {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		var info2 = {
			current: -1,
			ahead: -1,
			loggedIn: false,
			user: -1,
			level: -1,
			question: -1
		}
		
		var response = xmlhttp.responseText.split("|");


		info2.level = parseInt(response[0]);
		info2.question = parseInt(response[1]);
		info2.current = parseInt(response[2]);
		info2.ahead = parseInt(response[3]);
		info2.user = response[4];
		info2.loggedIn= response[5]=="true"?true:false;

		if(!info2.loggedIn || info2.user !=info.user) {
			logout();
			return;
		} else {
			info.current = info2.current;
			info.ahead = info2.ahead;
			if(info.level != info2.level){
				if(LEVEL!="")
					closeLevel();
				info.level = info2.level;
				console.log("level up");
				info.question = info2.question;
				removeSessionItems();
				login(true);
			}
			else if(info.question != info2.question && info.question!=0) {
				//if(LEVEL!="")
				//	closeLevel();
				info.question = info2.question;
				console.log("question up");
				if(document.getElementsByClassName("map-pin current").length>0)
				document.getElementsByClassName("map-pin current")[0].setAttribute("question",info.question);
			}
			else if(info.question==0 && info2.question!=0) {
				info.question = info2.question;
			}
		}
		setTimeout(updateInfoRequest,3000);
	}
	delete xmlhttp.onreadystatechange;
}

var updateAjax = new ajaxRequest;

function updateInfoRequest() {
	updateAjax.post("fetch/update.php","update",updateInfoCallback);
}

function login(re) {
	var data="user=kj";
	if(re)
		data="relogin=true";
	var ajax = new ajaxRequest;
	toggleLoading();
	ajax.post("fetch/login.php",data,function(xmlhttp) {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			toggleLoading();
			var response=xmlhttp.responseText.split("|");
			if(response.length!=7)
				return;
			$id("image-content").innerHTML = response[6]  + $id("image-content").innerHTML;
			info.level = parseInt(response[0]);
			info.question = parseInt(response[1]);
			info.current = parseInt(response[2]);
			info.ahead = parseInt(response[3]);
			info.user = response[4];
			info.loggedIn= response[5]=="true"?true:false;

			initLogin();
		}
	})
}




//Game JS

function updateInfo(responseText) {

	var info2 = {
		current: -1,
		ahead: -1,
		loggedIn: false,
		user: -1,
		level: -1,
		question: -1
	}
	
	var response = responseText.split("|");


	info2.level = parseInt(response[1]);
	info2.question = parseInt(response[2]);
	info2.current = parseInt(response[3]);
	info2.ahead = parseInt(response[4]);
	info2.user = response[5];
	info2.loggedIn= response[6]=="true"?true:false;

	if(!info2.loggedIn || info2.user !=info.user) {
		logout();
		return;
	} else {
		info.current = info2.current;
		info.ahead = info2.ahead;
		if(info.level != info2.level){
			if(LEVEL!="")
				closeLevel();
			info.level = info2.level;
			console.log("level up");
			info.question = info2.question;
			removeSessionItems();
			login(true);
		}
		else if(info.question != info2.question && info.question!=0) {
			if(LEVEL!="")
				closeLevel();
			info.question = info2.question;
			console.log("question up");
			if(document.getElementsByClassName("map-pin current").length>0)
			document.getElementsByClassName("map-pin current")[0].setAttribute("question",info.question);
		}
		else if(info.question==0 && info2.question!=0) {
			info.question = info2.question;
		}
	}
	
}

function animateShowJigsaw() {
	$id("jigsaw").getElementsByTagName('table')[0].style.opacity = "1";
	$id("jigsaw").getElementsByTagName('table')[0].style.transform = "translateY(0)";
	$id("jigsaw").getElementsByClassName('story')[0].className = "story hidden";
}

function showJigsaw() {
	$id("jigsaw").getElementsByTagName('table')[0].style.display = "table";
	setTimeout(animateShowJigsaw,10);
	
}

function startLevel() {
	loadLevel(true);
}

function loadLevel(start) {
	if(start) {

		var ajax = new ajaxRequest;
		toggleLoading();
		ajax.post("fetch/","start=true",
			function(xmlhttp) {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					toggleLoading();
					var response = xmlhttp.responseText.split("|");
					$id('level-content').innerHTML = response[1];
					$id('level-content').innerHTML+='<div onclick="closeLevel()" class="close"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve"><polygon id="x-mark-icon" points="438.393,374.595 319.757,255.977 438.378,137.348 374.595,73.607 255.995,192.225 137.375,73.622 73.607,137.352 192.246,255.983 73.622,374.625 137.352,438.393 256.002,319.734 374.652,438.378 "/></svg></div>';
					$id('level-content').className="visible";
					$id('level-content').style.display="block";
					LEVEL = response[0];
					switch(response[0]) {
						case 'jigsaw':
							jigsaw.init();
							break;
						case 'question':
							break;
						default:
							LEVEL = "";
					}
					$id('level-content').focus();

				}
				delete xmlhttp.onreadystatechange;
			});

		return;
	}

	var ajax = new ajaxRequest;
	toggleLoading();
	ajax.post("fetch/","",
		function(xmlhttp) {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				toggleLoading();
				var response = xmlhttp.responseText.split("|");
				$id('level-content').innerHTML = response[1];
				$id('level-content').innerHTML+='<div onclick="closeLevel()" class="close"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve"><polygon id="x-mark-icon" points="438.393,374.595 319.757,255.977 438.378,137.348 374.595,73.607 255.995,192.225 137.375,73.622 73.607,137.352 192.246,255.983 73.622,374.625 137.352,438.393 256.002,319.734 374.652,438.378 "/></svg></div>';
				$id('level-content').className="visible";
				$id('level-content').style.display="block";
				LEVEL = response[0];
				switch(response[0]) {
					case 'jigsaw':
						jigsaw.init();
						break;
					case 'question':
						break;
					default:
						LEVEL = "";
				}
				$id('level-content').focus();

			}
			delete xmlhttp.onreadystatechange;
		});
}

function closeLevel() {
	$id('level-content').className="hidden";
	setTimeout(function() {
		$id('level-content').style.display="none";
		$id('level-content').innerHTML = " ";
	},200);
}

function validateJigsaw() {
	var answer = "";
	var pieces = document.getElementsByClassName("piece");

	for(var i=0;i<pieces.length;i++) {
		answer+= pieces[i].pos<10?"0"+pieces[i].pos:pieces[i].pos;
	}

	return answer;
}


function submitCallback(xmlhttp) {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		console.log(xmlhttp.responseText);
		response = xmlhttp.responseText.split("|");
		
		if(response[0] == "valid")
			notify(101);
		else if(response[0] == "level up")
			notify(102)
		else if(response[0] == "break")
			notify(103);
		else if(response[0] == "victory")
			notify(104);
		else if(response[0] == "invalid")
			notify(105);
	

		updateInfo(xmlhttp.responseText);

		toggleLoading();
	}

	delete xmlhttp.onreadystatechange;
}

function submitSolution() {
	var ajax = new ajaxRequest;
	var answer;
	switch(LEVEL) {
		case 'jigsaw':
			answer = validateJigsaw();
			toggleLoading();
			ajax.post("submit/","type=jigsaw&answer=" + answer,submitCallback);
			break;
		case 'question':
			answer=$id("answer").value;
			var ajax = new ajaxRequest;
			if(answer==undefined || answer.trim() == "")
				notify(106);
			else {
				toggleLoading();
				ajax.post("submit/","type=question&answer=" + answer,submitCallback);
			}
		break;

	}
}