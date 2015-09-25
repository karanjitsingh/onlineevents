<?php
include "./session.php";
	if(!checkSession()) {
		die( "<script>if(parent.logout) parent.logout(); else document.location.href=\"http://onlineevents.techtatva.in/\";</script>");
	}
?>