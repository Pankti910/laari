<?php
$con=mysqli_connect("localhost","root","","project");
if($con){
$qry="select * from items";
$res=mysqli_query($con,$qry);
while($row=mysqli_fetch_array($res)){
echo "<div class='s-12 m-12 l-4 xl-3 xxl-3'>";
echo "<a href='show_laari.php' target='_blank'><img class='full-img' src='img/gallery-1.svg'></a>";
echo "<h3>$row[3]</h3>";
$arr=unserialize($row[11]);
$str=implode(',',$arr);
echo "<p>$str</p>";
echo "<form class='customform s-12 margin-bottom2x' action=''>";
echo "</form>";
echo "</div>";
}
}
else{
echo "Connection Failed";
}
?>