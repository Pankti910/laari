
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Laari</title>
      <?php
      session_start();
      $dsn = "mysql:host=localhost;dbname=project;charset=utf8mb4";
   $options = [
      PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
   ];
   try {
      $pdo = new PDO($dsn, "root", "", $options);  
   } catch (Exception $e) {
      error_log($e->getMessage());
      exit('Something weird happened'); //something a user can understand
   }
      ?>
        <link rel="icon" type="img/png" href="img/logo.jpeg">
      
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">  
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>    

      <script type="text/javascript" src="js/forum_notification.js"></script>
      <script type="text/javascript" src="js/login_logout_btn.js"></script>
      
      </style>
   </head>
   <body class="size-1520">
      <!-- HEADER -->
      <header>
         <div class="line" >

               <div class="s-12 l-8">

                <center>
                  <img src="img/logo.png" style="height:20vh!important;padding-left:35vw;">
                </center>
               </div>
           <div class="box" style="background-image:url('img/b1.jpg')!important;">

              
              
           
               <div class="s-12 l-8 right">
                  <div class="margin">
                     <form  class="customform s-12 l-8" method="POST" action="index.php">
                        <div class="s-9"><input type="text" placeholder="Search form" id="search" name="search" required></div>
                        <div class="s-3"><button name="search_submit" type="submit" id="search_submit">Search</button></div>
                     </form>
                     <?php 
                     if(isset($_SESSION["user_id"]))
                     {
                        $stmt = $pdo->prepare("select first_name from user_info where user_id=?");
                        $stmt->execute([$_SESSION['user_id']]);
                        $name=$stmt->fetch();
                        $file_name=$name['first_name'].$_SESSION['user_id'];
                        if(filesize("login_log/online.json")==0){
                           $new_arr=array();
                           array_push($new_arr,$file_name);
                           $json_name=json_encode($new_arr);
                           file_put_contents("login_log/online.json",$json_name); 
                        }
                        else{
                           $json_file=file_get_contents("login_log/online.json");
                           $json_dec=(array)json_decode($json_file,true);
                           
                           if(!in_array($file_name,$json_dec)){
                              array_push($json_dec,$file_name);
                              $ser_name=json_encode($json_dec);   
                              file_put_contents("login_log/online.json",$ser_name);   
                           }                            
                        }

                      ?>
                  <button class="btn btn-danger" style="margin-left:10vw;">Logout</button>
                  <?php
                  } 
                  else if(!isset($_SESSION['user_id']))
                  {
                    ?>
                      <button id="btn-primary" class="btn btn-primary" style="margin-left:10vw;">Login</button>
                      
                  <button class="btn btn-link">Register</button> 
                    <?php
                  }
                  ?>
                  </div>
               </div>
            </div>
         </div>
         <!-- TOP NAV -->  
         <div class="line">
             
            <nav>
               <div class="top-nav">
                  <ul class="left">
                     <li><a href="index.php">Home</a></li>
                     
                     <li>
                        <a>About Us</a>
                        <ul>
                           <li><a href="http://www.dumainfoservice.com/index.php/site/index" target="_blank">Contact</a></li>
                     
                           <li><a href="https://www.google.com/maps/d/u/0/viewer?ie=UTF8&t=m&oe=UTF8&msa=0&mid=1-ISTGUitJsFVjXgP3xMeDMxr8hI&ll=21.175456000000015%2C72.81725400000005&z=17" target="_blank">Location</a></li>
                        </ul>
                     </li>
                     
                      <li>
                        <a href="forum.php">Forum
                        
                         <?php
                         //session_start();
                         if(isset($_SESSION["user_id"]))
                         {
                         ?>
                          <span class="badge badge-light"></span>
                          <?php
                          } 
                          ?>

                        </a>
                     </li>

                                     <li>
                      <div style="color:white;font-size:1rem;padding:1.25rem;">
                       
                     </div>
                     </li>
                  </ul>
               </div>
            </nav>
    


         </div>
      </header>
      <!-- ASIDE NAV AND CONTENT -->
      <div class="line">
         <div class="box margin-bottom">
            <div class="margin2x">
               <!-- ASIDE NAV -->
              
                 <aside class="s-12 m-4 l-3 xl-2 left" style="padding-bottom:20px;">
                  <h4 class="margin-bottom">Select Category</h4>
                  <div class="aside-nav minimize-on-small">
                     <p class="aside-nav-text">Select Category</p>
                     <ul>
                        <li><a href="my_favourite.php">My Favorite</a></li>
                        <li>
                           <a href="trending_page.php">Trending</a>
                           
                        </li>
                        
                  </ul>
                  </div>
               </aside>
               <!-- CONTENT -->
               <section class="s-12 m-8 l-9 xl-10">                  
                  <!-- CAROUSEL -->  
                  <div class="line hide-s">
                    <div id="header-carousel" class="owl-carousel owl-theme">
                       <div class="item"><img src="img/header-1.jpg" alt="" height="350"></div>
                       <div class="item"><img src="img/header-2.jpg" alt="" height="350"></div>
                       <div class="item"><img src="img/header-3.jpg" alt="" height="350"></div>
                    </div>
                  </div>                  
                  <!-- Breadcrumb -->
                  <nav class="breadcrumb-nav">
                    
                  </nav>
                  <!-- Pr0ducts -->
                  <div class="margin2x" id="products">
                  
                  <h2 class="margin-bottom" >Laari</h2>
                  <?php
