<?php
function count_notification_by_question($user_id,$question_id)
{
	include("connection.php");
	$action="unread";
	$query="SELECT * FROM notification_forum WHERE userid=:userid AND questionid=:question_id AND action=:action";
    $pdo_statment=$con->prepare($query);
    $pdo_statment->execute(array(":userid"=>$user_id,":question_id"=>$question_id,":action"=>$action));  
    $total_notification=$pdo_statment->rowCount();
    return $total_notification;


} 
?>