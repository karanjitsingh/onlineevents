<?php
session_start();
include "../session.php";
	if(!checkSession()) {
		die( "<script>if(parent.logout) parent.logout(301); else document.location.href=\"http://onlineevents.techtatva.in/?nologin=true\";</script>");
	}
require_once("dbquestions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mechatron - Techtatva</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="style.css">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.js"></script>
<script>
						function startLoad() {
document.getElementById("loader").style.display = "block";
							document.getElementById("loader").style.opacity =1;
						}

		function stopLoad() {

			document.getElementById("loader").style.opacity =0;
			setTimeout(function() {document.getElementById("loader").style.display = "none";},200);
	}


	$(document).ready(function(){
	
		$("#skip").on("click",function() {

	var hash="<?php echo $_SESSION['token']; ?>";
		$.ajax({
        url: 'skip.php',
        type: 'post',
		beforeSend:function() {
			alert('Please wait while we skip the question....');
		},
		cache:'false',
		async:false,
		dataType:'json',
        success: function(data) {
        	if(data.status=="1")
{
		location.reload(true);
	}
	else
	{
		alert("You have used your 3 skips.");
	}
		},
		error:function(data) {
			alert("You've completed your game, bruv!");
		},
		});
});
});
function allowDrop(ev) {
    ev.preventDefault();
}
function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}
function drop(ev,id) {
	
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
	var element=document.getElementById(data);
	var option=element.textContent;

	element.style.margin="0px";
	element.textContent="";
      ev.target.appendChild(document.getElementById(data));

    $.ajax({
        url: 'getanswer.php',
        type: 'get',
		
		dataType:'json',
		data:'option='+option+'&id='+id,
		beforeSend: startLoad,
        success: function(data) {
        	stopLoad();
        	if(data.status=="1")
        	{
		ev.target.style.background=data.color;
	        element.style.display="none";
$.ajax({
        url: 'changestate.php',
        type: 'get',
		
		
		dataType:'json',
		
	
        success: function(data) {
        	if(data.status=="complete")
        	{
        		alert("You've completed the game successfully. Please wait for your score");
        	}
        
        if(data.status=="10")
        {
        
		$.ajax({
        url: 'action.php',
        type: 'post',
		
		dataType:'json',
        success: function(data) {
        	$(".score").text(data.score);
        	alert("You're being redirected to the next question. Click ok");
		location.reload(true);
		},
		});
        }
		if(data.status=="111")
		{
			$(".score").text(data.score);
		var id=data.id;
		var id1=data.id1;
		var id2=data.id2;
$('#'+id).css('background-color','blue');
		$('#'+id1).css('background-color','inherit');
		$('#'+id2).css('background-color','inherit');
		
		
		$.ajax({
        url: 'action.php',
        type: 'post',
		
		
		dataType:'json',
		
        success: function(data) {

        	if(data.redirect=="1")
        	{
        	        	alert("You're being redirected to the next question. Click ok");
		location.reload(true);
	}
		},
		});
		}
		if(data.status=="000")
		{
			$(".score").text(data.score);
		var id=data.id;
		var id1=data.id1;
		var id2=data.id2;
$('#'+id).css('background-color','#795548');
		$('#'+id1).css('background-color','inherit');
		$('#'+id2).css('background-color','inherit');
		$.ajax({
        url: 'action.php',
        type: 'post',
		
		
		dataType:'json',
		
        success: function(data) {
if(data.redirect=="1")
{
		location.reload(true);
}
		},
		});
		}
		if(data.status=="222")
		{
			$(".score").text(data.score);
		var id=data.id;
		var id1=data.id1;
		var id2=data.id2;
		var id3=data.id3;
		var id4=data.id4;
		$('#'+id).css('background-color','orange');
		$('#'+id1).css('background-color','inherit');
		$('#'+id2).css('background-color','inherit');
		$('#'+id3).css('background-color','inherit');
		$('#'+id4).css('background-color','inherit');
		
		}
		if(data.status=="333")
		{
			$(".score").text(data.score);
		var id=data.id;
		var id1=data.id1;
		var id2=data.id2;
		$('#'+id).css('background-color','purple');
		$('#'+id1).css('background-color','inherit');
		$('#'+id2).css('background-color','inherit');
		$('#'+id3).css('background-color','inherit');
		$('#'+id4).css('background-color','inherit');
		
		}

		},	

});

		
		
	}
	if(data.status=="reload")
	{
		location.reload(true);
	}
		},
		error: function(e) {
			alert("error");
			location.reload(true);
  }
});

$.ajax({
        url: 'action.php',
        type: 'post',
		
		
		dataType:'json',
		
        success: function(data) {
var x=1;
        	if(data.redirect=="1")
        	{
        	alert("You're being redirected to the next question. Click on OK and wait for the page to reload");
		location.reload(true);
	}
		},
		});
}
 
 
 
