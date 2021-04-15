<?php
if(file_exists("itemfile.txt")){
$items=file_get_contents("itemfile.txt");
$s_price=file_get_contents("pricefile.txt");

$menu=unserialize($items);
$price=unserialize($s_price);
$i=0;
if(!empty($menu))
{
echo "<table border='2'>";
echo "<th>Item</th>";
echo "<th>Price</th>";
while($i < count($menu)){
    echo "<tr>";
    echo "<td>".$menu[$i]."</td>";
    echo "<td>".$price[$i]."</td>";
    echo "<td><i class='fa fa-remove' onclick='delete_func($i)'></i></td>";
    echo "</tr>";
    $i=$i+1;
}
echo "</table>";
}
}
?>