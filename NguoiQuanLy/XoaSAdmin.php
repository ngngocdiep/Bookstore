

<?php
session_start();
include "../connectDB.php";
$index = $_GET['index'];
$deleteSAdmin="delete from sach where idsach='$index' ";
$kq=mysqli_query($conn,$deleteSAdmin);
if($kq){
    echo'<script>alert("Thành công"); window.location.href="DSSach.php" </script>';

}else{
    echo'<script>alert("Thay đổi thất bại")</script>';
    
}
?>