<?php
include("connection.php");
$query1="SELECT id FROM laari_owner_login WHERE username=:username AND id=(SELECT id FROM laari_owner WHERE pno=:pno)"; 
$pdo_stament1=$con->prepare($query1);
$pdo_stament1->execute(array(":username"=>$_GET["mail"],":pno"=>$_GET["pno"]));
if($pdo_stament1->rowCount()!=0)
{
  $query="UPDATE laari_owner_login SET password=:password WHERE id=:id";
  $pdo_stament=$con->prepare($query);
  $pdo_stament->execute(array(":password"=>hash("sha512",$_GET["pwd"]),":id"=>$pdo_stament1->fetchColumn()));
   if($pdo_stament->rowCount()!=0)
   {
   	echo "ok";
   }
   else
   {
   	echo "wrong";
   }
}
else
{
	echo "wrong1";
}
?>