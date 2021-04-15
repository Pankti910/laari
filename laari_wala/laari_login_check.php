<?php
include("connection.php");
function is_admin($username,$password)
{
	if($username=="admin" && $password=="admin")
	{
		return true;
	}
	else
	{
		return false;
	}
}

if(isset($_GET["username"])&&isset($_GET["pwd"]))
{
    if(is_admin($_GET["username"],$_GET["pwd"]))
    {
    	echo "admin";
    }
    else
    {
        $pwd=hash("sha512",$_GET["pwd"]);
    	$query="SELECT * FROM laari_owner_login WHERE username=:username AND password=:password";
    	$pdo_statment=$con->prepare($query);
    	$pdo_statment->execute(array(":username"=>$_GET["username"],":password"=>$pwd));
    	$result=$pdo_statment->fetchColumn();
    	if($pdo_statment->rowCount()==0)
    	{
          echo "wrong";
    	}
    	else
    	{
    		session_start();
    		$_SESSION["laari_owner_id"]=$result;
    		echo "laari owner";
    	}
    }
}


?>