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
                        file_put_contents("name.txt",$name['first_name']);
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

                       <div class="item"><img src="img/header-6.jpg" alt="" height="300"></div>
                       <div class="item"><img src="img/header-7.jpg" alt="" height="300"></div>
                       <div class="item"><img src="img/header-8.jpg" alt="" height="300"></div>
                    </div>
                  </div>                  
                  <!-- Breadcrumb -->
                  <nav class="breadcrumb-nav">
                    
                  </nav>
                 
                  <h2 class="margin-bottom">Laari</h2>
                </b>
                  <!-- Pr0ducts -->
                  <div class="margin2x" id="products">

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

   $image_path="laari_pic/laari_profile/".$row[9];
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
      $str[6]=$str.",".ucwords($row[6]);
    }
   echo "<h5>$str</h5>";
   echo "</div>";
        }
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
    <footer style="background-image:url('background.jpg');height:5px;">
         <div class="line">
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
       </script>     
   </body>
</html>