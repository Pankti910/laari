<?php
session_start();

include "connection.php";
if(isset($_POST["submit"]))
{
$s_time=$_POST["start_time"];
$e_time=$_POST["end_time"];

$c1=strtolower($_POST["cat1"]);
$c2=strtolower($_POST["cat2"]);
$c3=strtolower($_POST["cat3"]);

$items=file_get_contents("itemfile.txt");
$price=file_get_contents("pricefile.txt");



$stmt = $con->prepare("UPDATE laari_info set s_time=? , e_time=? , cat_1=? , cat_2=? , cat3=? , items=? , price=? where laari_owner_id=?");
$stmt->execute([$s_time,$e_time,$c1,$c2,$c3,$items,$price,$_SESSION["laari_owner_id"]]);
unlink("itemfile.txt");
unlink("pricefile.txt");
header("location:profile.php");
}
?>