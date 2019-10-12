<?php 

$conn = new mysqli('localhost', 'root', '', 'apotek_ol');

if($conn->connect_error){
    echo "Error: ".$conn->connect_error;
}

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function search($data) {
    $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$data%'";

    return query($query);
}

# Generate random string, USAGE : $var = random_str(*STRING_LENGTH*, *POSSIBLE CHARACTERS*)
function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

?>