function logout() {
	$.post("../login/logout.php",{a:"b"},function(){
		if(parent.logout) 
		parent.logout();
		else
		document.location.href="http://onlineevents.techtatva.in/";
	
	});

}
</script>
</head>
<body>
	<div id="header">
		<img src="logo.png"><span><h2>TechTatva 15 | MECHATRON</h2>	</span>
		<ul class="header-right">
		<li>Hi <?php echo $_SESSION['username']; ?></li>
		<li><a target="_blank" id="rules_link" href="#">Rules</a></li>
		<li><a onclick="logout()">Logout</a></li>
		</ul>
	</div >
	<br>
	<div class='notice'>* Drag and drop the options onto the grid.</div>
	<div id="content">
		<div id="content_left">
			<h1><?php echo $question; ?></h1>
			<ul>
				<?php 
	for($i=0;$i<count($options);$i++)
	{
		$z=$i+1;
	echo("<div id='draggable$z'  draggable='true' ondragstart='drag(event)' data-toggle='tooltip' title='Drag answers into the box'><a class='options' id='o$z'>$options[$i]</a></div>");
    }
    ?>
			</ul>
			<div id="image">
			<img height="300" width="600" src="<?php echo $image; ?>" onerror="this.style.display='none';"></div>
		</div>

		<div id="content_right">
		<ul class="score-skip">
			<div class="other">
<li style="float:left;margin-right:40px;">Score:<?php echo $score; ?></li>
<li style="float:right;"><button id="skip">Skip</button></li>
</div></ul>
			 <?php include_once("table.php"); ?>

		</div>

	</div>
	<div id="bg_wrapper" align="center">
	<div id="img_wrapper"  align="center">
		<img src="bg/arrow1.jpg" id="img">
	</div>
	</div>

	<div class="vig"></div>
	<div id="rules" style="
    position: absolute;
    display: none;
    right: 10px;
    top: 94px;
    background: rgb(44,99,99);
    z-index: 5;
    width: 380px;
    padding: 30px;
">
  <ul style="
    list-style-type: none;
    margin: 0;
    padding: 0;
">
    <li>There are six options for every question. Three of them are right.</li><li>Drag and drop the options on the grid.</li><li>If correct, square turns green otherwise red.</li><li>Three Green tiles in a row or a coloumn change to Blue(where the first option was placed).</li><li>Three Red tiles in a row or coloumn change to Brown(where the first option was placed).</li><li>Three Blue tiles change to Orange(where the first option was placed).</li><li>Three brown tiles change to purple(where the first option was placed).</li><li>One Brown fetches 5 points.</li><li>One Purple fetches 10 points.</li><li>One Blue fetches 15 points.</li><li>One Orange fetches 20 points.</li><li>One red and one green in the same row or coloumn fetches a different question.</li><li>Users are allowed three question skips.</li><li>User with the highest points wins.</li>
  </ul>
</div>
<div id="loader" style="z-index:10;position:aboslute; width:100%; height:100%;display:none;opacity:0; background:rgba(0,0,0,0.6) transition:opacity 0.2s ease-out; top:0px;left:0px;">
<svg style="position:absolute;left:50%; top:50%; margin-left:-14px; margin-top:-14px;" width="28px" height="28px" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#fff" style="margin-top: 12px; margin-left: 6px; float: right;">
						    <g fill="none" fill-rule="evenodd">
						        <g transform="translate(1 1)" stroke-width="2">
						            <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
						            <path d="M36 18c0-9.94-8.06-18-18-18" transform="rotate(341.553 18 18)">
						                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>
						            </path>
						        </g>
						    </g>
						</svg></div>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        var height = Math.max($("#content_left").height(), $("#content_right").height());
        $("#content_left").height(height);
        $("#content_right").height(height);
    });

	var img=document.getElementById("img");
	$("#img").fadeTo("slow",1);
	var base="bg/";
	var imglist=["arrow1.jpg","gear.jpg","abstract.jpg"];

	//setTimeout(slideshow(), 2000);
	var counter=1;  //skip first element, it's already loaded
	var downloadingImage = new Image();
	downloadingImage.onload = function(){slideshow()};
	downloadingImage.src = base+imglist[1];

	function slideshow()
	{
		downloadingImage.onload = function(){;};   //reset onload handler, otherwise slideshow() everytime
		setInterval(function()
		{ 
			$("#bg_wrapper").fadeTo("",0);
			setTimeout( function(){img.src=downloadingImage.src},400); /*{img.src=base+imglist[counter++]+".jpg";}, 400);*/		
			$("#bg_wrapper").fadeTo("slow",1);
			if(counter==imglist.length)
				counter=0;
			downloadingImage.src = base+imglist[counter++];
		}, 5000);
	}
var rules = document.getElementById("rules_link");
rules.onmouseover = function() {
	document.getElementById("rules").style.display="block";
};

rules.onmouseout = function() {
	document.getElementById("rules").style.display="none";
};
</script>