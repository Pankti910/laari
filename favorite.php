<?php
include("connection.php");
$flag=$_GET["flag"];
$userid=$_GET["userid"];
$laarino=$_GET["laarino"];
if($flag==1)
{
$query="DELETE FROM favorite_laari WHERE user_id=:userid AND laari_id=:laarino";

  $stmt=$con->prepare($query);
  $stmt->execute(array(":userid"=>$userid,":laarino"=>$laarino));
  $result=$stmt->rowCount();
  if($result!=0)
  {
  	echo 1;
  }
  else
  {
  	echo 0;
  }
}
else
{
	$query="INSERT INTO favorite_laari (user_id,laari_id) VALUES(:userid,:laarino)";
	$stmt=$con->prepare($query);
	 $stmt->execute(array(":userid"=>$userid,":laarino"=>$laarino));
  $result=$stmt->rowCount();
  if($result!=0)
  {
  	echo 1;
  }
  else
  {
  	echo 0;
  }
} 
?>