<?php

function match_string($super_string,$sub_string){

    $i=0; #iterating super
    $matched=0;
    while($i!=strlen($super_string)){
    $k=0;
    $l=$i;
    $cnt=0;
    
    if($i + strlen($sub_string) > strlen($super_string)){
    
    }
    else{
    
    while($k!=strlen($sub_string)){
    
    if($sub_string[$k] == $super_string[$l]){
    $cnt=$cnt+1;
    }
    $k=$k+1;
    $l=$l+1;
    }
    if($cnt==3){
    $matched=1;
    }
    // else for counting under limit
    }
    $i=$i+1;
    }
    
    if($matched == 1){
    return 0;
    }
    else{
    return 1;
    }
    


}

    $str_searched_token="veg";
    $searched_token=explode(" ",$str_searched_token);

    $con=mysqli_connect("localhost","root","","project");
    if($con){
    $qry="select * from items";
    $res=mysqli_query($con,$qry);
    while($row=mysqli_fetch_array($res)){
    $rec_loop=0;
    $tag_loop=0;
    $match_flag=0;
    $tags=unserialize($row[11]);
    //echo "<h1 class='margin-bottom'>Recommended Products</h1>";
    
    while($rec_loop!=count($searched_token)){
        if($searched_token[$rec_loop]==strtolower($row[3])){
            $match_flag=1;
        }
        else if(match_string(strtolower($row[3]),$searched_token[$rec_loop])==0){
            $match_flag=1;
        }
        while($tag_loop!=count($tags)){
            if(strtolower($tags[$tag_loop])==$searched_token[$rec_loop]){
                $match_flag=1;    
            }
            else if(match_string(strtolower($tags[$tag_loop]),$searched_token[$rec_loop])==0){
                $match_flag=1;
            }
            $tag_loop=$tag_loop+1;
            }
        
            ///////////////////
        if($searched_token[$rec_loop] == strtolower($row[7])){
            $match_flag=1;
        }
        else if(match_string(strtolower($row[7]),$searched_token[$rec_loop])==0){
            $match_flag=1;
        }
            //////////////////////
        if($searched_token[$rec_loop] == strtolower($row[8])){
            $match_flag=1;
        }
        else if(match_string(strtolower($row[8]),$searched_token[$rec_loop])==0){
            $match_flag=1;
        }
            /////////////////////
        if($searched_token[$rec_loop] == strtolower($row[9])){
            $match_flag=1;
        }
        else if(match_string(strtolower($row[9]),$searched_token[$rec_loop])==0){
            $match_flag=1;
        }


        $rec_loop=$rec_loop+1;
        }
        ///////////////////////////////////

        if($match_flag==1){
            echo "<div class='s-12 m-12 l-4 xl-3 xxl-3'>";
            echo "<a href='/'><img class='full-img' src='img/gallery-1.svg'></a>";
            $arr=unserialize($row[11]);
            $str=implode(',',$arr);
            echo "<h5>$str</h5>";
            echo "<a href='/'><h4 class='margin-bottom'><strong>$row[3]</strong></h4></a>";
            echo "<form class='customform s-12 margin-bottom2x' action=''>";
            echo   "<div><button class='button rounded-btn submit-btn s-12' type='submit'>Add to Cart</button></div>";
            echo "</form>";
            echo "</div>";
        }
      
    }
    }

   
?>
