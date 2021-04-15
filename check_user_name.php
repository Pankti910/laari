<?php

//date_default_timezone_set('Asia/Kolkata');
include "connection.php";

if(isset($_GET["umail"])&&isset($_GET["user_name"]))
{
  $query="SELECT * FROM user_login WHERE user_name=:username";
  $pdo_statment=$con->prepare($query);
  $pdo_statment->execute(array(":username"=>$_GET["user_name"]));
  $result=$pdo_statment->rowCount();
  $userid=$pdo_statment->fetchColumn();
  if($result>0)
  {
   #random string for reset pwd
   $characters ='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
   $token='';
   for($i=0;$i<6;$i++)
   {
    $index=rand(0,strlen($characters)-1);
    $token.=$characters[$index];
   }

   $hash_pwd=hash("sha512",$token);
    $mail=$_GET["umail"];
    
    $query="UPDATE user_login SET password=:password WHERE userid=:userid";
    $pdo_stament=$con->prepare($query);
    $pdo_stament->execute(array(":password"=>$hash_pwd,":userid"=>$userid));
  $msg="In order to reset password please click on link below
    Enter this password: $token
   http://localhost/laari/resetpwd.php
   From:Laari";
    mail($_GET["umail"],"Laari",$msg);
  echo $token."\n".$pdo_stament->rowCount();
  }
  else
  {
    echo "check";
  }

}

?>