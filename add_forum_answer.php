<?php
#this page is for insert comment in forum

session_start();
include("connection.php");


$unique_no=rand();
$unique_no_que=$_REQUEST["unique_number"];
$data=$_REQUEST["data"];
$slug=$_REQUEST["slug"];






$query1="SELECT questionid,user_id FROM ask_question WHERE unique_number=:un";
$pdo_statment=$con->prepare($query1);
$pdo_statment->execute(array(':un' =>$unique_no_que));
$result=$pdo_statment->fetch();
$qid=$result["questionid"];
$uid=$result["user_id"];







$query='INSERT INTO give_answer (que_id,ans_unique_no,answer,user_id) VALUES (:qid,:ans_unique_no,:data,:user_id)';
$pdo_statment=$con->prepare($query);
$res=$pdo_statment->execute(array(':qid'=>$qid,':ans_unique_no'=>$unique_no,':data'=>$_REQUEST["data"],":user_id"=>$_SESSION["user_id"])); 
#redirect to the question-answer display


#nofication
$query="SELECT user_id FROM ask_question WHERE questionid=:questionid";
$pdo_statment=$con->prepare($query);
$pdo_statment->execute(array(':questionid'=>$qid));
$user_id=$pdo_statment->fetchColumn();


$query="SELECT answerid FROM give_answer WHERE  ans_unique_no=:ans_unique_no";
$pdo_statment=$con->prepare($query);
$pdo_statment->execute(array(":ans_unique_no"=>$unique_no));
$answerid=$pdo_statment->fetchColumn();


if($_SESSION["user_id"]!=$uid)
{
$action="unread";
$query="INSERT INTO notification_forum (userid,questionid,answerid,action) VALUES (:user_id,:questionid,:answerid,:action)";
$pdo_statment=$con->prepare($query);
$pdo_statment->execute(array(':user_id'=>$user_id,':questionid'=>$qid,':answerid'=>$answerid,':action'=>$action));
}
header("Location:question/".$_REQUEST["unique_number"]."/".$_REQUEST["slug"]);

?>