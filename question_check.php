<?php
include("connection.php");
$que=$_GET["question"];
$que=str_replace('_',' ',$que);
//$query="SELECT unique_number FROM ask_question question LIKE ?";
/*$pdo_statment=$con->prepare($query);
$pdo_statment->execute(array(":que"=>$que));
$result=$pdo_statment->fetchColumn();
echo $result;*/


$query = "SELECT unique_number FROM ask_question WHERE question LIKE ?";
$params = array("%$que%");
$pdo_statment= $con->prepare($query);
$pdo_statment->execute($params);
$result=$pdo_statment->fetchColumn();
if(empty($result))
{
	echo 0;
}
else
{
echo $result;
}
?>