<?php
$index=$_GET["index"];
$item=strtolower($_GET["item"]);
$price=strtolower($_GET["price"]);
if(file_exists("itemfile.txt"))
{
	$item_data=file_get_contents("itemfile.txt");
	$price_data=file_get_contents("pricefile.txt");

	$item_array=unserialize($item_data);
	$price_array=unserialize($price_data);

    $item_array[$index]=$item;
    $price_array[$index]=$price;

    $item_data_new=serialize($item_array);
    $price_data_new=serialize($price_array);

    file_put_contents("itemfile.txt",$item_data_new);
    file_put_contents("pricefile.txt",$price_data_new);
    echo "done";
}
 
?>