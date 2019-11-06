<?php 

require 'conn.php';

echo(random_str(5, "=][';")."<br>");

$i = 1;
$j = $i++;
$i = 1;
$k = ++$i;

echo "j = $j k = $k";

$hargaDb = [];
for( $i = 0; $i < strlen($harga); $i++ ) {
    array_push($hargaDb, array_pop($hargaArray));
    if( $i % 3 == 2 ){
        array_push($hargaDb, ".");
    }
}
if( end($hargaDb) == "." ) {
    array_pop($hargaDb);
}
$hargaDb = implode(array_reverse($hargaDb));


?>