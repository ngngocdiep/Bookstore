<?php
session_start();
include "../connectDB.php";
$index = $_GET['index'];
$deleteTKNV="delete from taikhoan where idtaikhoan='$index' ";
$kq=mysqli_query($conn,$deleteTKNV);
if($kq){
    echo'<script>alert("Đã xóa tài khoản"); window.location.href="DSTaiKhoanNV.php" </script>';

}else{
    echo'<script>alert("Thay đổi thất bại")</script>';
    
}
?>