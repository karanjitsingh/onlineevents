//if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {}

var ajaxwaiting = false;

function toggleAjax() {
	var svg = document.getElementsByClassName("loadingSVG");
	if(ajaxwaiting == true)
	{
		for(var i=0;i<svg.length;i++)
			svg[i].style.opacity = "0";
		ajaxwaiting=false;
	} else {
		for(var i=0;i<svg.length;i++) 
			svg[i].style.opacity = "1";
		
		ajaxwaiting=true;
	
	}
}

var ajaxRequest= function() {
	this.post= function(url,data,callback) {
		var xmlhttp = new XMLHttpRequest();
		if(callback) {
			
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					callback(xmlhttp.responseText);
					toggleAjax();
				}
				delete xmlhttp.onreadystatechange;
			};
		}
		xmlhttp.open("POST",url,true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send(data);
		if(callback)
			toggleAjax();
	};
}
var ajax = new ajaxRequest;


function formError(err) {
	//alert(err);
	var errText = document.getElementById("register").getElementsByClassName("err")[0];
	errText.style.color = "#cc0000";
	errText.innerHTML = err;

}

function formSuccess(text) {
	var errText = document.getElementById("register").getElementsByClassName("err")[0];
	errText.style.color = "#ddd";
	errText.innerHTML = text;
}

function clearFormErrors() {
	document.getElementById("register").getElementsByClassName("err")[0].innerHTML=" ";
	document.getElementById("signin").getElementsByClassName("err")[0].innerHTML=" ";
}

function resgiterCallback(text) {
//console.log(text);
//return;
	var result = JSON.parse(text);
	result.status = parseInt(result.status);
	switch(result.status) {
		case 101: 
			formError("Incomplete fields.")
			break;
		case 102: 
			formError("Username not available.")
			break;
		case 103:
			formError("Invalid input.");
			break;
		case 104:
			formError("Not registered.");
			break;
		case 105:
			formSuccess("Registered.");
			break;
		case 106:
			formError("Already registered.")
			break;
	}
	
}

function register() {
	if(ajaxwaiting)
		return;
	clearFormErrors();
	var inputs = document.getElementById("register").getElementsByTagName("input");
	var fields = [];
	for(var i=0;i<inputs.length;i++){
		fields[i]= inputs[i].value.trim();//= encodeURIComponent(inputs[i].value.trim());
		if(fields[i]=="")
		{
			formError("Incomplete fields.");
			return;
		}
	}

	if(fields[6] != fields[7])
	{
		formError("Passwords don't match.");
		return;
	}

	var post= "name=" + fields[0] + "&registration=" + fields[1] + "&phone=" + fields[2] + "&email=" + fields[3] + "&college=" + fields[4] + "&username=" + fields[5] + "&password=" + fields[6];
	/*post.name=fields[0];
	post.registration=fields[1];
	post.phone=fields[2];
	post.email=fields[3];
	post.college=fields[4];
	post.username=fields[5];
	post.password=fields[6];*/

	ajax.post("/register/",post,resgiterCallback);


}

function loginSuccess(user) {
	$id('userinfo').getElementsByTagName("span")[0].innerHTML = "Welcome! " + user + ", ";
	$id('userinfo').className = "loggedin";
}

function signinError(err) {
	var errText = document.getElementById("signin").getElementsByClassName("err")[0];
	errText.style.color = "#cc0000";
	errText.innerHTML = err;

}

function signinSuccess(err) {
	var errText = document.getElementById("signin").getElementsByClassName("err")[0];
	errText.style.color = "#ddd";
	errText.innerHTML = err;

}

function loginCallback(text) {
	var result = JSON.parse(text);
	result.status = parseInt(result.status);
	var inputs = document.getElementById("signin").getElementsByTagName("input");
	switch(result.status) {
		case 201: 
			signinError("Incomplete fields.")
			break;
		case 202: 
			signinError("Invalid fields.")
			break;
		case 203:
			signinError("User does not exist.");
			break;
		case 204:
			signinSuccess("");
			loginSuccess(inputs[0].value.trim());
			closePage();
			break;
		case 205:
			signinError("Incorrect Password.");
			break;
	}
}

function login() {
	if(ajaxwaiting)
		return;
	clearFormErrors();
	var inputs = document.getElementById("signin").getElementsByTagName("input");
	var fields = [];
	for(var i=0;i<inputs.length;i++){
		fields[i] = inputs[i].value.trim();//encodeURIComponent(inputs[i].value.trim());
		if(fields[i]=="")
		{
			signinError("Incomplete fields.");
			return;
		}
	}


	var post = "username=" + fields[0] + "&password=" + fields[1];
	//post.username=fields[0];
	//post.password=fields[1];
	ajax.post("/login/",post,loginCallback);

}

function logoutConfirm() {
	document.getElementById('userinfo').className = "loggedout";
	notification.show("Logged out successfully.");
}

function logout(err) {
	if(err) {
		switch(err) {
			case 301: //not logged in
				notification.show("You're not logged in.");
				break;
		}
		return;
	}
	ajax.post("/login/logout.php","",logoutConfirm);
	closeEvent();

}