///////TEST_USER_CORPUS TEST_USER_CORPUS TEST_USER_CORPUS TEST_USER_CORPUS TEST_USER_CORPUS
if(isset($_POST["search_submit"])){


$token=strtolower($_POST["search"]);
$srch=strtolower($_POST["search"]);

if(isset($_SESSION['user_id'])){
//CREATING THE USER SESSION CORPUS
//Checking the File and creating history array


$usr_file="user_corpuses/".$file_name.".json";
if(!file_exists($usr_file)){
    $searched_token[]=strtolower($_POST['search']);
    $usr=$searched_token;

    $words['Array']=$usr;
     $data=json_encode($words);
     file_put_contents("user_corpuses/".$file_name.".json",$data);
     $out_str=exec('python C:\xampp\htdocs\laari\test_train_recommendation.py');
    }
    else{
    //echo "Data exists";
    $search_string=strtolower($_POST['search']);
    $user_file=file_get_contents("user_corpuses/".$file_name.".json");
    $user_arr=(array)json_decode($user_file,true);
    $i=0;
    $f=0;
    //print_r($user_arr);
    $other=$user_arr['Array'];
    //finding duplicate word already present in user file
    while($i!=count($other)){
        if($search_string==$other[$i]){
            $f=1;
        break;
        }
        else{
            $f=0;
        }
        $i++;
    }
    if($f==1){}
    else{
        array_push($other,$search_string);

    $words['Array']=$other;
     $data=json_encode($words);
     file_put_contents("user_corpuses/".$file_name.".json",$data);
     $out_str=exec('python C:\xampp\htdocs\laari\test_train_recommendation.py');
    }
}
//CREATING THE USER SESSION CORPUS
}


//CREATING THE SEARCH CORPUS
$srch_file="search.json";
if(!file_exists($srch_file)){
    $searched_token[]=strtolower($_POST['search']);
    $src=$searched_token;

    $words['Array']=$src;
    $data=json_encode($words);
     file_put_contents("search.json",$data);
    }
    else{
    $srch_file_data=file_get_contents($srch_file);
    $src=json_decode($srch_file_data,true);

    $search_string=strtolower($_POST['search']);
    $i=0;
    $f=0;
    $other=$src['Array'];
    array_push($other,$search_string);
    $words['Array']=$other;
    $data=json_encode($words);
     file_put_contents("search.json",$data);
    //Writing inside user.json
}


}

