<?php
$val=1;
$dsn="mysql:host=localhost;dbname=project";
$user="root";
$pwd="";
$con=new PDO($dsn,$user,$pwd);
$query="SHOW TABLES";
$statement = $con->prepare($query);
$statement->execute();
$tables = $statement->fetchAll(PDO::FETCH_NUM);
$i=1;
echo "<table class='table'>";
echo        "<thead>";
echo                "<tr>";
echo                         " <th>Index</th>";
echo                         " <th>Table name</th>";
echo                        "</tr>";
echo                  "</thead>";
foreach($tables as $table){





echo                  "<tbody>";
echo                    "<tr>";
echo                  "<th scope='row'>$i</th>";
echo "<td>";
echo "<a href=table_show.php?table=".$table[0].">";
    echo $table[0]."</a>";
    echo "</td>";
echo                    "</tr>";
echo                  "</tbody>";
$i++;
}
echo                "</table>";


echo "<table class='table'>";
echo "<table>";
?>