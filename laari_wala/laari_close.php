<?php
include("connection.php");
$status=0;
$query="UPDATE laari_info SET status=:status WHERE laari_owner_id = :owner_id";
$pdo_stmt=$con->prepare($query);
$pdo_stmt->execute(array(":status"=>$status,":owner_id"=>$_GET["owner_id"]));
if($pdo_stmt->rowCount()!=0)
{
	echo 1;
} 
else
{
	echo 0;
}
?>