<!doctype html>
<?php
session_start();
include "../connectDB.php";
$index = $_GET['index'];
$sql="Select * From sach where idsach='$index'";
$data=mysqli_query($conn,$sql);
if ($data && mysqli_num_rows($data) > 0) {
	$row = mysqli_fetch_object($data);
	$idsach = $row->idsach;
	$ngaynhap = $row->ngaynhap;
	$nhande = $row->nhande;
	$theloai = $row->theloai;
	$tacgia = $row->tacgia;
	$nhaxb= $row->nhaxb;
	$namxb= $row->namxb;
	$gianhap= $row->gianhap;
	$giaban= $row->giaban;
	$sl= $row->slkho;
}
if(isset($_POST['btnLuu'])){
	//lấy các giá trị trên đk đưa vào biến
	// $manv=$_POST['txtManv'];
	$ngaynhapmoi=$_POST['ngaynhap'];
	$nhandemoi=$_POST['nhande'];
	$theloaimoi=$_POST['theloai'];
	$tacgiamoi=$_POST['tacgia'];
	$nhaxbmoi=$_POST['nhaxb'];
	$namxbmoi=$_POST['namxb'];
	$gianhapmoi=$_POST['gianhap'];
	$giabanmoi=$_POST['giaban'];
	$slmoi=$_POST['sl'];
	//thực hiện câu lệnh sql lưu data vào bảng trong db
	$sql1="Update sach Set ngaynhap='$ngaynhapmoi',nhande='$nhandemoi',theloai='$theloaimoi',tacgia='$tacgiamoi',nhaxb='$nhaxbmoi',
	namxb='$namxbmoi',gianhap='$gianhapmoi',giaban='$giabanmoi',slkho='$slmoi' Where sach.idsach='$index'";
	
	$kq=mysqli_query($conn,$sql1);
	if($kq){

		echo'<script>alert("Thay đổi thành công"); window.location.href="DSSachNV.php" </script>';

	}else{
		echo'<script>alert("Thay đổi thất bại")</script>';
		
	}
}
?>
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
	

<title>SuaSachNV</title>

</head>

<body>
	<div class="td">
		<h3 class="chu">NHÀ SÁCH CÓ ĐỦ CẢ</h3>
			<div class="tieude1">
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
				<li ><a href="../NhanVien/BanHang.php"><i class="fa-solid fa-store"></i>Bán Hàng</a>
					<ul class="sub-menu">
						<li><a href="HoaDon.php">Lập hóa đơn bán hàng</a></li>
						<li><a href="DanhSachHoaDon.php">Quản lý đơn hàng</a></li>
						<li><a href="#">Xử lý hoàn trả hàng</a></li>
					</ul>
				</li>
		
				<li><a href="DSSachNV.php"><i class="fa-solid fa-swatchbook"></i>Quản Lý Sách</a>
					<ul class="sub-menu">
						<li ><a href="DSSachNV.php">Danh sách Sách</a></li>
						<li class ="nd1"><a href="NhapSachNV.php">Nhập sách</a></li>
						<li><a href="#">Kiểm kê sách</a></li>
					</ul>		
				</li>			  
				<li ><a href=""><i class="fa-solid fa-chart-simple"></i>Báo cáo</a>
					<ul class="sub-menu">
						<li><a href="#">Danh thu</a></li>
						<li><a href="#">Tồn kho</a></li>
					</ul>
				</li>
				<li ><a href=""><i class="fa-solid fa-user" id="fa-user"></i>Tài khoản</a>
					<ul class="sub-menu">
						<li><a href="HoSoUser.php">Hồ sơ</a></li>
						<li><a href="DoiMK.php">Đổi mật khẩu</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
		<form method="post" action="">
		<div class="content">
			<h4>SỬA THÔNG TIN SÁCH</h4>
			<div class="form-container">
			<div class="form-group">
					<label for="ngaynhap">ID sách</label>
					<input type="text" id="idsach" name="idsach" value="<?php echo $idsach ?>" disabled>
				</div>
				<div class="form-group">
					<label for="ngaynhap">Ngày nhập</label>
					<input type="date" id="ngay-nhap" name="ngaynhap" value="<?php echo $ngaynhap ?>">
				</div>
				<div class="form-group">
					<label for="nhan-de">Nhan đề</label>
					<input type="text" id="nhan-de" name="nhande" value="<?php echo $nhande ?>">
				</div>
				<div class="form-group">
					<label for="loai-sach">Loại sách</label>
					<select id="loai-sach" name="theloai" value="<?php echo $theloai ?>">
					<option ><?php echo $theloai ?></option>
						<option>Ngôn tình</option>
						<option>Trinh thám</option>
						<option >Tiểu thuyết</option>
						<option>Kinh tế</option>
						<option>Văn học</option>
						<option >Chính trị</option>
						<option >Xã hội</option>
						<option>Khác</option>
					</select>
				</div>
				<div class="form-group">
					<label for="stacgia">Tác giả</label>
					<input type="text" id="tacgia" name="tacgia" value="<?php echo $tacgia ?>">
				</div>
				<div class="form-group">
					<label for="nha-xuat-ban">Nhà xuất bản</label>
					<input type="text" id="nha-xuat-ban" name="nhaxb" value="<?php echo $nhaxb ?>">
				</div>
				<div class="form-group">
					<label for="nam-xuat-ban">Năm xuất bản</label>
					<input type="text" id="nam-xuat-ban" name="namxb" value="<?php echo $namxb ?>">
				</div>
				<div class="form-group ">
					<label for="gia-bia">Giá nhập</label>
					<input type="text" id="gia-bia" name="gianhap"  oninput="updateThanhTien()" value="<?php echo $gianhap ?>">
				</div>
				<div class="form-group">
					<label for="giaban">Giá bán</label>
					<input type="text" id="giaban" name="giaban" value="<?php echo $giaban ?>">
				</div>
				<div class="form-group">
					<label for="soluong">Số lượng</label>
					<input type="text" id="soluong" name="sl" oninput="updateThanhTien()" value="<?php echo $sl ?>">
				</div>
				<!-- <div class="form-group">
					<label for="thanh-tien">Thành tiền</label>
					<input type="text" id="thanh-tien" name="tt" readonly>
				</div> -->
			</div>
			<div class="buttons-container">
				<button name="btnLuu">Lưu</button>
				</div>
		</div>
		</form>
	</div>
	
	<!-- Footer -->
		<div class="container1">
			<footer class="py-31 my-41">
				<ul class="logo"><img src="imgNV/logoCoducanentrang.png" width="20%"></ul>
				<ul class="nav justify-content-center1 border-bottom1 pb-31 mb-31">
				<li class="nav-item1"><a href="#" class="nav-link1 px-2 text-body-secondary">Home</a></li>
				<li class="nav-item1"><a href="#" class="nav-link1 px-2 text-body-secondary">FAQs</a></li>
				<li class="nav-item1"><a href="#" class="nav-link1 px-2 text-body-secondary">About</a></li>
				</ul>
				<p class="text-center1 text-body-secondary1">© 2024 Company, Inc</p>
			</footer>
		</div>
		<script>
        function updateThanhTien() {
            // Lấy giá nhập và số lượng từ các input
            const giaNhap = parseFloat(document.getElementById('gia-bia').value) || 0;
            const soLuong = parseFloat(document.getElementById('soluong').value) || 0;

            // Tính thành tiền
            const thanhTien = giaNhap * soLuong;

            // Cập nhật giá trị vào input thành tiền
            document.getElementById('thanh-tien').value = thanhTien.toFixed(2); // Làm tròn đến 2 chữ số thập phân
        }
    </script>

</body>
</html>