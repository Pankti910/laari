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

$token=strtolower($_POST["search"]);
$srch=strtolower($_POST["search"]);

if(isset($_SESSION['user_id'])){
//CREATING THE USER SESSION CORPUS
//Checking the File and creating history array

$stmt = $pdo->prepare("select first_name from user_info where user_id=?");
$stmt->execute([$_SESSION['user_id']]);
$name=$stmt->fetch();
file_put_contents("name.txt",$name['first_name']);

$usr_file="user_corpuses/".$name['first_name'].".json";
if(!file_exists($usr_file)){
    $searched_token[]=strtolower($_POST['search']);
    $usr=$searched_token;

    $words['Array']=$usr;
     $data=json_encode($words);
     file_put_contents("user_corpuses/".$name['first_name'].".json",$data);
     //$out_str=exec('python C:\xampp\htdocs\laari\Test_Samples\page\test_recomm_products.py');
    }
    else{
    //echo "Data exists";
    $search_string=strtolower($_POST['search']);
    $user_file=file_get_contents("user_corpuses/".$name['first_name'].".json");
    $user_arr=(array)json_decode($user_file,true);
    $i=0;
    $f=0;
    print_r($user_arr);
    $other=$user_arr['Array'];
    //finding duplicate word already present in user file
    while($i!=count($other)){
        if($search_string==$other[$i]){
            $f=1;
        break;
        }
        else{
            $f=0;
        }
        $i++;
    }
    if($f==1){}
    else{
        array_push($other,$search_string);

    $words['Array']=$other;
     $data=json_encode($words);
     file_put_contents("user_corpuses/".$name['first_name'].".json",$data);
     //$out_str=exec('python C:\xampp\htdocs\laari\Test_Samples\page\test_recomm_products.py');
    }
}
//CREATING THE USER SESSION CORPUS
}


//CREATING THE SEARCH CORPUS
$srch_file="search.json";
if(!file_exists($srch_file)){
    $searched_token[]=strtolower($_POST['search']);
    $src=$searched_token;

    $words['Array']=$src;
    $data=json_encode($words);
     file_put_contents("search.json",$data);
    }
    else{
    $srch_file_data=file_get_contents($srch_file);
    $src=json_decode($srch_file_data,true);

    $search_string=strtolower($_POST['search']);
    $i=0;
    $f=0;
    $other=$src['Array'];
    array_push($other,$search_string);
    $words['Array']=$other;
    $data=json_encode($words);
     file_put_contents("search.json",$data);
    //Writing inside user.json
}
//CREATING THE SEARCH CORPUS
?>