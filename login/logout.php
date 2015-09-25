<?php
//session_destroy();
if(isset($_SESSION['username']))
{
unset($_SESSION['username']);
}
echo "logged out";
?>