<!DOCTYPE html>
<html lang="en">
   <meta base="/laari/laari_wala/">
 
<?php
include("connection.php");
session_start();
$query="SELECT * FROM laari_owner WHERE id=:laari_owner_id";
$pdo_stmt=$con->prepare($query);
$pdo_stmt->execute(array(":laari_owner_id"=>$_SESSION['laari_owner_id']));
$result1=$pdo_stmt->fetch();

$query="SELECT * FROM laari_info WHERE laari_owner_id=:laari_owner_id";
$pdo_stmt=$con->prepare($query);

$pdo_stmt->execute(array(":laari_owner_id"=>$_SESSION['laari_owner_id']));
$result2=$pdo_stmt->fetch();

?>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   

    <!-- Title Page-->
    <title>Detail Edit</title>
         <link rel="icon" type="img/png" href="img/logo.jpeg">

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" href="js/laari_register_validation.js"></script>
    
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    
    <style type="text/css">
        .error{
            color:#ff0000;
            font-weight:bold;
        }
           .field-icon {
  float: right;
  margin-right:1vw;
  margin-top: -2vw;
  position: relative;
  z-index: 2;
}

input:focus,select:focus,textarea:focus {
  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  border: 1px solid rgba(81, 203, 238, 1);
}
.bg-gra-02
{

    background-image:url('b1.jpg')!important; 
}
</style>
</head>

<body>
    <div class="page-wrapper bg-gra-02  p-b-100 font-poppins">
            <div>
            <center> 
                    <img src="img/logo.png" style="height:15vh;">
                    </center>
                    </div>
                 
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <div >
                    <h2 class="title">Laari Owner Detail Edit</h2>
                    <form method="POST" names="register" id="register"  enctype='multipart/form-data' action="laari_edit_db.php" onsubmit="return validation_form()">
                        <!--first row-->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="first_name">First name</label>
                                    <input class="input--style-4" type="text"  id="first_name" name="first_name" value="<?php echo $result1['fname'];?>">
                                    <p class="error" id="first_name_error"></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Last name</label>
                                    <input class="input--style-4" type="text" id="last_name" name="last_name" value="<?php echo $result1['lname'];?>">
                                    <p class="error" id="last_name_error"></p>
                                </div>
                            </div>
                        </div>
                        <!--first row-->

                        <!--second row-->
                                <div class="input-group">
                                    <label class="label">Laari name</label>
                                    <input class="input--style-4" type="text" id="laari_name" name="laari_name" value="<?php echo $result2['laari_name'];?>">
                                    <p class="error" id="laari_name_error"></p>
                                </div>
                        <!--second row-->
                        
                        <!--Third row-->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" id="email" name="email" value="<?php echo $result1['email'];?>" >
                                    <p class="error" id="email_error"></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" id="phone" name="phone" value="<?php echo $result1['pno'];?>" >
                                    <p class="error" id="phone_error"></p>
                                </div>
                            </div>
                        </div>
                        <!--Third row-->

                        <!--fourth row-->
                        <br>
                        <!--fourth row-->

                        <!--fifth row-->
                        <div class="row row-space">
                        </div>
                        <br>
                        <!--fifth row-->

                        <!--sixth row-->
                            
                        
                        <!--sixth row-->
                        
                         <!--seventh row-->
                         
                         <!--seventh row-->
                    

                        <!--eigth row-->
                      
                        <!--eight row-->

                        <div class="p-t-15">
                            <button  class="btn btn--radius-2 btn--blue" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<script>



$("#email").change(function(){
    event.preventDefault();
    
    var reg=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
        var email=document.getElementById("email").value; 
        if(reg.test(email))
        {

            var email=document.getElementById("email").value;
            $.post("laari_mail_check.php",
            {
            mail: email,
            },
            function(data, status){
            if(data==1){
                document.getElementById("email_error").innerHTML="Email Address already exists";
                document.getElementById("submit").disabled=true;
            }
            else{
                document.getElementById("email_error").innerHTML=" ";
                document.getElementById("submit").disabled=false;
            }
            });
        }
        else
        {
          document.getElementById("submit").disabled=true;
          document.getElementById("email_error").innerHTML="Check Email Address";
          flag=false;         
        }
});



function validation_form()
{
    var flag=true;
    var first_name=document.getElementById("first_name").value;
    var last_name=document.getElementById("last_name").value;
    var laari_name=document.getElementById("laari_name").value;
    var email=document.getElementById("email").value;
    var phone=document.getElementById("phone").value;   
   
       

      document.getElementById("first_name_error").innerHTML="";
    document.getElementById("last_name_error").innerHTML="";
    document.getElementById("laari_name_error").innerHTML="";
     document.getElementById("email_error").innerHTML="";
     document.getElementById("phone_error").innerHTML="";
     document.getElementById("img_error").innerHTML="";



      var regex1=/^([A-Z])[a-z]+$/;
    if(first_name=="")
    {

    document.getElementById("first_name_error").innerHTML="Required";
    flag=false;
    }
  else
    {
    if(!regex1.test(first_name))
    {

    document.getElementById("first_name_error").innerHTML="Enter first name in alphabats first latter must be capital";
        flag=false;
    }
   }


   var regex2=/^([A-Z])[a-z]+$/;
    if(last_name=="")
    {

    document.getElementById("last_name_error").innerHTML="Required";
    flag=false;
    }
    else
    {
    if(!regex2.test(last_name))
    {

    document.getElementById("last_name_error").innerHTML="Enter last name in alphabats  first latter must be capital";
        flag=false;
    }
    
    }
    

       var regex3=/^([A-Z])[\w\s]+$/;
    if(laari_name=="")
    {

    document.getElementById("laari_name_error").innerHTML="Required";
    flag=false;
    }
    else
    {
    if(!regex3.test(laari_name))
    {

    document.getElementById("laari_name_error").innerHTML="Enter laari name in alphabats  first latter must be capital";
        flag=false;
    }
   }

      if(email=="")
    {

    document.getElementById("email_error").innerHTML="Required";
     flag=false;
    }
    else
    {

        var reg=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
        if(!reg.test(email))
        {

    document.getElementById("email_error").innerHTML="Check Email Address";
     flag=false;   
        }
    }


   

   var regex4=/^([6-9][0-9]{9})+$/;
   if(phone=="")
    {

    document.getElementById("phone_error").innerHTML="Required";
    flag=false;
    }
    else
    {
          if(!regex4.test(phone))
    
    {

    document.getElementById("phone_error").innerHTML="Check phone number";
          flag=false;
    }




    }



   

return flag;


}





</script>
</html>