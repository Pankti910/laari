<?php
//RECOMMENDED

session_start();
include "connection.php";
$out_str=shell_exec('python C:\xampp\htdocs\laari\test_recomm_products.py');
//$out_str=shell_exec('python C:\xampp\htdocs\laari\recommend_products_after_tarined.py');
    //file_put_contents("name.txt",$name['first_name']);
    
$stmt = $con->prepare("select first_name from user_info where user_id=?");
$stmt->execute([$_SESSION['user_id']]);
$name=$stmt->fetch();
$file_name=$name['first_name'].$_SESSION['user_id'];

//echo $file_name;
if(file_exists("user_corpuses/".$file_name."_recommend.json")){

$rec_data=file_get_contents("user_corpuses/".$file_name."_recommend.json");
$rec=(array)json_decode($rec_data,true);    
$con=mysqli_connect("localhost","root","","project");
    if($con){
    $qry="select * from laari_info";
    $res1=mysqli_query($con,$qry);
    echo "<h1 class='margin-bottom'>Recommended Laaries</h1>";
    while($row=mysqli_fetch_array($res1)){
    
    $rec_loop=0;
    $tag_loop=0;
    $match_flag=0;
    $tags=unserialize($row[7]);
    while($rec_loop!=count($rec)){
        //echo $rec[$rec_loop];
        //echo "<br>";
        //echo "inside loop";
        //echo "<br>";
        //echo $row[1];
        //echo "<br>";
        $tag_loop=0;
        //echo $row[1]."-".$rec[$rec_loop];
        //echo "<br>";
       
        // $match_flag=match_string($rec[$rec_loop],strtolower($row[1]));
        
        //if(strpos($rec[$rec_loop],strtolower($row[1]))){
         // $match_flag=1;
        //}
        if(strpos(strtolower($row[1]),$rec[$rec_loop])!==false){
          $match_flag=1;
          }
         
        while($tag_loop!=count($tags)){
           // echo "<br>";
           // echo $tags[$tag_loop]."-".$rec[$rec_loop];
           // echo "<br>";
           // if(strtolower($tags[$tag_loop])==$rec[$rec_loop]){
           //     $match_flag=1;
           // }

            //$match_flag=match_string(strtolower($tags[$tag_loop]),$rec[$rec_loop]);
           // if(strpos($rec[$rec_loop],strtolower($tags[$tag_loop]))){
            //  $match_flag=1;
           // }

            if(strpos(strtolower($tags[$tag_loop]),$rec[$rec_loop])!==false){
              $match_flag=1;
              }

            $tag_loop=$tag_loop+1;
            }
        $rec_loop=$rec_loop+1;
    }
        if($match_flag==1){
           // echo "item  matched";
            $qry="select * from laari_info where laari_no=".$row[0];
            $res=mysqli_query($con,$qry);
            while($row=mysqli_fetch_array($res)){
            echo "<div class='s-12 m-12 l-4'>";
            
           $image_path="laari_wala/laari_pic/".$row[9];
   //echo "<a href='laari/".$row[0]." target='_blank'>"."<img  src='$image_path' height=200 width=500>"."</a>";
    
          echo "<a href='laari/".$row[0]."'>"."<img src='$image_path' height=200 width=200>"."</a>";
          echo "<h3>".ucwords($row[1])."</h3>";
          $arr=unserialize($row[7]);
          $str=ucwords($row[4]);
          if($row[5]!="choose option")
          {
            $str=$str.",".ucwords($row[5]);
          }
          if($row[6]!="choose option")
          {
            $str=$str.",".ucwords($row[6]);
          }
         echo "<h5>$str</h5>";
          echo "</div>";
        }
      }
    }
}
else{
    //Connection failed
    }

  }

?>