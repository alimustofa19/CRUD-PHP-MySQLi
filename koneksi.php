<?php
$koneksi = mysqli_connect("localhost", "root", "", "book_store");
if (mysqli_connect_errno()){
    echo "Koneksi Gagal";
}
?>