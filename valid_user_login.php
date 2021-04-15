<?php
include("connection.php");
$k=1;
$user_name=$user_pwd=$error_login="";
$result=0;
$flag=0;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if($_POST["user_name"]==""||$_POST["user_pwd"]=="")
	{
		if($_POST["user_name"]=="")
		{
		$error_login.="Enter User Name <br>";
		$k=0;
		$flag=1;
	    }
	    else
	    {
	    $user_name=$_POST["user_name"];	

	    }

	if($_POST["user_pwd"]=="")
	{
		$error_login.="Enter Password";
		$k=0;
		$flag=1;
	}
	else
	{
		$user_pwd=$_POST["user_pwd"];
	}

	}
	else
	{
$user_name=$_POST["user_name"];	
		$user_pwd=$_POST["user_pwd"];	
	}
	if($user_name!="" && $user_pwd!="")
	{
		#prepare statment used in which :variables are replace by  variables  
	 $hash_pwd=hash('sha512',$user_pwd);
     $query="SELECT * FROM user_login WHERE user_name=:user_name AND password=:user_pwd";
     $pdo_statment=$con->prepare($query);
     $pdo_statment->execute(array(":user_name"=>$user_name,":user_pwd"=>$hash_pwd));
     #fetchColumn() is used to get perticular column value
     $result=$pdo_statment->fetchColumn();
     if($result==0)
     {
     	$error_login="Check Your Login Information";
     	$k=0;
      }
	}
	if($k==1)
	{
	      #if no-error than set session into cookie
		session_start();
		$_SESSION["user_id"]=$result;
        $error_login=$result;
		header("Location:index.php");
		#redirect to question page
	}
	

}
?>