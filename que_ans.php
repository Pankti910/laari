<!DOCTYPE html>
<html lang="en-US">
   <head>
   <!--base is used for loading all css files which are in other file-->
   <?php
                        session_start(); 
                       include("connection.php");
                       


                       


                       $query="SELECT question FROM ask_question WHERE unique_number=:unique_number";
                       $pdo_statment=$con->prepare($query);
                       $pdo_statment->execute(array(":unique_number"=>$_GET["unique_number"]));
                       $question_fetch=$pdo_statment->fetchColumn();
                      
 
   ?>
    <base href="/laari/" />
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <meta http-equiv="X-UA-Compatible" content="ie-edge">
                <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
      <title><?php echo ucfirst($question_fetch);?></title>
      
  <link rel="icon" type="img/png" href="img/logo.jpeg">
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
      <link rel="stylesheet" type="text/css" href="css/popup.css">
      <!-- CUSTOM STYLE -->

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   



    <meta name="google-signin-scope" content="profile email">

     <meta name="google-signin-client_id" content="491675131424-kpnbnccmf0hvohg8nfpe0nfvjara7u9a.apps.googleusercontent.com">
   
    <script src="https://apis.google.com/js/platform.js" async defer></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <link rel="stylesheet" href="css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>   
       <script type="text/javascript" src="js/login_popup.js"></script>
      <script type="text/javascript" src="js/like_btn.js"></script>

      <script type="text/javascript" src="js/forum_notification.js"></script>
            <script type="text/javascript" src="js/login_logout_btn.js"></script>

   
      <style type="text/css">
        

   </style>
 
   </head>

   <body class="size-1520" onload="init(0,null,null,null,null)">
      <!-- HEADER -->
      <div class="loading">
        
      </div>
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
    <a href="forgotpwd.php" >Forgot password</a>
    
  </center>
  </form>


    </div>
</div>


<div id="loader">
  <div id="content"></div>
  
</div>
                     <div class="s-12 l-8">

                <center>
                  <img src="img/logo.png" style="height:20vh!important;padding-left:35vw;">
                </center>
               </div>
           <div class="box" style="background-image:url('img/b1.jpg')!important;">
         <div class="s-12 l-8 right">
                  <div class="margin">
                     
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
       </div>
     </header>
      <!-- ASIDE NAV AND CONTENT -->




        <div class="line">
         <div class="box margin-bottom">
            

    
            <div class="margin2x" style="overflow:hidden;" style="color:white!important;">
               <!-- ASIDE NAV -->
                          <aside class="s-12 m-4 l-3 xl-2 left">
                  <h4 class="margin-bottom">Forum</h4>
                  <div class="aside-nav minimize-on-small">
                     <p class="aside-nav-text" >Forum</p>
                     <ul>
                        <?php
                        //session_start();
                        if(isset($_SESSION["user_id"]))
                        { 
                        ?>
                      
                        <li><a href="my_question.php">My Question<span class="badge badge-light"></span></a></li>
                     
                        <?php
                        } 
                        ?>

                        <li>
                           <a href="forum.php">Community Question</a>
                           
                        </li>
                        </ul>
                  
                  </div>
               </aside>
               


               <aside class="s-12 m-4 l-1 xl-10" >
               

                  <div class="aside-nav minimize-on-small outerdiv" >
                    
                       <div class="innerdiv">

                        <div>
                       <p class="question center">
                       <?php
                       include("connection.php");
                       
                       $query="SELECT question FROM ask_question WHERE unique_number=:unique_number";
                       $pdo_statment=$con->prepare($query);
                       $pdo_statment->execute(array(":unique_number"=>$_GET["unique_number"]));
                       $question_fetch=$pdo_statment->fetchColumn();
                       echo ucfirst($question_fetch);
                       ?>
                         
                       </p>
                       </div>

                       <div class="answer" style="overflow:hidden;">
                           <form  class="customform customform s-12 l-8 " method="POST">


                        <div class="inputWithIcon s-9" style="float:left;">
                           <textarea type="text" id="answer_data" name="answer_data" placeholder="answer this question"></textarea>
                           <div>
                            
                           <?php 
                           if(isset($_SESSION["user_id"]))
                           {
                            ?>
                            <span class="fa fa-paper-plane display_fa_paper_plane" onclick="send_data()" aria-hidden="true" style="font-size:2vw;float:right;"></span>
                            <?php
                          }
                          else
                          {
                           ?>
                           
                            <span class="fa fa-paper-plane display_fa_paper_plane" onclick="loginpop()" aria-hidden="true" style="font-size:2vw;float:right;"></span>

                           <?php
                          }
                         ?>

                         

                          
                          </div>

                           </div>

                        

                          </form>
                       </div>

                       <hr>
                       
                    <div id="load_reply" name="load_reply" class="load_reply">
                      
                    </div>

                       </div>
                          </div>

     
               
              </aside>









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
          var  clicked=false;
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
      <script type="text/javascript">

         function init(val,pnt,uid,aid,id)
         {
          //val 1 is used for like/not-like
            if(val==1)
            {
              likebtn(pnt,uid,aid,id);
            }
            //val 0 is set for load answers
            else
            {
              display_answer();
            }
         }


        function display_answer()
        {
          //load answers from database
          const val=setTimeout(function(){
         var xmlhttp=new XMLHttpRequest();
         var qid="<?php echo $_GET['unique_number'];?>";
    
      xmlhttp.onreadystatechange=function()
      {
                  if(xmlhttp.readyState==4)
                  {
                    document.getElementById("load_reply").innerHTML=xmlhttp.responseText;
                  }
      };
      xmlhttp.open("POST","load_answer.php?unique_number="+qid,true);
      xmlhttp.send();
    },0);
        }
        function send_data()
        {
          //insert data to databse
          var data=document.getElementById("answer_data").value;
          if(data!='')
          {
          var qid="<?php echo $_GET['unique_number'];?>";
          var slug="<?php echo $_GET['slug'];?>";
          window.location.href="add_forum_answer.php?data="+data.toLowerCase()+"&unique_number="+qid+"&slug="+slug;
          }
        }


       </script>    
       <script type="text/javascript">
         

      $(".loginchk").on("change",function(event){
        event.preventDefault();
        validate();
      })

       </script>     
    
   </body>
</html>

