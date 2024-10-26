
<?php
session_start();

if (isset($_GET['index']) && isset($_SESSION['products'])) {
    $index = $_GET['index'];

    // Xóa sản phẩm khỏi mảng session
    if (isset($_SESSION['products'][$index])) {
        unset($_SESSION['products'][$index]);
        $_SESSION['products'] = array_values($_SESSION['products']); // Để tái lập chỉ số mảng
    }

    // Quay về trang hóa đơn
    header("Location: HoaDon.php");
    exit();
}
?>