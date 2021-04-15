
<?php
include("connection.php");
include("likefunction.php");
include("url_to_link_function.php");

$unique_no_que=$_REQUEST["unique_number"];
#from unique_id find question_id
$query1="SELECT questionid FROM ask_question WHERE unique_number=:un";
$pdo_statment=$con->prepare($query1);
$pdo_statment->execute(array(':un' =>$unique_no_que));
$qid=$pdo_statment->fetchColumn();
session_start();
#find answers of that question
$query="SELECT * FROM give_answer WHERE que_id=:qid";
$pdo_statment=$con->prepare($query);
$pdo_statment->execute(array(':qid'=>$qid));
$result=$pdo_statment->fetchAll();
$res=$pdo_statment->rowCount();

	
	
if($res>0)
{   
	foreach ($result as $row)
	 {
    if(max_like($row["answerid"],$row["que_id"]))
    {
	echo "<div class='display_answer_all'>";
	echo "<div class='answer_display'>";
	echo "<h4>";
     echo url_to_link(ucfirst($row["answer"]));
     echo "</h4>";
	echo "</div>";
	echo "</div>";
	if(isset($_SESSION["user_id"]))
	{

            	$uid=$_SESSION["user_id"];

	        if(!check_like_or_not($con,$_SESSION["user_id"],$row["answerid"]))
	        {
	        	$aid=$row["answerid"];
	        	$id="id".$row["answerid"];
	        	echo '<div class="like">';
	        	echo"<i class='fa fa-thumbs-o-up' onclick='init(1,this,$uid,$aid,\"$id\")'></i>";  

                echo "</div>";

	        }
	        else
	        {
	        	$aid=$row["answerid"];
	        	$id="id".$row["answerid"];
	        	echo '<div class="like">';
	        	echo"<i class='fa fa-thumbs-up' onclick='init(1,this,$uid,$aid,\"$id\")'></i>"; 

                echo "</div>";
	        }
		

	}


   else
	{
	        	$id="id".$row["answerid"];
	        	echo '<div class="like">';
	        	echo "<i class='fa fa-thumbs-o-up' onclick='loginpop()'></i>";
                echo "</div>";

	        
	}
	
	

	echo '<div id='.$id.' class="countlike" style="font-weight: bold;">';
    echo count_like($con, $row["answerid"]); 
 		 echo "<div style='font-weight:bold;font-size:10px;'>Most people approve this answer</div>";

 
    echo '</div>';
	echo "<hr>";


}

}

	foreach ($result as $row) {
    if(!max_like($row["answerid"],$row["que_id"]))
    {
	echo "<div class='display_answer_all'>";
	echo "<div class='answer_display'>";
		echo "<h4>";
     echo url_to_link(ucfirst($row["answer"]));
     echo "</h4>";
	echo "</div>";
	echo "</div>";
	if(isset($_SESSION["user_id"]))
	{

            	$uid=$_SESSION["user_id"];

	        if(!check_like_or_not($con,$_SESSION["user_id"],$row["answerid"]))
	        {
	        	$aid=$row["answerid"];
	        	$id="id".$row["answerid"];
	        	echo '<div class="like">';
	        	echo"<i class='fa fa-thumbs-o-up' onclick='init(1,this,$uid,$aid,\"$id\")'></i>";  

                echo "</div>";

	        }
	        else
	        {
	        	$aid=$row["answerid"];
	        	$id="id".$row["answerid"];
	        	echo '<div class="like">';
	        	echo"<i class='fa fa-thumbs-up' onclick='init(1,this,$uid,$aid,\"$id\")'></i>"; 

                echo "</div>";
	        }
		

	}


   else
	{
	        	$id="id".$row["answerid"];
	        	echo '<div class="like">';
	        	echo "<i class='fa fa-thumbs-o-up' onclick='loginpop()'></i>";
                echo "</div>";

	        
	}
	
	

	echo '<div id='.$id.' class="countlike" style="font-weight: bold;">';
    echo count_like($con, $row["answerid"]); 
 
 
    echo '</div>';
	echo "<hr>";


}

}
}





else
{
	echo '<div style="font-weight:bold;color:red">';
	echo "There is no answer given";
	echo "</div>";
}
?>

