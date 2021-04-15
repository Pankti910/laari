<?php
include("connection.php");
session_start();

    if(isset($_GET["save"]))
    {
	$user_id=$_SESSION["user_id"];
	$rateIndex=$_GET['rateIndex']+1;
	$laari_no=$_GET["laari_no"];
	//$rateIndex++;

    $query="SELECT rating_id FROM laari_rating WHERE laari_no=:laari_no AND user_id=:user_id";
    $pdo_stament=$con->prepare($query);
    $pdo_stament->execute(array(":laari_no"=>$laari_no,":user_id"=>$user_id));
    $val=$pdo_stament->rowCount();


	if($val==0)
	{
		$query="INSERT INTO laari_rating (laari_no,user_id,rating) VALUES (:laari_no,:user_id,:rateIndex)";
       $pdo_stament=$con->prepare($query);
       $pdo_stament->execute(array(":laari_no"=>$laari_no,":user_id"=>$user_id,':rateIndex'=>$rateIndex));


/*	$query="SELECT id FROM rating ORDER BY id DESC LIMIT 1";
	$sql=mysqli_query($con,$query2);
	$uData=$sql->fetch_assoc();
	$uID=$uData["id"];*/

	}
	else 
	{
		$query="UPDATE laari_rating SET rating=:rateIndex WHERE laari_no=:laari_no AND user_id=:user_id";
		$pdo_stament=$con->prepare($query);
		$pdo_stament->execute(array(":rateIndex"=>$rateIndex,":laari_no"=>$laari_no,":user_id"=>$user_id));
	}
	exit(json_encode(array('uid'=>$user_id)));
}
?>