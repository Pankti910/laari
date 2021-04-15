<?php 
include("connection.php");
if(isset($_GET["pwd"])&&isset($_GET["user_name"])&&(isset($_GET["oldpwd"])))
{
	   session_start();

	  $hash_pwd=hash("sha512",$_GET["pwd"]);
          $user_name=$_GET["user_name"];
       

       $query="SELECT userid FROM user_login WHERE user_name=:user_name AND password=:password";
       $pdo_stament=$con->prepare($query);
       $pdo_stament->execute(array(":user_name"=>$user_name,":password"=>hash("sha512",$_GET["oldpwd"])));
       $uid=$pdo_stament->fetchColumn();
       if($uid=='')

       {
       echo "not found";
    }
else
{




       if(!preg_match("/^([\w!@#$%^&]){6,}$/",$_GET["pwd"]))
       {
              echo "password wrong";
       }
       else{
       $_SESSION["user_id"]=$uid;
       $query="UPDATE user_login SET password=:password WHERE userid=:user_id";
       $pdo_stament=$con->prepare($query);
       $pdo_stament->execute(array(":password"=>$hash_pwd,":user_id"=>$uid));
       $result=$pdo_stament->rowCount();
       if($result=='')
       {
              echo 0;
       }
       else
       {
              echo $result;
       }
       }
 
}

}
?>