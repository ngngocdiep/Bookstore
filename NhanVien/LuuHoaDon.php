<?php
session_start();
include "../connectDB.php";
$idtk = $_SESSION['idtaikhoan'];
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

if (isset($_POST['btnLuu'])) {
	// Lưu vào bảng donhang và bảng chitietdon
	$currentDate = date('Y-m-d H:i:s');
    // Kiểm tra nếu có sản phẩm trong session
    if (isset($_SESSION['products']) && count($_SESSION['products']) > 0) {
        $totalAmount = 0;
		if (isset($_SESSION['products'])) {
			foreach ($_SESSION['products'] as $product) {				
				$totalAmount += $product['tongtien'];
				$nhande=$product['nhande'];
				$soluong=$product['soluong'];
				$tongtien=$product['tongtien'];
				$idsach=$product['idsach'];
			}
		}	
		$insertHoadonSQL = "INSERT INTO donhang (ngaytaodh,idtaikhoan, tongtien) VALUES ('$currentDate','$idtk', '$totalAmount')";
		mysqli_query($conn, $insertHoadonSQL);	
		// Lấy ID hóa đơn vừa tạo
			$iddh = mysqli_insert_id($conn);	
			$_SESSION['iddh']=$iddh;		
			$insertCTDH = "INSERT INTO chitietdon (iddonhang,idsach, soluong, tongtien) VALUES ('$iddh','$idsach','$soluong', '$tongtien')";
			mysqli_query($conn, $insertCTDH);
		
        // Xóa dữ liệu trong session
        unset($_SESSION['products']);
        echo '<script>alert("Dữ liệu đã được lưu thành công!"); window.location.href="HoaDon.php";</script>';
        // header("Location: HoaDon.php") ;
    } else {
        echo '<script>alert("Không có sản phẩm nào để lưu!"); window.location.href="HoaDon.php";</script>';
        // Quay về trang hóa đơn
        
        // header("Location: HoaDon.php") ;
    }
}
?>