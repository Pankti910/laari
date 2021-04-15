<?php
include("connection.php");
$username_err=$userpwd_err=$userpno_err=$fname_err=$lname_err='';
$flag=0;

	$firstname='';
	$lastname='';
    $username='';
    $pno='';
    $pwd='';

if(isset($_POST["user_register"]))
{
	$firstname=$_POST["first_name"];
	$lastname=$_POST["last_name"];
    $username=$_POST["user_name"];
    $pno=$_POST["user_pno"];
    $pwd=$_POST["user_pwd"];



    if(empty($firstname))
    {
    	$fname_err="Enter First Name";
    	$flag=1;
    }
    else
    {
    	if(!preg_match('/^[A-Z]([a-z]*)$/',$firstname))
    	{
    		$fname_err="Enter Correct First Name/ First Character Must Be Capital";
    		$flag=1;
    	}
    }
    if(empty($lastname))
    {
    	$lname_err='Enter Last Name';
    	$flag=1;
    }

    else
    {
    	if(!preg_match('/^[A-Z]([a-z]*)$/',$lastname))
    	{
    		$lname_err="Enter Correct Last Name/ First Character Must Be Capital";
    		$flag=1;
    	}
    }
    if(empty($username))
    {
    	$username_err="Enter Username You Want";
    	$flag=1;
    }
    else
    {
    	$query="SELECT * FROM user_login WHERE user_name=:username";
    	$pdo_stamnet=$con->prepare($query);
    	$pdo_stamnet->execute(array(":username"=>$username));
    	$val=$pdo_stamnet->rowCount();
    	if($val>0)
    	{
    		$username_err="Can't Assign This Username Give Other Username";
    		$flag=1;
    	}
    }
    if(empty($pwd))
    {
    	$userpwd_err="Enter Password";
    	$flag=1;
    }
    else
    {
    	if(!preg_match("/^([A-Za-z0-9!@#$%^&]){6,}$/",$pwd))
    	{
    		$userpwd_err="Give proper password";
    		$flag=1;
    	}
    }
    if(empty($pno))
    {
    	$userpno_err="Enter Phone";
    	$flag=1;
    }

    else
    {
    	if(!preg_match('/[7-9]([0-9]{9})/',$pno))
    	{
    		$userpno_err="Enter Valid Mobile Number";
    		$flag=1;
    	}
    }

    if($flag==0)
    {


    	#insert into user_info
    	$query="INSERT INTO user_info (first_name,last_name,phone_no) VALUES (:first_name,:last_name,:phone_no)";
    	$pdo_stamnet=$con->prepare($query);
    	$pdo_stamnet->execute(array(":first_name"=>$firstname,":last_name"=>$lastname,":phone_no"=>$pno));

        #find user_id so that cant user to insert into user_login
    	$query="SELECT user_id FROM user_info WHERE first_name=:first_name AND last_name=:last_name AND phone_no=:phone_no";
    	$pdo_stamnet=$con->prepare($query);
    	$pdo_stamnet->execute(array(":first_name"=>$firstname,":last_name"=>$lastname,":phone_no"=>$pno));
    	$user_id=$pdo_stamnet->fetchColumn();

     #insert into user_login
      $query="INSERT INTO user_login VALUES(:userid,:user_name,:password)";
      $pdo_stamnet=$con->prepare($query);
      $pdo_stamnet->execute(array(":userid"=>$user_id,":user_name"=>$username,":password"=>hash('sha512',$pwd)));


   session_start();
   $_SESSION["user_id"]=$user_id;
  	header("Location:index.php");
    }

}
?>