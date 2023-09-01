<?php 
include("koneksi.php");
$id=$_GET['id'];
$sql=mysqli_query($conn,"delete from nilai_kriteria where id_nilai='$id'");
if($sql==true){
    header("location:kriteria.php");
}