/////// TEST_USER_CORPUS  TEST_USER_CORPUS TEST_USER_CORPUS TEST_USER_CORPUS TEST_USER_CORPUS

  //   TEST_SEARCH_FILTER  TEST_SEARCH_FILTER  TEST_SEARCH_FILTER TEST_SEARCH_FILTER TEST_SEARCH_FILTER
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

 if(isset($_POST["search_submit"])){
          $str_searched_token=strtolower($_POST["search"]);
          $searched_token=explode(" ",$str_searched_token);
        // echo $_POST["search"];
       $con=mysqli_connect("localhost","root","","project");
       if($con){
       $qry="select * from laari_info";
       $res=mysqli_query($con,$qry);
       while($row=mysqli_fetch_array($res)){
       $rec_loop=0;
       $tag_loop=0;
       $match_flag=0;
       $tags=unserialize($row[7]);
       //echo "<h1 class='margin-bottom'>Recommended Products</h1>";
    
       while($rec_loop!=count($searched_token)){
           if($searched_token[$rec_loop]==strtolower($row[1])){
               $match_flag=1;
           }
           else if(match_string(strtolower($row[1]),$searched_token[$rec_loop])==0){
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
           if($searched_token[$rec_loop] == strtolower($row[4])){
               $match_flag=1;
           }
           else if(match_string(strtolower($row[4]),$searched_token[$rec_loop])==0){
               $match_flag=1;
           }
            //////////////////////
           if($searched_token[$rec_loop] == strtolower($row[5])){
               $match_flag=1;
           }
           else if(match_string(strtolower($row[5]),$searched_token[$rec_loop])==0){
               $match_flag=1;
           }
            /////////////////////
           if($searched_token[$rec_loop] == strtolower($row[6])){
               $match_flag=1;
           }
           else if(match_string(strtolower($row[6]),$searched_token[$rec_loop])==0){
               $match_flag=1;
           }


           $rec_loop=$rec_loop+1;
           }
        ///////////////////////////////////

           if($match_flag==1){
               echo "<div class='s-8 m-8 l-6'>";

   $image_path="laari_wala/laari_pic/".$row[9];
   //echo "<a href='laari/".$row[0]." target='_blank'>"."<img  src='$image_path' height=200 width=500>"."</a>";
    
echo "<a href='laari/".$row[0]."'>"."<img src='$image_path' height=200 width=200>"."</a>";
   echo "<h3>".ucwords($row[1])."</h3>";
   $arr=unserialize($row[7]);
   //$str=implode(',',$arr);
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

   //   TEST_LOAD  TEST_LOAD  TEST_LOAD TEST_LOAD TEST_LOAD
   $con=mysqli_connect("localhost","root","","project");
   if($con){
   $qry="select * from laari_info";
   $res=mysqli_query($con,$qry);
   while($row=mysqli_fetch_array($res)){
   echo "<div class='s-8 m-8 l-6'>";

   $image_path="laari_wala/laari_pic/".$row[9];
   //echo "<a href='laari/".$row[0]." target='_blank'>"."<img  src='$image_path' height=200 width=500>"."</a>";
   
echo "<a href='laari/".$row[0]."'>"."<img src='$image_path' height=200 width=200>"."</a>";
   echo "<h3>".ucwords($row[1])."</h3>";
   $arr=unserialize($row[7]);
   //$str=implode(',',$arr);
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
   else{
   echo "Connection Failed";
   }


  }   
   ?>

                        
                  </div>
                  <!-- Pr0ducts -->
                  
                  <!-- Recommended Pr0ducts -->
                  <div class="margin2x" id="rec">
                  
                  </div>
                  <!-- Recommended Pr0ducts -->
               </section>
            </div>
         </div>
      </div>
      <!-- FOOTER -->
        <footer style="background-image:url('background.jpg');">
         <div class="line" style="height:1px!important;">
            <div class="s-12 l-6" >
               <b><p><h5 style="color:white">Copyright 2020,Duma</h5></p>
            </div>
            <div class="s-12 l-6">
              <b>
                <h5>
               <a class="right" href="https://dumainfoservice.com/" title="Responsee - lightweight responsive framework" style="color:white">Design and coding by dumainfoservice</a>
             </h5>
             </b>
            </div>
         </div>
      </footer>



      <script type="text/javascript" src="js/responsee.js"></script> 
      <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
      <script type="text/javascript">
        jQuery(document).ready(function($) {
          var owl = $('#header-carousel');
          owl.owlCarousel({
            nav: false,
            dots: true,
            items: 1,
            loop: true,
            navText: ["&#xf007","&#xf006"],
            autoplay: true,
            autoplayTimeout: 3000
          });
        })
      
///////////////////////////////////////////
        jQuery(document).ready(function($){
            //jQuery("#products").load("test_load.php");
            <?php
               if(isset($_SESSION["user_id"]))
               {
               ?>
            jQuery("#rec").load("recommendation.php");
            <?php
                 
               } 
               ?>

        });
///////////////////////////////////////////////////
      </script>     
   </body>
</html>