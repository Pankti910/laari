<?php
function url_to_link($text)
{
	 $text = preg_replace(
  '#((https?|ftp)://(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)#i',
  "<a href=\"$1\" target=\"_blank\">$3</a>$4",
  $text);
	 return $text;
} 
?>