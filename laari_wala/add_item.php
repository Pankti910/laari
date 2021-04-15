<?php
    
    $item=strtolower($_POST['item']);
    $price=strtolower($_POST['price']);
    //Checking for already item present
if(!empty($item)){

if(file_exists("itemfile.txt")){
    $str=file_get_contents("itemfile.txt");
    $contents=unserialize($str);

    $p_str=file_get_contents("pricefile.txt");
    $price_contents=unserialize($p_str);

    $f=0;
    #check items are exist or not
    for($i=0;$i<count($contents);$i++){
        if($contents[$i]==$item){
            $f=1;
        }
    }
    #if not exist than put into file
    if($f==0){
        array_push($contents,$item);
        array_push($price_contents,$price);

        $s_contents=serialize($contents);
        $s_price=serialize($price_contents);
        
        file_put_contents("itemfile.txt",$s_contents);
        file_put_contents("pricefile.txt",$s_price);
        
        echo $_POST['item']." added";
    }
    else{
        echo "item already exists";
    }
}
else{

        $arr=array();
        $arr1=array();
        
        array_push($arr,$item);
        array_push($arr1,$price);
        
        $s_item=serialize($arr);
        $s_price=serialize($arr1);

        file_put_contents("itemfile.txt",$s_item);
        file_put_contents("pricefile.txt",$s_price);
        
        echo $_POST['item']." added";        
}

}
else{
    echo "please first enter the item";
}
?>