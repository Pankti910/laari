<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Laari</title>
        <link rel="icon" type="img/png" href="img/logo.jpeg">
      

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="vendors/jquery/dist/jquery.js"></script>
    <script src="vendors/jquery/dist/jquery.min.js"></script>


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

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form name="login">
              <h1>Forgot Password</h1>
              <div>
                <input type="text" class="form-control" id="pno" name="pno" placeholder="Phone Number">
              </div>
              <div>
                <input type="email" class="form-control" id="mail" name="mail" placeholder="Email">
              </div>
              <div>
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="New Password">
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password1"></span>
              </div>

              <div>
                <input type="password" class="form-control" id="cpwd" name="cpwd" placeholder="New Confirm Password">
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
              </div>
              <div>
                <input type="submit" id="updatepwd" name="updatepwd" class="btn btn-default" value="Change Password">
                <a href="index.php" class="reset_pass">Login</a> 
              </div>

              <div class="clearfix"></div>
              <div class="alert alert-danger" id="error" style="visibility:hidden;"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="laari_register.php" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

              </div>
            </form>

          </section>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">




          $(".toggle-password1").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
        var user_pwd=document.getElementById("pwd");
        if(user_pwd.type=="password")
        {
          user_pwd.type="text";
        }
        else
        {
          user_pwd.type="password";
        }
});
             $(".toggle-password2").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
        var user_pwd=document.getElementById("cpwd");
        if(user_pwd.type=="password")
        {
          user_pwd.type="text";
        }
        else
        {
          user_pwd.type="password";
        }
});

   
   $("#updatepwd").click(function(event){
    event.preventDefault();
    var pno=document.getElementById("pno").value;
    var mail=document.getElementById("mail").value;
    var pwd=document.getElementById("pwd").value;
    var cpwd=document.getElementById("cpwd").value;
    var error=document.getElementById("error");
    if(pno=="" || mail=="" ||pwd==""||cpwd=="")
    {
     error.innerHTML="Fill All Details"; 
     error.style.visibility="visible";
    }
    else if(pwd!=cpwd)
    {

     error.innerHTML="Password and Confirm Password Doesn't match"; 
     error.style.visibility="visible"; 
    }
    else
    {
      $.ajax({
      url:"laari_forgotpwd1.php",
      method:"GET",
    data:{"pno":pno,"mail":mail,"pwd":pwd},
      success:function(response)
      {
         if(response=="wrong1")
         {

     error.innerHTML="Details Are Wrong"; 
     error.style.visibility="visible";
         }
         else if(response=="wrong")
         {

     error.innerHTML="Can't Set New Password"; 
     error.style.visibility="visible";
         }
         else
         {
          window.location.href="index.php";
         
         }
      }


      });

    }
   });


  </script>
</html>
