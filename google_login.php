<?php
function check_user_exist($email)
{
	#check user exist than set session for that user
	include "connection.php";
	$query="SELECT * FROM user_info WHERE google_mail=:email";
	$pdo_statment=$con->prepare($query);
	$pdo_statment->execute(array(':email'=>$email));
	$result=$pdo_statment->fetchColumn();
	
    if($result!=0)
    {
    	
   session_start();
    $_SESSION["user_id"]=$result;

    }
	return $result;
}

function add_new_user($email,$firstname,$lastname)
{
	    include "connection.php";
         $query="INSERT INTO user_info(first_name,last_name,google_mail) VALUES(:firstname,:lastname,:email)";
         $pdo_statment=$con->prepare($query);
         $pdo_statment->execute(array(':firstname'=>$firstname,':lastname'=>$lastname,':email'=>$email));
         $result=check_user_exist($email);
     
         return $result;

}
function check_login($email,$firstname,$lastname)
{
	$check_exist=check_user_exist($email);
	if($check_exist==0)
	{
       $result=add_new_user($email,$firstname,$lastname);
    }
    else
    {
    	$result=$check_exist;
    }
    return $result;

}


if((isset($_GET["fname"]))&&(isset($_GET["lname"]))&&(isset($_GET["email"])))
{
	echo check_login($_GET["email"],$_GET["fname"],$_GET["lname"]);
}

?>