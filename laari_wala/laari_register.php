<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Laari Registration</title>

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
    <style type="text/css">
        .error{
            color:red;
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
table,th,td,tr{
    border:2px solid white;
    text-align:center;
    width:50%;
    padding:15px;
    color:white;

}

    </style>
</head>

<body background="b1.jpg" size="100">
    <div>
        <div>
            <center> 
                    <img src="img/logo.png" style="height:15vh;">
                    </center>
                    </div>
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Laari Owner Registration Form</h2>
                    <form method="POST" name="register" id="register" action="submit_data.php"  enctype='multipart/form-data' onsubmit="return validation_form()">
                        <!--first row-->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="first_name">First name</label>
                                    <input class="input--style-4" type="text"  id="first_name" name="first_name">
                                    <p class="error" id="first_name_error"></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Last name</label>
                                    <input class="input--style-4" type="text" id="last_name" name="last_name">
                                    <p class="error" id="last_name_error"></p>
                                </div>
                            </div>
                        </div>
                        <!--first row-->

                        <!--second row-->
                                <div class="input-group">
                                    <label class="label">Laari name</label>
                                    <input class="input--style-4" type="text" id="laari_name" name="laari_name">
                                    <p class="error" id="laari_name_error"></p>
                                </div>
                        <!--second row-->
                        
                        <!--Third row-->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="text" id="email" name="email" onchange="check()">
                                    <p class="error" id="email_error"></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" id="phone" name="phone">
                                    <p class="error" id="phone_error"></p>
                                </div>
                            </div>
                        </div>
                        <!--Third row-->

                        <!--fourth row-->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Start time</label>
                                    <input class="input--style-4" type="time" id="start_time" name="start_time">
                                     <p class="error" id="start_time_error"></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">End time</label>
                                    <input class="input--style-4" type="time" id="end_time" name="end_time">
                                    <p class="error" id="end_time_error"></p>
                                </div>
                            </div>
                            <p class="error" id="time_error"></p>
                            e.g 12:00 am
                        </div>
                        <br>
                        <!--fourth row-->

                        <!--fifth row-->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Category 1</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select id="cat1" name="cat1">
                                            <option >Choose Option</option>
                                            <option>Vegetarian</option>
                                            <option>Non-Vegetarian</option>
                                            <option>Chinese</option>
                                            <option>Punjabi</option>
                                            <option>North Indian</option>
                                            <option>South Indian</option>
                                            <option>Break Fast</option>
                                            <option>Dinner</option>
                                            <option>Lunch</option>
                                            <option>Snacks</option>
                                            <option>Desert</option>
                                            <option>Beverages</option>
                                            <option>Ice Cream</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Category 2</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select id="cat2" name="cat2">  
                                            <option>Choose option</option>
                                            <option>Vegetarian</option>
                                            <option>Non-Vegetarian</option>
                                            <option>Chinese</option>
                                            <option>Punjabi</option>
                                            <option>North Indian</option>
                                            <option>South Indian</option>
                                            <option>Break Fast</option>
                                            <option>Dinner</option>
                                            <option>Lunch</option>
                                            <option>Snacks</option>
                                            <option>Desert</option>
                                            <option>Beverages</option>
                                            <option>Ice Cream</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Category 3</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select id="cat3" name="cat3">
                                            <option>Choose option</option>
                                            <option>Vegetarian</option>
                                            <option>Non-Vegetarian</option>
                                            <option>Chinese</option>
                                            <option>Punjabi</option>
                                            <option>North Indian</option>
                                            <option>South Indian</option>
                                            <option>Break Fast</option>
                                            <option>Dinner</option>
                                            <option>Lunch</option>
                                            <option>Snacks</option>
                                            <option>Desert</option>
                                            <option>Beverages</option>
                                            <option>Ice Cream</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>

                            <p class="error" id="category_error"></p>
                        </div>
                        <br>
                        <!--fifth row-->

                        <!--sixth row-->
                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                         
                            <label class="label">Items</label>
                             <input class="input--style-4" type="text" name="item" id="item">

                            <p class="error" id="item_error"></p>
                           </div>
                       </div>
                          <div class="col-2">
                                <div class="input-group">
                         
                            <label class="label">Price</label>
                            <input class="input--style-4" type="text" name="price" id="price">
                            <p>Price should be entered as per 1 plate or 1 Kg</p>
                            <br>
                            <p class="error" id="price_error"></p>
                        </div>
                    </div>
                            </div>
                            <button class="btn btn--radius-2 btn--blue"  id="item1">Add item</button>
                            <br>
                            <br>
                            <div id="menu"></div>
                            <br>
                            <button class="btn btn--radius-2 btn--blue" id="clearmenu">clear menu</button>
                            <br>
                        <!--sixth row-->
                        
                         <!--seventh row-->
                         <label class="label">Photo of Laari</label>
                         <input class="input--style-2"  type="file" name="img_name" id="img_name">
                              <p class="error" id="img_error"></p>
                       <br>
                       <br>
                         <!--seventh row-->
                    
                        <!-- seventh first row-->
                        <h3>Address:</h3>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label" for="first_name">Street</label>
                                    <input class="input--style-4" type="text"  id="street" name="street">
                                    <p class="error" id="first_name_error"></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Area</label>
                                    <input class="input--style-4" type="text" id="area" name="area">
                                    <p class="error" id="last_name_error"></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Near by place</label>
                                    <input class="input--style-4" type="text" id="place" name="place">
                                    <p class="error" id="last_name_error"></p>
                                </div>
                                e.g city mall,VR etc.
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Pincode</label>
                                    <input class="input--style-4" type="text" id="pincode" name="pincode">
                                    <p class="error" id="pincode_error"></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">City</label>
                                    <input class="input--style-4" type="text" id="city" name="city" value="surat" disabled>
                                    <p class="error" id="city_error"></p>
                                </div>
                            </div>
                        </div>
                        <!--seveth first row-->

                        <!--eigth row-->
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" id="password" name="password">
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password1"></span>
                            <p class="error" id="password_error"></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Confirm Password</label>
                                    <input class="input--style-4" type="password" id="c_password" name="c_password">

                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password2"></span>

                            <p class="error" id="c_password_error"></p>
                                </div>
                            </div>
                        </div>
                        <!--eight row-->

                        <div class="p-t-15">
                            <button  class="btn btn--radius-2 btn--blue" type="submit" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<script>


$("#item1").click(function(){
    event.preventDefault();
    i=document.getElementById("item").value;
    p=document.getElementById("price").value;
    //alert(i);
    //alert(p);
   $.post("add_item.php",
  {
    item: i,
    price: p
  },
  function(data, status){
    document.getElementById("item").innerHTML="";
    document.getElementById("price").innerHTML="";
  });
});




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



$("#price").change(function(){
   f=0;
   p=document.getElementById("price").value;
   
   var reg=/^[0-9]{2,10000}$/;
   if(!reg.test(p)){
    document.getElementById("price_error").innerHTML="Price could only be in number";
    document.getElementById("item1").disabled=true;
    }
    else{
        document.getElementById("price_error").innerHTML=" ";
        document.getElementById("item1").disabled=false;
    }
});








$(document).ready(function(){
load();

});

function load()
{
	setInterval('menu_update()',1000);
}
function menu_update()
{
    var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("menu").innerHTML = this.responseText;
    //$("menu").text(this.responseText);
    }
  };
  xmlhttp.open("POST", "menu.php",false);
  xmlhttp.send();
  xmlhttp.abort();

}


