

<?php
session_start();
include "../connectDB.php";
$index = $_GET['index'];
$deleteSNV="delete from sach where idsach='$index' ";
$kq=mysqli_query($conn,$deleteSNV);
if($kq){
    echo'<script>alert("Thành công"); window.location.href="DSSachNV.php" </script>';

}else{
    echo'<script>alert("Thay đổi thất bại")</script>';
    
}
?>