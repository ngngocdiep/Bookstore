<!doctype html>
<?php
session_start(); // Bắt đầu phiên làm việc
session_destroy(); // Hủy bỏ tất cả dữ liệu phiên làm việc

// Chuyển hướng về trang đăng nhập
header("Location: Login.php");
exit();
?>
