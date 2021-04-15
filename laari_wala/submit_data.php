<?php
session_start();
$dsn = "mysql:host=localhost;dbname=project;charset=utf8mb4";
$options = [
  PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];
try {
  $pdo = new PDO($dsn, "root", "", $options);
} catch (Exception $e) {
  error_log($e->getMessage());
  exit('Something weird happened'); //something a user can understand
}

$lno=$fname=$lname=$laariname=$category1=$category2=$category3=$stime=$etime=$email=$pno=$item=NULL;

$fname=$_POST['first_name'];
$lname=$_POST['last_name'];


$laariname=$_POST['laari_name'];

$email=$_POST['email'];
$pno=strtolower($_POST['phone']);

$stime=strtolower($_POST['start_time']);
$etime=strtolower($_POST['end_time']);

$category1=strtolower($_POST['cat1']);
$category2=strtolower($_POST['cat2']);
$category3=strtolower($_POST['cat3']);

$item=file_get_contents("itemfile.txt");
$price=file_get_contents("pricefile.txt");

$street=strtolower($_POST['street']);
$place=strtolower($_POST['place']);
$area=strtolower($_POST['area']);
$pin=strtolower($_POST['pincode']);
$city="surat";

$pwd=$_POST["password"];
//$pwd=hash("sha512",$_POST['password']);
$cpwd=$_POST['c_password'];

$laari_img="";
$status=false;

$lat="";
$long="";

//echo $item;
//echo "<br>";
$stmt = $pdo->prepare("INSERT INTO laari_owner VALUES (?,?,?,?,?)");
$stmt->execute([NULL,$fname,$lname,$pno,$email]);


$stmt = $pdo->prepare("SELECT id from laari_owner where email=? AND fname=? AND lname=? AND pno=?");
$stmt->execute([$email,$fname,$lname,$pno]);
$laari_own_id=$stmt->fetch();

$stmt = $pdo->prepare("INSERT INTO laari_owner_login VALUES (?,?,?)");
$pwd=hash("sha512",$pwd);
$stmt->execute([$laari_own_id["id"],$email,$pwd]);

//print_r($laari_own_id);

$add="";

$target_dir="laari_pic/";
$file_extension=explode(".",$_FILES["img_name"]["name"]);
$laari_profile=$laari_own_id['id']."_owner_id.".$file_extension[1];
$target_file=$target_dir.$laari_profile;
if(move_uploaded_file($_FILES["img_name"]["tmp_name"],$target_file))
{
$stmt = $pdo->prepare("INSERT INTO laari_info VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->execute([NULL,$laariname,$stime,$etime,$category1,$category2,$category3,$item,$price,$laari_profile,$street,$place,$area,$pin,$city,$status,$laari_own_id['id']]);

unlink("itemfile.txt");
unlink("pricefile.txt");
 
}

//session_start();
$_SESSION['larri_name']=$laariname;
//writing inside Test_Corpus and token x and y

$T_corpus=file_get_contents("C:\\xampp\\htdocs\\laari\\laari_wala\\Test_corpus.json");
$tokens_array=(array)json_decode($T_corpus,true);

/////////////////////////////////////

$token_x=file_get_contents("token_data_x.json");
$token_xarr=(array)json_decode($token_x,true);
    
$token_y=file_get_contents("token_data_y.json");
$token_yarr=(array)json_decode($token_y,true);

/////////////////////////////////////

/*
//echo "<br>";
//echo "<br>";
print_r($tokens_array);
//echo "<br>";
print_r($token_xarr);
//echo "<br>";
print_r($token_yarr);
//echo "<br>";
//echo "<br>";
print_r($trend_xarr);
//echo "<br>";
print_r($trend_yarr);
//echo "<br>";
//echo "<br>";
*/


$cnt=0; //number of data points to be plotted

$i=0;  //for iterating T_corpus
$f=0;  //larri_name present or not flag

while($i!=count($tokens_array)){
 if($laariname==$tokens_array[$i]){
   $f=1;
 }
 $i=$i+1;
}

if($f==1){
echo "laariname exists";
}
else{
 array_push($tokens_array,$laariname);
    
    $rxn=(float)shell_exec('python C:\xampp\htdocs\laari\laari_wala\random_data_point.py');
    array_push($token_xarr,$rxn);
    $ryn=(float)shell_exec('python C:\xampp\htdocs\laari\laari_wala\random_data_point.py');
    array_push($token_yarr,$ryn);
}

$uns_item=unserialize($item);


$i=0; //for iterating $uns_item
$f=0; //present or not
$j=0; //iterating $T_corpus

while($i!=count($uns_item)){
 $f=0; //present or not
 $j=0; //iterating $T_corpus


 while($j!=count($tokens_array)){
   if($uns_item[$i]==$tokens_array[$j]){
     $f=1;
   }
   $j=$j+1;
 }

 if($f==1){
    echo "item name exists";
   }
   else{
     array_push($tokens_array,$uns_item[$i]);
     
    $rxn=(float)shell_exec('python C:\xampp\htdocs\laari\laari_wala\random_data_point.py');
    array_push($token_xarr,$rxn);
    $ryn=(float)shell_exec('python C:\xampp\htdocs\laari\laari_wala\random_data_point.py');
    array_push($token_yarr,$ryn);
   }
    
$i=$i+1;
}


//echo "<br>";
//echo "<br>";
//print_r($tokens_array);
//echo "<br>";
//print_r($token_xarr);
//echo "<br>";
//print_r($token_yarr);
//echo "<br>";
//echo "<br>";
//print_r($trend_xarr);
//echo "<br>";
//print_r($trend_yarr);
//echo "<br>";
//echo "<br>";

$en_corpus=json_encode($tokens_array);
$en_tk_xarr=json_encode($token_xarr);
$en_tk_yarr=json_encode($token_yarr);

file_put_contents("C:\\xampp\\htdocs\\laari\\laari_wala\\Test_corpus.json",$en_corpus);
file_put_contents("C:\\xampp\\htdocs\\laari\\laari_wala\\token_data_x.json",$en_tk_xarr);
file_put_contents("C:\\xampp\\htdocs\\laari\\laari_wala\\token_data_y.json",$en_tk_yarr);

$_SESSION["laari_owner_id"]=$laari_own_id['id'];
unlink("itemfile.txt");
unlink("pricefile.txt");
header("location:laari_login.php");
?>
