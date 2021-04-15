<!DOCTYPE html>
<html lang="en-US">
   <head>

        <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Login</title>
  <link rel="icon" type="img/png" href="img/logo.jpeg">
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/icon1.css">
      <link rel="stylesheet" href="css/onlycomponents.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="css/other.css">
      <link rel="stylesheet" href="css/other1.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">  
      <link rel="stylesheet" type="text/css" href="css/popup.css">
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   

      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>    

      <script type="text/javascript" src="js/forum_notification.js"></script>
      <script type="text/javascript" src="js/login_logout_btn.js"></script>
     
       <style type="text/css">
    .field-icon {
  float: right;
  margin-right:1vw;
  margin-top: -3.3vw;
  position: relative;
  z-index: 2;
}

   
  </style>  
   </head>
   <body class="size-1520">
      <!-- HEADER -->
      <?php
    include("valid_user_register.php");
    ?>

      <header>
         <div class="line">
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
                        <a>Company</a>
                        <ul>
                           <li><a>About</a></li>
                           <li><a>Location</a></li>
                        </ul>
                     </li>
                        <li>
                        <a href="forum.php">Forum
                        
                         <?php
                        session_start();
                        if(isset($_SESSION["user_id"]))
                         {
                         ?>
                          <span class="badge badge-light"></span>
                          <?php
                          } 
                          ?>


                        </a>
                         
                     
                     </li>
      
    </div>
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




                 <aside class="s-12 m-4 l-3 xl-2">
                  <h4 class="margin-bottom">Select Category</h4>
                  <div class="aside-nav minimize-on-small">
                     <p class="aside-nav-text">Select Category</p>
                     <ul>
                        <li><a>My Favorite</a></li>
                        <li>
                           <a>Trending</a>
                           
                        </li>
                        
                  
                  </div>
               </aside>
               <section class="s-12 m-8 l-9 xl-10">                  
                
                  <div class="margin" >
                          <div class="innerdiv">

                              <div class="s-10 l-5" style="margin-left:20vw;">
                                    <div class="margin">
                 
                                   <h1 class="margin-bottom" style="float:center;">Register</h1>
                                     <form  class="customform s-12 l-8" method="POST">
                                      
                                    
                                           <div class="s-10">First Name</div>
                                                <div class="s-10"><input type="text" class="roundborder" id="first_name" name="first_name" value="<?php echo $firstname;?>"></div>
                                                <div class="s-10" style="color:red;"><?php echo $fname_err;?></div>
                                      
                                           <div class="s-10">Last Name</div>
                                                <div class="s-10"><input type="text" class="roundborder" id="last_name" name="last_name" value="<?php echo $lastname;?>"></div>
                                                <div class="s-10" style="color:red;"><?php echo $lname_err;?></div>
                                      
                                           <div class="s-10">User Name</div>
                                                <div class="s-10"><input type="text" class="roundborder" id="user_name" name="user_name" value="<?php echo $username;?>" ></div>
                                                <div class="s-10" style="color:red;"><?php echo $username_err;?></div>
                                               <div class="s-10">Password</div>
                                   <div class="s-10"><input type="password" class="roundborder" id="user_pwd" name="user_pwd" value="<?php echo $pwd;?>"><span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span></div>
                                   <div class="s-10" style="color:red;"><?php echo $userpwd_err;?></div>
                                   <div class="s-10">Mobile Number</div>
                                   <div class="s-10"><input type="text" class="roundborder" id="user_pno" name="user_pno" value="<?php echo $pno;?>"></div>
                                  <div class="s-10" style="color:red;"><?php echo $userpno_err;?></div>
                             
                                   <center>

                                   </center>
                                   <div class="s-10"><button type="submit" class="roundborder" id="user_register" name="user_register" style="color:white;">Register</button></div>
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
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
        var user_pwd=document.getElementById("user_pwd");
        if(user_pwd.type=="password")
        {
          user_pwd.type="text";
        }
        else
        {
          user_pwd.type="password";
        }
});
      </script>     
   </body>
</html>