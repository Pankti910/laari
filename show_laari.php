<!DOCTYPE html>
<html lang="en-US">
   <head>
   <base href="/laari/" />
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <?php
      session_start();
      include("connection.php");
      include("favoritefunction.php");
      $laari_no=$_GET['no'];
      $query="SELECT * FROM laari_info WHERE laari_no=:laari_no";
      $pdo_stament=$con->prepare($query);
      $pdo_stament->execute(array(":laari_no"=>$laari_no));
       $result=$pdo_stament->fetch();
      
      if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 
    $link .= "://"; 
    $link .= $_SERVER['HTTP_HOST']; 
    $link .= $_SERVER['REQUEST_URI']; 
      ?>



        <title><?php echo ucwords($result["laari_name"]);?></title>
        <link rel="icon" type="img/png" href="img/logo.jpeg">
    
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
         <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/icon1.css">
      <link rel="stylesheet" href="css/onlycomponents.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="css/other.css">
      <link rel="stylesheet" type="text/css" href="css/forum.css">
      <link rel="stylesheet" href="css/other1.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">

      <link rel="stylesheet" href="owl-carousel/owl.theme.css">  
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
      <script type="text/javascript" src="js/forum_notification.js"></script>

      <script type="text/javascript" src="js/login_logout_btn.js"></script>

      <style type="text/css">
        span
        {
          font-size:20px;
        }
       
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
      </style>
      

   </head>
   <body class="size-1520">
      <!-- HEADER -->
      <header>
         <div class="line">
             <div class="s-12 l-8">

                <center>
                  <img src="img/logo.png" style="height:20vh!important;padding-left:35vw;">
                </center>
               </div>
           <div class="box" style="background-image:url('img/b1.jpg')!important;">

               <div class="s-12 l-8 right">
                  <div class="margin">
                     <form  class="customform s-12 l-8"  action="index.php">
                        <div class="s-9"><input type="text" placeholder="Search form" title="Search form" /></div>
                        <div class="s-3"><button type="submit">Search</button></div>
                     </form>
                     <?php 
                     if(isset($_SESSION["user_id"]))
                     {
                      ?>
                  <button class="btn btn-danger" style="margin-left:10vw;">Logout</button>
                  <?php
                  } 
                  else if(!isset($_SESSION['user_id']))
                  {
                    ?>
                      <button class="btn btn-primary" style="margin-left:10vw;">Login</button>
                        
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
            <div class="margin2x" style="margin-left:20vw;">
               <!-- ASIDE NAV -->
             
               <!-- CONTENT -->
               <section class="s-12 m-8 l-9 xl-10">                  
                  <!-- CAROUSEL -->  
                  <!--Laari Name-->
                 <h2><?php echo ucwords($result["laari_name"]);?>
                 <?php 
                 if(isset($_SESSION["user_id"]))
                 {
                  if(fav_laari($_SESSION["user_id"],$laari_no)==0)
                  {
                    ?>

                 <i class="fa fa-heart-o" onclick="favorite(this,'<?php echo $_SESSION["user_id"] ?>','<?php echo $laari_no;?>')"></i>   
                    <?php
                  }
                  else
                  {
                    ?>

                 <i class="fa fa-heart" onclick="favorite(this,'<?php echo $_SESSION["user_id"] ?>','<?php echo $laari_no;?>')"></i>   

                    <?php
                  }
                 }
                 ?>

                 
                 <?php
                 $query="SELECT rating_id FROM laari_rating WHERE laari_no=:laari_no";
                $pdo_stament=$con->prepare($query);
                $pdo_stament->execute(array(":laari_no"=>$laari_no));
                $total_ppl=$pdo_stament->rowCount();
                if($total_ppl!=0)
                {
               $query="SELECT SUM(rating) AS total FROM laari_rating WHERE laari_no=:laari_no";
                $pdo_stament=$con->prepare($query);
                $pdo_stament->execute(array(":laari_no"=>$laari_no));
                $rating_sum=$pdo_stament->fetchColumn();
                $avrage=$rating_sum/$total_ppl;
                echo "|".$avrage;
             

                }
                else
                {
                   echo "</h2>"."Not Rated Yet!";
                   $check=0;
                   $rating=-1;
                  // $rating=-1;
                }

                   if(isset($_SESSION["user_id"]))
                {
                
                $query="SELECT rating FROM  laari_rating WHERE laari_no=:laari_no AND user_id=:user_id";
                $pdo_stament=$con->prepare($query);
                $pdo_stament->execute(array(":laari_no"=>$laari_no,":user_id"=>$_SESSION["user_id"]));
               // echo $pdo_stament->fetchColumn();
                if($pdo_stament->rowCount()>0)
                {
                $check=1;
                $rating=$pdo_stament->fetchColumn()-1;
              
                }
                else
                {
                  $check=1;
                  $rating=-1;
                }
              }
              else
              {
                $rating=-2;
                $check=0;
              }

                 ?>


                 <h2>
                  <div class="line hide-s">
                    <div id="header-carousel" class="owl-carousel owl-theme">
                      <?php $image_path="laari_wala/laari_pic/".$result[9]; ?>
                       <div class="item"><img src="<?php echo $image_path;?>" alt="" height=200></div>
                    </div>
                  </div>

                  <span style="color:green;">Opening Time:</span><span><?php echo $result["s_time"];?></span>
                  <span style="color:red;">Closing Time:</span><span ><?php echo $result["e_time"];?></span>
                  <?php
                  if(isset($_SESSION["user_id"]))
                  { 
                  ?>
                  <div>
  <i class="fa fa-star fa-x" data-index="0" ></i>
  <i class="fa fa-star fa-x" data-index="1"></i>
  <i class="fa fa-star fa-x" data-index="2"></i>
  <i class="fa fa-star fa-x" data-index="3"></i>
  <i class="fa fa-star fa-x" data-index="4"></i>
  
</div>
<?php
} 
?>

                    

                  <div>
                  <?php
                  $stmt = $con->prepare("SELECT place,street,area,pincode from laari_info");
                  $stmt->execute();
                  $address=$stmt->fetch();
                  $str=implode(",",$address);
                  $a='https://maps.google.com/?q='.$str;
                  ?>
                    <a href='<?php echo $a;?>' class="fa fa-map"></a>


                    <a class="fa fa-whatsapp" href="https://api.whatsapp.com/send?text=<?php echo $link;?>" data-action="share/whatsapp/share"></a>
                    
                  </div>                  
                  <!-- Breadcrumb -->
                  <nav class="breadcrumb-nav">
                    <?php
                    $item_array=unserialize($result["items"]); 
                    $price_array=unserialize($result["price"]);
                    ?>
                  </nav>
                  <h3 class="margin-bottom">Menu</h3>
                    <aside class="s-12 m-4 l-3 xl-2 left">
                        <ul>
                          <?php
                          foreach ($item_array as $key=>$index) {
                      echo  "<li>". ucwords($index)."-".$price_array[$key]."</li>";
                      }
                      ?>
                  </ul>
                
                     </aside>


</h2>


               </section>

            </div>
         </div>
      </div>
      <?php
      if($result["status"]==0)
      {
        ?>
        <div id="snackbar">Closed Now</div>
        <?php
      }
      else
      {
        ?>
            <div id="snackbar">Open Now</div>
    
        <?php
      }
      ?>
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




     
  $(document).ready(function(){
      var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

  var check_user="<?php echo $check;?>";
    if(check_user==1)
    {
    var rating_val="<?php echo $rating;?>";
  
    
    resetStar();
    if(rating_val!=-1)
    {
      setStar(rating_val);
    }

   $(".fa-star").on("click",function(){
   rating_val=parseInt($(this).data('index'));
   saveToDB(rating_val);
   });
  $(".fa-star").mouseover(function(){
        resetStar();
        var currentIndex=parseInt($(this).data('index'));
     
        setStar(currentIndex);
       });
       
       $('.fa-star').mouseleave(function(){
         if(rating_val!=-1)
         {
            setStar(rating_val);
          }
       });  
    }
    
  });

  function setStar(max)
  {

          for(var i=0;i<=max;i++)
          {
               
          $('.fa-star:eq('+i+')').css("color",'yellow');
          }
  }
  function resetStar()
  {
    $(".fa-star").css("color",'gray');
  }

  function saveToDB(rating_val)
  {
    var laari_no='<?php echo $laari_no; ?>';
     $.ajax({
      url:'rating.php',
      method:'GET',
      dataType:'json',
      data:{"save":'1',"laari_no":laari_no,"rateIndex":rating_val},
        success:function(response)
        {
         uID=response.uid;
          localStorage.setItem('uID',uID);
        }

    });
  }

  function favorite(val,userid,laarino)
  {
    if(val.className=="fa fa-heart")
    {
      var flag=1;
       $.ajax({
        url:'favorite.php',
        method:'GET',
        data:{"flag":flag,"userid":userid,"laarino":laarino},
        success:function(response)
        {
     
                val.className="fa fa-heart-o";
                val.classList.remove("fa fa-heart");
        }
       });
    }
    else if(val.className=="fa fa-heart-o")
    {
      var flag=0;
       $.ajax({
        url:'favorite.php',
        method:'GET',
        data:{"flag":flag,"userid":userid,"laarino":laarino},
        success:function(response)
        {
             }
       });

                val.className="fa fa-heart";
                val.classList.remove("fa fa-heart-o");

    }
  }

      </script>     
   </body>
</html>