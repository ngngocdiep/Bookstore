<!doctype html>
<?php
session_start();
include_once 'connectDB.php';
$name = $_REQUEST["txtEmail"];
$pass = $_REQUEST["txtMatkhau"];
$sql = "SELECT * FROM taikhoan WHERE email = '$name' AND matkhau = '$pass'";
$result_name = mysqli_query($conn, $sql);

if ($result_name && mysqli_num_rows($result_name) > 0) {
    $row = mysqli_fetch_object($result_name);
    $idtaikhoan = $row->idtaikhoan;
    $gmail = $row->email;
    $Matkhau = $row->matkhau;
    $idQuyen = $row->idquyen;
	$namend= $row->tennguoidung;
	$_SESSION['tentk']=$namend;
//	$_SESSION['Tennguoidung']=$namend;
//
    $_SESSION['idtaikhoan'] = $idtaikhoan;
//    $_SESSION['idQuyen'] = $idQuyen;

    if ($idQuyen == '2') {
        header("Location: NguoiQuanLy/TrangChuAdmin.php"); // Chuyển hướng đến trang quản lý admin
    } elseif ($idQuyen == '1') {
        header("Location: NhanVien/TrangChuUser.php"); // Chuyển hướng đến trang quản lý người dùng
    } else {
        header("Location: Login.php"); // Hoặc xử lý theo ý bạn đối với các trường hợp khác
    }
} else {
    header("Location: Login.php");
}

mysqli_close($conn);
?>

						 
?>
//session_start();
//$conn = mysqli_connect("localhost", "root", "") or die("disconnect");
//mysqli_select_db($conn, "library") or die("not found");
//if($_SERVER["REQUEST_METHOD"] == "POST") {
//    
//
//   
//
//    // Lấy dữ liệu từ form đăng nhập
//	$gmail = isset($_POST["emaildn"]) ? $_POST["emaildn"] : "";
//	$Matkhau = isset($_POST["passdn"]) ? $_POST["passdn"] : "";
//
//    // Truy vấn kiểm tra thông tin đăng nhập
//    $sql = "SELECT  Matkhau FROM taikhoan WHERE taikhoan.gmail='$gmail' ";
//    $result = $conn->query($sql);
//
//    if ($result->num_rows > 0) {
//        $row = $result->fetch_assoc();
//        if(password_verify($Matkhau, $row["Matkhau"])==true) {
//            // Lưu thông tin đăng nhập vào session
//            $_SESSION["loggedin"] = true;
//            $_SESSION["idQuyen"] = $row["idQuyen"];
//            $_SESSION["gmail"] = $row["gmail"];
//			
//
//            // Chuyển hướng đến trang chính
//            header("location: QuanLiNguoiDung.php");
//        } else {
//            echo "Mật khẩu không đúng";
//        }
//    } else {
//        echo "Tên đăng nhập không tồn tại";
//    }
//	
//    // Đóng kết nối
//    $conn->close();
//	
//
//}