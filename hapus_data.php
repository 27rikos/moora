<?php 
include("koneksi.php");
$id=$_GET['id'];
$sql=mysqli_query($conn,"delete from alternatif where NIS='$id'");
if($sql==true){
    header("location:data.php");
}