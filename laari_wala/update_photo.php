<?php
session_start();
include ("connection.php");
$query="SELECT laari_img FROM laari_info WHERE laari_owner_id=:laari_owner_id";
$stmt=$con->prepare($query);
$stmt->execute(array(":laari_owner_id"=>$_SESSION["laari_owner_id"]));
$result=$stmt->fetchColumn();

unlink("laari_pic/".$result);
$array=explode(".",$result);
$pic=$array[0];

$file_extension_array=explode(".",$_FILES["img_name"]["name"]);
$updated_img_name=$pic.".".$file_extension_array[1]; 
$target_dir="laari_pic/";
$laari_img=$target_dir.$updated_img_name;
if(move_uploaded_file($_FILES["img_name"]["tmp_name"],$laari_img))
{
 $query="UPDATE laari_info SET laari_img=:laari_img WHERE laari_owner_id=:laari_owner_id";	
 $stmt = $con->prepare($query);
 $stmt->execute(array(":laari_img"=>$updated_img_name,":laari_owner_id"=>$_SESSION["laari_owner_id"]));
 
}
header("location:profile.php");

?>