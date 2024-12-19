<?php 
include 'connection.php';
$user_id = $_GET['id'];

$query_delete = "DELETE from contacts where user_id = '$user_id'";
    $deletedata = mysqli_query($conn, $query_delete);
    if ($deletedata) {
        $status = 'berhasil';
         $msg = "Data berhasil di hapus..";
    } else {
        $status = 'error';
        $msg = "Gagal Menghapus data...";
    }

header("location:result.php");
exit();
