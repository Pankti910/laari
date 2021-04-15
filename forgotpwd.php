<!DOCTYPE html>
<html lang="en-US">
   <head>
<?php
$err="";
$name="";
 if(isset($_POST["submit_otp"])&&isset($_POST["user_name"]))
 {

    session_start();
    $name=$_POST["user_name"];
    if($_SESSION["otp"]==$_POST["otpenter"])
    {
      header("Location:resetpwd.php");
    }
    else
    {
      $err="Enter Correct OTP";
    }
 }
?>
<base href="/laari/" />
           <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <meta http-equiv="X-UA-Compatible" content="ie-edge">
      
  
      <title>Forgot Password</title>
      <link rel="icon" type="img/png" href="img/logo.jpeg">
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/icon1.css">
      <link rel="stylesheet" href="css/onlycomponents.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="css/other.css">
      <link rel="stylesheet" href="css/other1.css">
      <link rel="stylesheet" type="text/css" href="css/popup.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">  
      <link rel="stylesheet" type="text/css" href="css/ask_question.css">


       <meta name="google-signin-scope" content="profile email">

     <meta name="google-signin-client_id" content="408911093430-s31oirgk7p6n4dn962nes2sncgd5jdo9.apps.googleusercontent.com">
   
    <script src="https://apis.google.com/js/platform.js" async defer></script>
   
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>  
      <script type="text/javascript" src="js/question_popup.js"></script>  
      <script type="text/javascript" src="js/login_popup.js"></script>
      <script type="text/javascript" src="js/question_popup.js"></script>
      <script type="text/javascript" src="js/forum_notificatio.js"></script>
      <script type="text/javascript" src="login_logout_btn.js"></script>
      <style type="text/css">
        
      </style>
   </head>
   <body class="size-1520">
      <!-- HEADER -->
  

      <header>
         <div class="line">
       <div class="popup box" id="verify_popup">
         <div class="popup-content">
           <center>
            <form method="POST" style="margin-bottom:40px;">
               <img src="img/close_icon.png" alt="close" class="close" id="close_otp">
         
             <h3>Verify Your Mobile Number</h3>
             <hr>
             <p id="verify_no"></p>
             <br>
             <p>Kindly Check And Enter The Number</p>
             <input type="text" name="otpenter" placeholder="Enter OTP">
             <br>
             <input type="submit" class="btnask" id="submit_otp" name="submit_otp" style="color:white;margin-bottom:10vh"  value="Done"><a href="check_user_name.php" id="resend" name="resend">Resend OTP</a>
             <p style="color:red;" name="invalid_otp"><?php echo $err;?></p>
             </form>
           </center>
         </div>
       </div>
       <div class="popup box" id="username_popup_error">
    <div class="popup-content">
       <form method="POST">
          <img src="img/close_icon.png" alt="close" class="close" id="close_error">
          <p id="username_error" style="color:maroon;font-weight:bold;font-size:3vw;"></p>
       </form>
   </div>
   </div>
               <div class="s-12 l-8">

                <center>
                  <img src="img/logo.png" style="height:30vh!important;padding-left:35vw;">
                </center>
               </div>
           <div class="box" style="background-image:url('img/b1.jpg')!important;">

               <div class="s-12 l-8 right">
                  <div class="margin">
                   
                  <button class="btn btn-primary" style="font-size:20px;">Login</button>

                   <b>   
                  <button class="btn btn-link" style="font-size:20px;">Register</button>
                  </b>
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

               <!-- ASIDE NAV -->
               <!-- CONTENT -->
               
               <section class="s-12 m-8 l-9 xl-10" >                  
                
                  <div class="margin">
                          <div class="innerdiv" style="margin-left:8vw;">

                              <div class="s-12 l-8">
                                    <div class="margin">
                 
                                   <h1 class="margin-bottom">Fogot Password</h1>
                                     <form  class="customform s-12 l-8" method="POST" style="width:600px;">
                                           <div class="s-7">User Name</div>
                                                <div class="s-7"><input type="text" class="roundborder" id="user_name" name="user_name" required /></div>

                                             <div class="s-7">Mail</div>
                                                <div class="s-7"><input type="text" class="roundborder" id="umail" name="umail"></div>

                                               
                                   <div class="s-7"><button type="submit" class="roundborder" id="submit" name="submit" style="color:white;">Submit</button></div>

                                   <p class="s-10" id="err"></p>
                                </form>
                  </div>
               </div>
                            </div>              
                 </div>
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
         var username=document.getElementById("user_name").value;
 
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
        });
         
      $("#submit").on("click",function(event){
    event.preventDefault();
  var username=document.getElementById("user_name").value;
  var umail=document.getElementById("umail").value;
  var reg=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
       
  if(username!='' && umail!='' && reg.test(umail))
  {
    $.ajax({
    url:'check_user_name.php',
    method:'GET',
    data:{"user_name":username,"umail":umail},
         success:function(response)
         {
         if(response=="check")
          {

              document.querySelector("#username_error").innerHTML="Invalid username/mail";
             document.querySelector("#username_popup_error").style.display = "flex";
          }
          else
          {
          
              document.querySelector("#username_error").innerHTML="Check Mail";
             document.querySelector("#username_popup_error").style.display = "flex";
          }
        }
  
   });
  }
  else
  {

              document.querySelector("#username_error").innerHTML="Enter All Fileds Properly";
             document.querySelector("#username_popup_error").style.display = "flex";
  }
});


      document.querySelector("#close_error").addEventListener("click",function(){

    document.querySelector("#username_popup_error").style.display="none";
         });






      </script>
   </body>
</html>