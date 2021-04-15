<?php
include("connection.php");
include("likefunction.php");
$action=$_REQUEST["action"];
$userid=$_REQUEST["userid"];
$answer_uid=$_REQUEST["answer_uid"];


$query1="SELECT answerid FROM give_answer WHERE ans_unique_no=:un";
$pdo_statment=$con->prepare($query1);
$pdo_statment->execute(array(':un' =>$answer_uid));
$aid=$pdo_statment->fetchColumn();

if($action=="like")
{
	$query="INSERT INTO answer_like (user_id,ans_id,action) VALUES(:userid,:ans_id,:action)";
	$pdo_statment=$con->prepare($query);
	$pdo_statment->execute(array(':userid'=>$userid,':ans_id'=>$answer_uid,':action'=>$action));
	echo count_like($con,$answer_uid);
}
else
{

	$query="DELETE FROM answer_like WHERE user_id=:userid AND ans_id=:ans_id";
	$pdo_statment=$con->prepare($query);
	$pdo_statment->execute(array(':userid'=>$userid,':ans_id'=>$answer_uid));
	echo count_like($con,$answer_uid);


}

?>