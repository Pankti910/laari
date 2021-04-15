<?php

#function for check ans is liked or not
function check_like_or_not($connection,$userid,$aid)
{
$query="SELECT * FROM answer_like WHERE user_id=:userid AND ans_id=:aid";
		$pdo_statment=$connection->prepare($query);
	$pdo_statment->execute(array('userid' =>$userid,':aid'=>$aid));
    $row_count=$pdo_statment->rowCount();
    
	if($row_count>0)
	{
		return true;
	}
	else
	{
		return false;
	}
} 
function count_like($connection,$aid)
{
     #function for count total like on particular answer
	$query="SELECT * FROM answer_like WHERE ans_id=:aid";
    $pdo_statment=$connection->prepare($query);
    $pdo_statment->execute(array(':aid' =>$aid));
    $total_row=$pdo_statment->rowCount();
    return $total_row;
}

function varified_likes($connection,$answerid)
{
	$query="SELECT ans_id from answer_like having count(*)=(select max(count(*)) from answer_like group by ans_id) group by ans_id";
	$pdo_statment=$connection->prepare();
	$pdo_statment->execute();
	$result=$pdo_statment->fetchColumn();
	if($answerid==$result)
	{
		return true;
	}
	else
	{
		return false;
	}
}


function max_like($answerid,$que_id)
{
include "connection.php";

	$query="SELECT a.ans_id  FROM answer_like a,give_answer an WHERE an.que_id=:que_id AND a.ans_id=an.answerid GROUP BY ans_id HAVING COUNT(*)=(SELECT MAX(most_like) FROM (SELECT COUNT(*) most_like FROM answer_like WHERE ans_id IN(SELECT answerid FROM give_answer WHERE que_id=:que_id) GROUP BY ans_id) tb)";
	$pdo_statment=$con->prepare($query);
   
	$pdo_statment->execute(array(":que_id"=>$que_id));
	$result=$pdo_statment->fetchColumn();
    if($result==$answerid)
    {
    	return true;
    }
    else
    {
    	return false;
    }
}

?>