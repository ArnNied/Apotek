<?php 

require 'conn.php';

echo(random_str(5, "=][';")."<br>");

$i = 1;
$j = $i++;
$i = 1;
$k = ++$i;

echo "j = $j k = $k";

?>