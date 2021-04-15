<?php
if(file_exists("itemfile.txt") && file_exists("pricefile.txt")){
unlink("itemfile.txt");
unlink("pricefile.txt");
}
?>