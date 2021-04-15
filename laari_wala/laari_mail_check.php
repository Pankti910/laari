<?php
include("connection.php");
$query="SELECT * FROM laari_owner WHERE email=:email";
$pdo_stament=$con->prepare($query);
$pdo_stament->execute(array(":email"=>$_POST["mail"]));
if($pdo_stament->rowCount()>0)
{
	echo 1;
} 
else
{
	echo 0;
}
?>