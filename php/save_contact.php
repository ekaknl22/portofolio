<?php
require 'connection.php';

$user_id = $_POST["user_id"];
$name = $_POST["name"];
$email = $_POST["email"];
$interest = $_POST["interest"];

$query_sql = "INSERT INTO contacts(user_id, name, email, interest) VALUES ('$user_id', '$name', '$email', '$interest')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: result.php");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}
