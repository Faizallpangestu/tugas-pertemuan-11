<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_pointcoffe";
$koneksi = mysqli_connect($host,$user,$pass,$db);

if (!$koneksi){
    die("Koneksi dengan database gagal: ".mysqli_connect_error());
}

?>