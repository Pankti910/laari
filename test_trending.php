<?php
    
    $file=file_get_contents("trending.json");
    $rec=(array)json_decode($file,true);


    $con=mysqli_connect("localhost","root","","project");
    if($con){
    $qry="select * from laari_info";
    $res=mysqli_query($con,$qry);
    while($row=mysqli_fetch_array($res)){
    $rec_loop=0;
    $tag_loop=0;
    $match_flag=0;
    $tags=unserialize($row[7]);
    
    while($rec_loop!=count($rec)){
        if($rec[$rec_loop]==strtolower($row[1])){
            $match_flag=1;
        }
        while($tag_loop!=count($tags)){
            if(strtolower($tags[$tag_loop])==$rec[$rec_loop]){
                $match_flag=1;
            }
            $tag_loop=$tag_loop+1;
            }
        $rec_loop=$rec_loop+1;
        }

        if($match_flag==1){
            echo "<div class='s-12 m-12 l-4 xl-3 xxl-3'>";
               echo "<a href='/'><img class='full-img' src='img/gallery-1.svg'></a>";
               $arr=unserialize($row[7]);
               $str=implode(',',$arr);
               echo "<h5>$str</h5>";
               echo "<h4 class='margin-bottom'><strong>$row[1]</strong></h4>";
               echo "<form class='customform s-12 margin-bottom2x' action=''>";
               echo   "<div><button class='button rounded-btn submit-btn s-12' type='submit'>Add to Cart</button></div>";
               echo "</form>";
               echo "</div>";
        }
    }
}
    
?>