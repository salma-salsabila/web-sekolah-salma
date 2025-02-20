<?php 

include_once("koneksi.php");


$id = $_GET['id'];

$result = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa=$id");

?>