<html>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Laari Menu Edit</title>

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
    <script type="text/javascript" href="js/laari_register_validation.js"></script>
    <style type="text/css">
        .error{
            color:#ff0000;
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
    </style>
</head>
<body style="background-image:url('img/b1.jpg')">
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Laari Menu edit</h2>
                    <form method="POST" name="register" id="register" action="laari_menu_edit_db.php"  enctype='multipart/form-data' onsubmit="return validation_form()">

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
                                            <option >Choose option</option>
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
                            <label class="label">Items</label>
                             <input class="input--style-4" type="text" name="item" id="item">

                            <p class="error" id="item_error"></p>
                            <br>
                            <label class="label">Price</label>
                            <input class="input--style-4" type="text" name="price" id="price">

                            <p class="error" id="price_error"></p>
                            <br>
                            <button class="btn btn--radius-2 btn--blue"  id="item1">Add item</button>
                            <br>
                            <br>
                        
                        <!--sixth row-->
                        

                        <div class="p-t-15">
                            <button  class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>         
</body>

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
    //alert(data);
  });
});




function validation_form()
{
    var flag=true;
  
    var start_time=document.getElementById("start_time").value;  
    var end_time=document.getElementById("end_time").value;
    var cat1=document.getElementById("cat1").value; 
    var cat2=document.getElementById("cat2").value;
    var cat3=document.getElementById("cat3").value;
    
    document.getElementById("start_time_error").innerHTML="";
     document.getElementById("end_time_error").innerHTML="";
     document.getElementById("time_error").innerHTML="";
     document.getElementById("category_error").innerHTML="";
    
 
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




return flag;


}



</script>
</html>