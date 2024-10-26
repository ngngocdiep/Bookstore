<?php
session_start();
include "../connectDB.php";
$index = $_GET['index'];
$deleteNV="delete from nhanvien where manv='$index' ";
$kq=mysqli_query($conn,$deleteNV);
if($kq){
    echo'<script>alert("Đã xóa nhân viên"); window.location.href="DSNhanVien.php" </script>';

}else{
    echo'<script>alert("Thay đổi thất bại")</script>';
    
}
?>