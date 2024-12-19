<?php
$host = "localhost";
$database = "travel_agent";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi Gagal : " . $conn->connect_error);
} else {
    echo "";
}

