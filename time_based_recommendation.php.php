<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Free responsive Online Store template</title>
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">  
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
      <style type="text/css">
     img[id="i1"] {
     width:  100px;
     height: 100px;
     padding: 2;
}
.margin2x
{
 border-spacing: 10px;
 margin: 5px;
}
button[type="submit"]
{
    padding: 15px 32px;
    text-align: center;
    display: inline-block;
    font-size: 16px;
}
      </style>
   </head>
<body class="size-1520">
   
<?php
date_default_timezone_set("Asia/Kolkata");
$con=mysqli_connect("localhost","root","","test");

$h=date('H');
//echo $h;
if($h>=7 && $h<11)
{
$q="SELECT * FROM t2,t1 WHERE t1.tid=t2.tid AND t1.tname='breakfast'";  
}

else if($h>=11 && $h<16)
{
 $q="SELECT * FROM t2,t1 WHERE t1.tid=t2.tid AND t1.tname='lunch'"; 
}

else if($h>=16 && $h<19)
{
 $q="SELECT * FROM t2,t1 WHERE t1.tid=t2.tid AND t1.tname='snacks'"; 
}


else if($h>=19 && $h<23)
{
 $q="SELECT * FROM t2,t1 WHERE t1.tid=t2.tid AND t1.tname='dinner'"; 
}


$res=mysqli_query($con,$q);
$type=mysqli_fetch_array($res);
$k=$type["tname"];
echo '<h1 class="margin-bottom">'.$k.'</h1>';
 $counter=0;   
echo '<div class="margin2x">';
while($r=mysqli_fetch_array($res))
{
echo '<div class="s-12 m-12 l-4 xl-3 xxl-3">';
//$k=$r['tname'];  
$filepath="./im/".$r['img'];
	echo  '<a href="/">';
     echo  '<img src="' .$filepath. '" alt="error" id="i1">';
     echo '</a>'.
     '<h5>EUR 20.59</h5>'.
    '<a href="/"><h4 class="margin-bottom"><strong>Product name lorem ipsum dolor</strong></h4></a>'.
     '<p class="margin-bottom">Lorem ipsum dolor sit amet, qui iisque scripserit in, ne pri suas labitur, cu duo brute veniam.</p>'.
       '<form class="customform s-12 margin-bottom2x" action="">'.
        '<div><button class="button rounded-btn submit-btn s-12" type="submit">Add to Cart</button></div>'.
       '</form>';

echo "</div>";
/*
      $counter+=1;
      if($counter%3==0)
      {
        echo "<br>";
      }*/
$k++;
}
echo '</div>';
?>
</body>
</html>