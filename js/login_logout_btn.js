
        $(document).ready(function(){
        $(".btn-primary").click(function(){
        window.location.href="login_user.php";
        });
        $(".btn-link").click(function(){
        window.location.href="register.php";
        });
        $(".btn-danger").click(function(){
           var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    }
  };
  xmlhttp.open("GET", "logout_user.php",false);
  xmlhttp.send();
      location.reload(true);

        });


        });