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
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" id="username" name="username" placeholder="Email">
              </div>
              <div>
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password1"></span>
    
              </div>
              <div>
                <input type="submit" id="login" name="login" class="btn btn-default" value="Login">
                <a class="reset_pass" href="laari_forgotpwd.php">Lost your password?</a> 
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

   $("#login").click(function(event){
    event.preventDefault();
    
    var username=document.getElementById("username").value;
    var pwd=document.getElementById("pwd").value;
    var error=document.getElementById("error");

   if(username=='' || pwd=='')
    {
     error.innerHTML="Fill All Login Details"; 
     error.style.visibility="visible";
    }

    else
    {
      $.ajax({
      url:"laari_login_check.php",
      method:"GET",
      data:{"username":username,"pwd":pwd},
      success:function(response)
      {
     //   alert(response);
         if(response=="admin")
         {
          window.location.href="tables.php";
         }
         else if(response=="wrong")
         {

     error.innerHTML="Details Are Wrong"; 
     error.style.visibility="visible";
         }
         else
         {
          window.location.href="profile.php";
         }
      }
      });
    }
   });

  </script>
</html>