$("#clearmenu").click(function(){
    var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    // document.getElementById("menu").innerHTML = this.responseText;
    window.location.reload();
    }
  };
  xmlhttp.open("POST", "clear_menu.php",false);
  xmlhttp.send();
});





       $(".toggle-password1").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
        var password=document.getElementById("password");
        if(password.type=="password")
        {
          password.type="text";
        }
        else
        {
          password.type="password";
        }
});
             $(".toggle-password2").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
        var c_password=document.getElementById("c_password");
        if(c_password.type=="password")
        {
          c_password.type="text";
        }
        else
        {
          c_password.type="password";
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
    var start_time=document.getElementById("start_time").value;
    var img=document.getElementById("img_name");  
   
       

    var end_time=document.getElementById("end_time").value;
    var cat1=document.getElementById("cat1").value; 
    var cat2=document.getElementById("cat2").value;
    var cat3=document.getElementById("cat3").value;
    var password=document.getElementById("password").value;
    var c_password=document.getElementById("c_password").value;

      document.getElementById("first_name_error").innerHTML="";
    document.getElementById("last_name_error").innerHTML="";
    document.getElementById("laari_name_error").innerHTML="";
     document.getElementById("email_error").innerHTML="";
     document.getElementById("phone_error").innerHTML="";
    document.getElementById("start_time_error").innerHTML="";
     document.getElementById("end_time_error").innerHTML="";
     document.getElementById("time_error").innerHTML="";
     document.getElementById("category_error").innerHTML="";
     document.getElementById("img_error").innerHTML="";
     document.getElementById("password_error").innerHTML="";
      document.getElementById("c_password_error").innerHTML="";



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

     
        if(start_time=="")
        {
            document.getElementById("start_time_error").innerHTML="Required";
            flag=false;
        }
   
    if(end_time=="")
    {
        document.getElementById("end_time_error").innerHTML="Required";
        flag=false;
    }

  if(start_time>end_time)
    {
        document.getElementById("time_error").innerHTML="Check your timings";
        flag=false;
    }

    if(cat1=="Choose option")
    {
        document.getElementById("category_error").innerHTML="At least 1 category Required";
        flag=false;
    }


    if(img.value=="")
    {
        document.getElementById("img_error").innerHTML="Required";
        flag=false;
    }
    else
    {
          var val=document.getElementById("img_name");
         var type=val.files[0].type;
         var img_type_check=type.split("/");
         if(img_type_check[0]!="image")
         {
            document.getElementById("img_error").innerHTML="It must be image";
            flag=false;
         }
  
    }

    var regex5=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    if(password=="")
    {
        document.getElementById("password_error").innerHTML="Required";
        flag = false;
    }
    else
    {
        if(!regex5.test(password))
        {
            
            document.getElementById("password_error").innerHTML="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters";
            flag=false;
        }
        else
     {


      if(c_password=="")
       {
        document.getElementById("c_password_error").innerHTML="Required";
        flag=false;
       }
        else
        {
           if(c_password!=password)
            {
            document.getElementById("c_password_error").innerHTML="Password and confirm password not match";
            flag=false;
            }
       }
        

    }
    }



return flag;


}




function delete_func(index)
{
    $.ajax({
        url:'delete_item_price.php',
        method:'GET',
        data:{"index":index},
        success:function(response)
        {
            alert("delete:"+response);
        }
    });
}







</script>
</html>
<!-- end document-->