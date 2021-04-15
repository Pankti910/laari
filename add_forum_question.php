<?php
include("connection.php");
session_start();
$question_unique_no=rand();
$query="INSERT INTO ask_question (question,unique_number,user_id) VALUES (:que,:unique_number,:uid)";
$pdo_stament=$con->prepare($query);
$pdo_stament->execute(array(":que"=>strtolower($_GET["question"]),":unique_number"=>$question_unique_no,":uid"=>$_SESSION["user_id"]));
$result=$pdo_stament->rowCount();
if($result==0)
{
	echo 0;
} 
else
{
//	header("Location:question_show.php");
	echo 1;
}
?>