<?php
function fav_laari($user_id,$laari_id)
{
include("connection.php");	
$query="SELECT * FROM favorite_laari WHERE user_id=:user_id AND laari_id=:laari_id";
$stmt=$con->prepare($query);
$stmt->execute(array(":user_id"=>$user_id,":laari_id"=>$laari_id));
$count=$stmt->rowCount();
return $count;

}
?>