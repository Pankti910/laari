<?php
session_start();

include "connection.php";

$stmt = $con->prepare("select first_name from user_info where user_id=?");
$stmt->execute([$_SESSION['user_id']]);
$name=$stmt->fetch();
$file_name=$name['first_name'].$_SESSION['user_id'];

//unlink("login_log/online.ser");
$json_contents=file_get_contents("login_log/online.json");
$file_contents=(array)json_decode($json_contents,true);

$new_file=array();
$i=0;
while($i != count($file_contents)){
if($file_contents[$i] != $file_name){
array_push($new_file,$file_contents[$i]);
}
$i++;
}
//print_r($new_file);
$json_file=json_encode($new_file);
file_put_contents("login_log/online.json",$json_file);

unset($_SESSION["user_id"]);
session_destroy();
?>