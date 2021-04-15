<?php
include("connection.php");
session_start();
$action="unread";
$query="SELECT * FROM notification_forum WHERE userid=:userid AND action=:action";
$pdo_statment=$con->prepare($query);
$pdo_statment->execute(array(":userid"=>$_SESSION["user_id"],":action"=>$action));
$total_notification=$pdo_statment->rowCount();
if(isset($total_notification)&& $total_notification!=0)
{
echo $total_notification;
}
?>