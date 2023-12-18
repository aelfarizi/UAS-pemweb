<?php

$host="localhost";
$user="id21684624_db_aelfarizi";
$password="@Fariza59";
$db="id21684624_db_aelfarizi";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
        die("Koneksi Gagal:".mysqli_connect_error());
        
}
?>