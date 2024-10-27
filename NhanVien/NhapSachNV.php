<!doctype html>
<?php
include '../connectDB.php';
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

			// lấy idsach và slkho từ sach, nếu tồn tại->update, tăng số lương, nếu chưa->insert
			$infor="select idsach, slkho from sach where sach.idsach='$id'";
			$kqinfor=mysqli_query($conn,$infor);
			$soluong=0;
			if(mysqli_num_rows($kqinfor) > 0){
				$row = mysqli_fetch_assoc($kqinfor);
				$slkho=$row['slkho'];
				$soluong=$slkho+$sl;
				$updatesach="update sach set slkho='$soluong' where idsach='$id'";
				$update=mysqli_query($conn,$updatesach);
	
				if ($update) {
					echo '<script>alert("Thêm mới thành công"); window.location.href="NhapSachNV.php"</script>';
				} else {
					echo '<script>alert("Thêm mới thất bại"); window.location.href="NhapSachNV.php"</script>';
				}
			} else{
				// B4: tạo câu lệnh sql để thực hiện chèn dl vào bảng
				$sql1 = "INSERT INTO sach (idsach,theloai,tacgia,nhande,namxb,nhaxb,gianhap,giaban,slkho) 
				VALUES ('$id','$ls','$tg','$nd','$namxb','$nhaxb','$gn','$gb','$sl')";
				$kq1 = mysqli_query($conn, $sql1);
				if ($kq1) {
					echo '<script>alert("Thêm mới thành công"); window.location.href="NhapSachNV.php"</script>';
				} else {
					echo '<script>alert("Thêm mới thất bại"); window.location.href="NhapSachNV.php"</script>';
				}
			}
			$insertPN="insert into phieunhap (	idsach,	ngaynhap,	soluongnhap,	thanhtien	) 
			values ('$id','$nn','$sl','$thanhtien')";

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
				<a href="../Logout.php"><i class="fa-solid fa-right-from-bracket" ></i></a>
				<a href="HoSoUser.php"><i class="fa-solid fa-user"></i></a>
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
						<li ><a href="DSSachNV.php">Danh mục Sách</a></li>
						<li ><a href="NhapSachNV.php" style="background-color: #a96c7c;">Nhập sách</a></li>
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
		<form method="post" action="" enctype="multipart/form-data">
		<div class="content">
			<h4>NHẬP THÊM SÁCH</h4>
			<div class="form-container">
				<div class="form-group">
					<label for="idsach">ID sách</label>
					<input type="text" id="id-sach" name="txtIdsach" >
				</div>
				<div class="form-group">
					<label for="ngaynhap">Ngày nhập</label>
					<input type="date" id="ngay-nhap" name="txtNgaynhap" >
				</div>
				<div class="form-group">
					<label for="nhan-de">Nhan đề</label>
					<input type="text" id="nhan-de" name="txtNhande">
				</div>
				<div class="form-group">
					<label for="loai-sach">Loại sách</label>
					<select id="loai-sach" name="ddlsach">
						<option >---Chọn loại sách---</option>
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
					<input type="text" id="tacgia" name="txtTacgia" >
				</div>
				<div class="form-group">
					<label for="nha-xuat-ban">Nhà xuất bản</label>
					<input type="text" id="nha-xuat-ban" name="txtNhaxb" >
				</div>
				<div class="form-group">
					<label for="nam-xuat-ban">Năm xuất bản</label>
					<input type="text" id="nam-xuat-ban" name="txtNamxb" >
				</div>
				<div class="form-group ">
					<label for="gia-bia">Giá nhập</label>
					<input type="text" id="gia-bia" name="txtGianhap" oninput="updateThanhTien()">
				</div>
				<div class="form-group">
					<label for="giaban">Giá bán</label>
					<input type="text" id="giaban" name="txtGiaban">
				</div>
				<div class="form-group">
					<label for="soluong">Số lượng nhập</label>
					<input type="number" id="soluong" name="txtSoluong" oninput="updateThanhTien()" >
				</div>
				<div class="form-group">
					<label for="thanh-tien">Thành tiền</label>
					<input type="number" id="thanh-tien" name="txtThanhtien"  readonly>
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