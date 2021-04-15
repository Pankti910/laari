<!DOCTYPE html>
<html lang="en-US">
<?php
session_start(); 
?>
   <head>
           <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <meta http-equiv="X-UA-Compatible" content="ie-edge">
       <meta name="google-signin-scope" content="profile email">
        <meta name="google-signin-client_id" content="491675131424-kpnbnccmf0hvohg8nfpe0nfvjara7u9a.apps.googleusercontent.com">
   
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

    
      <title>Laari Forum</title>
     <link rel="icon" type="img/png" href="img/logo.jpeg">
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

    <script src="https://apis.google.com/js/platform.js" async defer></script>
   
 <meta name="google-signin-client_id" content="491675131424-kpnbnccmf0hvohg8nfpe0nfvjara7u9a.apps.googleusercontent.com">
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>  
      <script type="text/javascript" src="js/question_popup.js"></script>  
      <script type="text/javascript" src="js/login_popup.js"></script>
      <script type="text/javascript" src="js/question_popup.js"></script>

      <script type="text/javascript" src="js/forum_notification.js"></script>
      <script type="text/javascript" src="js/login_logout_btn.js"></script>
    <style type="text/css">

    </style>
   </head>
   <body class="size-1520">
      <!-- HEADER -->
  

      <header>
         <div class="line">



<div class="popup box" id="loginpopup">
    <div class="popup-content">
      <center>
<div class="g-signin2" onclick="login_google_set()" data-onsuccess="onSignIn"></div>
</center>
<br>
<br>
 <form method="POST">


  
    <img src="img/close_icon.png" alt="close" class="close" id="closelogin">
    <input type="text" class="loginchk" placeholder="Username" id="username" name="username">
    <input type="password" class="loginchk"  placeholder="Password" id="pwd">
     <center><div class="error" style="color:red;position:relative;padding-bottom:20px;"></div></center>
    <center><i class="button btnlogin" id="loginbtn" name="loginbtn" onclick="login_btn();">Login</i></center>

   <div style="position:relative;padding-top:20px;">
</div>
<center>
    <a href="forgotpwd.php" style="margin-bottom:30px;padding-bottom:30px;">Forgot password</a>
     </center>
   
   
  </form>


    </div>
</div>

<div class="popup box" id="questionpopup">
    <div class="popup-content">
      <form>   

<img src="img/close_icon.png" alt="close" class="close" id="closeque">

   
   <p id="display_question" style="font-weight:bold;font-size:30px;"></p>
   <br>
   <center>
   <i  id="ask_in_fourm" class="btnask" name="ask_in_fourm" style="text-transform:uppercase;margin-bottom:3vh;">ASK IN FOURM</i>
   
   </center>
    </form>

</div>
</div>
</div>
          

                           <div class="s-12 l-8">

                <center>
                  <img src="img/logo.png" style="height:20vh!important;padding-left:35vw;">
                </center>
               </div>
           <div class="box" style="background-image:url('img/b1.jpg')!important;">
   <div class="s-12 l-8 right">
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
                                                    <?php
                     //session_start();
                     if(isset($_SESSION["user_id"]))
                     { 
                      ?>


                  <div class="aside-nav minimize-on-small">
                        <p class="aside-nav-text">Forum</p>
                    
                    
                     <ul>
                        <li><a href="my_question.php">My Question<span class="badge badge-light"></span></a></li>
                     
                        
                  </ul>
                  </div>
                                 <?php  
                      }  
                      ?>

               </aside>

               <!-- ASIDE NAV -->
               <!-- CONTENT -->
               <section class="s-12 m-8 l-7 xl-10">                  
                  <!-- CAROUSEL -->  
                                   
                  <!-- Breadcrumb -->


               <div class="s-12 l-9 margin2x" style="margin-left:2vw;" >
                  <div class="margin">
                     <form  class="customform s-12 l-8">
                        <div class="s-9"><input type="text" id="question" name="question"  placeholder="Ask Question" title="Ask Question" /></div>
                        <div class="s-3"><button type="submit" id="askquestion" name="askquestion" style="color:white;" >Ask Question</button></div>
                     </form>
                  </div>
               </div>
                  
                  <!-- Pruducts -->
                  <div class="margin4">
                  <div class="s-12 l-10">
                     <div class="margin">
                    <?php
                    include("connection.php");
                    $query="SELECT * FROM ask_question";
                    $pdo_statment=$con->prepare($query);
                     $val=$pdo_statment->execute();

                     ?>
<aside class="s-12 m-12 l-12 xl-12 aside-nav minimize-on-small outerdiv" >
               
              
                    

                       <?php
                       while($row = $pdo_statment->fetch())
                       {
                        ?>
                        <div class="s-9">
                       <div class="innerdiv">

                        <div>
                          <?php
                          #slug is used for URL which is useful for share URL 
                          $slug=preg_replace('/[^A-Za-z0-9]+/','-',$row['question']); 
                          ?>
                       <p class="questionshow"><a href="question/<?php echo $row['unique_number'];?>/<?php echo $slug;?>" style="color:#444;word-break:all;overflow:hidden; display: flex;flex-wrap: wrap;justify-content: space-between"><?php echo ucfirst($row['question']);?></a></p>
                   
                        
                       <hr>
                       <br>

                       </div>
                       
                    </div>
                  </div>

                    <?php 
                    }
                  ?>
              
            </aside>
 
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
         
         
         $("#askquestion").click(function(event){
              event.preventDefault();
         var que=document.getElementById("question").value;
         var re=que.replace(/\s/gi,'_');
        $.ajax({
    url:'question_check.php',
    method:'GET',
    data:{"question":re},
         success:function(response)
         {
           if(response==0)
           {
             document.getElementById("display_question").innerHTML=que;
             document.querySelector("#questionpopup").style.display = "flex";
           }
           else
           {
             var slug=que.replace(/[^0-9a-zA-Z]/gi,' ');
             window.location.href="question/"+response+"/"+slug;
           }
          
         }
  
   });
         });
         $("#ask_in_fourm").click(function(event){
              event.preventDefault();
              var que=document.getElementById("question").value;

          
              $.ajax({
    url:'session_check.php',
    method:'GET',
    async:false,
         success:function(response)
         {
           if(response==0)
           {
             document.querySelector("#questionpopup").style.display = "none";
             document.querySelector("#loginpopup").style.display ="flex";
           }
           else
           {
           //    alert("yup");
           add_question(que.toLowerCase());
           //window.location.href="add_forum_question.php";
             document.querySelector("#questionpopup").style.display = "none";
           
           }
          
         }
  
   });

         });

               $(".loginchk").on("change",function(event){
        event.preventDefault();
        validate();
      })


function add_question(question)
{
   $.ajax({
   url:"add_forum_question.php",
   method:"GET",
   data:{"question":question},
   success:function(response)
   {
    if(response==0)
    {
      alert("something went wrong");
    }
    else
    {
         location.reload(true);
    }
   }
   });
}

      </script>
   </body>
</html>               