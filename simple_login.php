<?php

function check_login($username,$user_pwd)
{
    include 'connection.php';
    $hash_pwd=hash('sha512',$user_pwd);
     $query="SELECT * FROM user_login WHERE user_name=:user_name AND password=:user_pwd";
     $pdo_statment=$con->prepare($query);
     $pdo_statment->execute(array(":user_name"=>$username,":user_pwd"=>$hash_pwd));
     $result=$pdo_statment->fetchColumn();
     if($result=='')
     {
        $result=0;
     }
     else
     {
        session_start();
        $_SESSION["user_id"]=$result;
     }
     return $result;

}


if((isset($_GET["username"]))&&(isset($_GET["pwd"])))
{
    echo check_login($_GET["username"],$_GET["pwd"]);
} 
?>