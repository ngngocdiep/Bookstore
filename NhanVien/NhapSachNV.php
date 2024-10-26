<!doctype html>
<?php
session_start();
include '../connectDB.php';
$id="";$nn="";$nd="";$ls="";$tg="";$nhaxb="";$namxb="";$gn="";$gb="";$sl="";$tt="";
if(isset($_POST["btnLuu"])){
		//B2: lấy dữ liệu từ các điều khiển đưa vào biến
		$id=$_POST['txtIdsach'];
		$nn=$_POST['txtNgaynhap'];
		$nd=$_POST['txtNhande'];
		$ls=$_POST['ddlsach'];
		$tg=$_POST['txtTacgia'];
		$nhaxb=$_POST['txtNhaxb'];
		$namxb=$_POST['txtNamxb'];
		$gn=$_POST['txtGianhap'];
		$gb=$_POST['txtGiaban'];
		$sl=$_POST['txtSoluong'];
		$tt=$_POST['txtThanhtien'];

		
		
		// Kiểm tra xem ngày nhập có nhỏ hơn ngày mai không
		$today = strtotime(date("Y-m-d"));
		$inputDate = strtotime($nn);
		$tomorrow = strtotime("+1 day", $today);
	
		if ($inputDate >= $tomorrow) {
			echo '<script>alert("Thất bại. Ngày nhập không hợp lệ.")</script>';
		} else {
			// B4: tạo câu lệnh sql để thực hiện chèn dl vào bảng
			$sql1 = "INSERT INTO sach VALUES ('$id', '$nn', '$nd', '$ls', '$tg', '$nhaxb', '$namxb', '$gn', '$gb', '$sl', '$tt')";
			$kq1 = mysqli_query($conn, $sql1);
	
			if ($kq1) {
				echo '<script>alert("Thêm mới thành công")</script>';
			} else {
				echo '<script>alert("Thêm mới thất bại")</script>';
			}
		}
	}
	
	
	//B5: đóng kết nối
	mysqli_close($conn);
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
	

<title>NhapSach</title>

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
				<i class="fa-solid fa-right-from-bracket"><a href=""></a></i>
				<i class="fa-solid fa-user"></i>
			</div>
	</div>
	
	<div class="nd">
		<div class="menu">
			<ul>
				<li ><a href="TrangChuUser.php"><i class="fa-solid fa-house"></i>Trang Chủ</a></li>
				<li ><a href="DanhSachHoaDon.php"><i class="fa-solid fa-store"></i>Bán Hàng</a>
					<ul class="sub-menu">
						<li><a href="HoaDon.php">Lập hóa đơn bán hàng</a></li>
						<li><a href="DanhSachHoaDon.php">Quản lý đơn hàng</a></li>
						<li><a href="#">Xử lý hoàn trả hàng</a></li>
					</ul>
				</li>
		
				<li class ="nd1"><a href="DSSachNV.php"><i class="fa-solid fa-swatchbook"></i>Quản Lý Sách</a>
					<ul class="sub-menu">
						<li ><a href="DSSachNV.php">Danh sách Sách</a></li>
						<li ><a href="NhapSachNV.php">Nhập sách</a></li>
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
			<div class="form-container">
				<div class="form-group">
					<label for="idsach">ID sách</label>
					<input type="text" id="id-sach" name="txtIdsach" value="<?php echo $id ?>">
				</div>
				<div class="form-group">
					<label for="ngaynhap">Ngày nhập</label>
					<input type="date" id="ngay-nhap" name="txtNgaynhap" value="<?php echo $nn ?>">
				</div>
				<div class="form-group">
					<label for="nhan-de">Nhan đề</label>
					<input type="text" id="nhan-de" name="txtNhande" value="<?php echo $nd ?>">
				</div>
				<div class="form-group">
					<label for="loai-sach">Loại sách</label>
					<select id="loai-sach" name="ddlsach">
						<option value="">---Chọn loại sách---</option>
						<option value="" <?php if($ls=='Ngôn tình') echo 'selected' ?>>Ngôn tình</option>
						<option value="" <?php if($ls=='Trinh thám') echo 'selected' ?>>Trinh thám</option>
						<option value="" <?php if($ls=='Tiểu thuyết') echo 'selected' ?>>Tiểu thuyết</option>
						<option value="" <?php if($ls=='Khác') echo 'selected' ?>>Khác</option>
					</select>
				</div>
				<div class="form-group">
					<label for="stacgia">Tác giả</label>
					<input type="text" id="tacgia" name="txtTacgia" value="<?php echo $tg ?>">
				</div>
				<div class="form-group">
					<label for="nha-xuat-ban">Nhà xuất bản</label>
					<input type="text" id="nha-xuat-ban" name="txtNhaxb" value="<?php echo $nhaxb ?>">
				</div>
				<div class="form-group">
					<label for="nam-xuat-ban">Năm xuất bản</label>
					<input type="text" id="nam-xuat-ban" name="txtNamxb" value="<?php echo $namxb ?>">
				</div>
				<div class="form-group ">
					<label for="gia-bia">Giá nhập</label>
					<input type="text" id="gia-bia" name="txtGianhap" value="<?php echo $gn ?>">
				</div>
				<div class="form-group">
					<label for="giaban">Giá bán</label>
					<input type="text" id="giaban" name="txtGiaban" value="<?php echo $gb ?>">
				</div>
				<div class="form-group">
					<label for="soluong">Số lượng nhập</label>
					<input type="text" id="soluong" name="txtSoluong" value="<?php echo $sl ?>">
				</div>
				<div class="form-group">
					<label for="thanh-tien">Thành tiền</label>
					<input type="text" id="thanh-tien" name="txtThanhtien" value="<?php echo $tt ?>">
				</div>
			</div>
			<div class="buttons-container">
				<button type="submit" name="btnLuu">Lưu</button>
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

</body>
</html>