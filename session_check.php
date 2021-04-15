<?php
session_start();
if(isset($_SESSION["user_id"]))
{
	echo 1;
} 
else
{
	echo 0;
}
?>