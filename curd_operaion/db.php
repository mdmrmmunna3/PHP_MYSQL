<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'crud_operation';

$conn = mysqli_connect($server, $username, $password, $database);

if ($conn->connect_error) {
    die('database failed to connect!' . $conn->connect_error);
} else {
    echo "database successfully connect ";
}

?>