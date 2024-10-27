<?php
session_start();
$con=mysqli_connect('localhost','root','','qlnhasach') or die("Kết nối thất bại");	
$idtk = $_SESSION['idtaikhoan'];
$sql="Select matkhau From taikhoan Where idtaikhoan='$idtk'";
    $data=mysqli_query($con,$sql);
    $row = mysqli_fetch_object($data);
    $old_pass =$row->matkhau;	

if (isset($_POST['btnLuu'])) {
    // Lấy dữ liệu từ biểu mẫu
    $current_password = $_POST["txtMkCu"];
    $new_password = $_POST["txtMkMoi"];
    $confirm_new_password = $_POST["txtXnMk"];

    // So sánh mật khẩu
    if ($current_password == $old_pass) {
        // Kiểm tra mật khẩu mới và xác nhận mật khẩu
        if ($new_password === $confirm_new_password) {
            // // Mã hóa mật khẩu mới
            // $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Cập nhật mật khẩu mới vào cơ sở dữ liệu
            $sql = "UPDATE taikhoan SET matkhau = '$new_password' WHERE idtaikhoan = '$idtk'";
            $data=mysqli_query($con,$sql);
            if ($data) {
                // $success_message = "";
                echo'<script>alert("Đã đổi mật khẩu thành công!")</script>';
            } else {
                // $error_message = "";
                echo'<script>alert("Có lỗi xảy ra khi đổi mật khẩu. Vui lòng thử lại sau.")</script>';
            }
        } else {
            // $error_message = "";
            echo'<script>alert("Xác nhận mật khẩu mới không khớp. Vui lòng kiểm tra lại.")</script>';
        }
    } else {
        // $error_message = "";
        echo'<script>alert("Mật khẩu hiện tại không đúng. Vui lòng kiểm tra lại.")</script>';
    }
}

// // Đóng kết nối
// $con->close();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href ="user.css" >
	

<title>Đổi mật khẩu</title>

</head>

<body>
	<div class="td">
		<h3 class="chu">NHÀ SÁCH CÓ ĐỦ CẢ</h3>
			<div class="tieude1">
				<!-- <i class="fa-solid fa-magnifying-glass"></i>
				<input type="text" id="timkiem" name="timkiem" class="td2" placeholder="Tìm kiếm tựa sách, tác giả, thể loại">
				<button class="tk">Tìm</button> -->
				<div class="search-container">
					<input type="text" class="search-input" placeholder="Nhập tên sản phẩm">
					<button class="search-button">Tìm kiếm</button>
				</div>
				<i class="fa-solid fa-envelope"></i>
				<i class="fa-solid fa-bell"></i>
				<a href="../Logout.php"><i class="fa-solid fa-right-from-bracket" ></i></a>
				<a href="HoSoUser.php"><i class="fa-solid fa-user"></i></a>
			</div>
	</div>
	
	<div class="nd">
			<div class="menu">
			<ul>
				<li ><a href="TrangChuUser.php"><i class="fa-solid fa-house"></i>Trang Chủ</a></li>
				<li><a href="#"><i class="fa-solid fa-store"></i>Bán Hàng</a>
					<ul class="sub-menu" style="display: block;">
						<li><a href="HoaDon.php">Lập hóa đơn bán hàng</a></li>
						<li ><a href="DanhSachHoaDon.php">Quản lý đơn hàng</a></li>
						<li><a href="#">Xử lý hoàn trả hàng</a></li>
					</ul>
				</li>
		
				<li><a href="#"><i class="fa-solid fa-swatchbook"></i>Quản Lý Sách</a>
					<ul class="sub-menu">
						<li><a href="DSSachNV.php">Danh mục Sách</a></li>
						<li><a href="NhapSachNV.php">Nhập sách</a></li>
						<li><a href="#">Kiểm kê sách</a></li>
					</ul>		
				</li>			  
				<li ><a href="#"><i class="fa-solid fa-chart-simple"></i>Báo cáo</a>
					<ul class="sub-menu">
						<li ><a href="BCDTNV.php">Doanh thu</a></li>
						<li><a href="#">Tồn kho</a></li>
					</ul>
				</li>
				<li ><a href="#"><i class="fa-solid fa-user" id="fa-user"></i>Tài khoản</a>
					<ul class="sub-menu">
						<li><a href="HoSoUser.php">Hồ sơ</a></li>
						<li class="nd1"><a href="DoiMK.php">Đổi mật khẩu</a></li>
					</ul>
				</li>
			</ul>
			</div>
			<div class="content">
				<h4>ĐỔI MẬT KHẨU</h4>
				<form method="post" action="">
                    <table width="70%">
                        <tr>
                            <td class="col1">
                                <label for="myEmail">Mật khẩu cũ</label>
                            </td>
                            <td>
                                <input type="password" id = "myEmail" name="txtMkCu" class="form-control" placeholder="Mật khẩu cũ" >
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label for="myEmail">Mật khẩu mới</label>
                            </td>
                            <td>
                                <input type="password" id = "myEmail" name="txtMkMoi" class="form-control" placeholder="Mật khẩu mới" >
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label for="myEmail">Xác nhận mật khẩu</label>
                            </td>
                            <td>
                                <input type="password" id = "myEmail" name="txtXnMk" class="form-control" placeholder="Xác nhận mật khẩu" >
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="btnLuu" class="btn btn-secondary">
                                    <img src="./Picture/save.png" alt="">
                                    Lưu</button>
                                
                            </td>
                        </tr>
                    </table>
				</form>
		</div>
	</div>
	<!-- Footer -->
		<div class="container1">
			<footer class="py-31 my-41">
				<ul class="logo"><img src="logoCoducanentrang.png" width="20%"></ul>
				<ul class="nav justify-content-center1 border-bottom1 pb-31 mb-31">
				<li class="nav-item1"><a href="#" class="nav-link1 px-2 text-body-secondary">Home</a></li>
				<li class="nav-item1"><a href="#" class="nav-link1 px-2 text-body-secondary">FAQs</a></li>
				<li class="nav-item1"><a href="#" class="nav-link1 px-2 text-body-secondary">About</a></li>
				</ul>
				<p class="text-center1 text-body-secondary1">© 2024 Company, Inc</p>
			</footer>
		</div>
		
</body>
</html>