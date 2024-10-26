<!doctype html>
<?php
session_start();
// include '../connectDB.php';
// $sql="select * from sach ";
// $data=mysqli_query($conn,$sql);
// if ($data && mysqli_num_rows($data) > 0) {
// 	$row = mysqli_fetch_object($data);
// 	$emailcu = $row->email;
// 	$idnv = $row->idnv;
// 	$matkhaucu = $row->matkhau;
// 	$tennv = $row->tennv;
// 	$chucvucu = $row->chucvunv;
// 	$ngaysinhcu= $row->ngaysinh;
// 	$diachicu= $row->diachinv;
// 	$sdtcu= $row->sdt;
// 	$gtcu= $row->gioitinh;
// $_SESSION['email']=$emailcu;
// $_SESSION['idnv']=$idnv;
// $_SESSION['tennv']=$tennv;
// $_SESSION['sdt']=$sdtcu;
// $_SESSION['ngaysinh']=$ngaysinhcu;
// $_SESSION['diachinv']=$diachicu;
// $_SESSION['gioitinh']=$diachicu;
// }

// //kiểm tra người dùng ấn vào nút lưu 
// if(isset($_POST['btnLuu'])){
// 	//lấy các giá trị trên đk đưa vào biến
	
// 	$ten=$_POST['txtTennguoidung'];
// 	$sdt=$_POST['txtSdt'];
// 	$ngs=$_POST['txtNgaysinh'];
// 	$gt=$_POST['ddlGioitinh'];
// 	$dc=$_POST['txtDiachi'];
// 	//thực hiện câu lệnh sql lưu data vào bảng trong db
// 	$sql1="Update nhanvien Set tennv='$ten',sdt='$sdt',ngaysinh='$ngs',gioitinh='$gt',diachinv='$dc' Where nhanvien.idnv='$idnv'";
// 	$kq=mysqli_query($con,$sql1);
// 	if($kq){
// 		echo'<script>alert("Thay đổi thành công")</script>';
// 	}else{
// 		echo'<script>alert("Thay đổi thất bại")</script>';
// 	}
// }
// //đóng kết nối
// mysqli_close($con);
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
		<div class="content">
			<div class="form-container">
				<div class="form-group">
					<label for="ngaynhap">Ngày nhập</label>
					<input type="date" id="ngay-nhap">
				</div>
				<div class="form-group">
					<label for="nhan-de">Nhan đề</label>
					<input type="text" id="nhan-de">
				</div>
				<div class="form-group">
					<label for="loai-sach">Loại sách</label>
					<select id="loai-sach">
						<option value="">Chọn loại sách</option>
					</select>
				</div>
				<div class="form-group">
					<label for="stacgia">Tác giả</label>
					<input type="text" id="tacgia">
				</div>
				<div class="form-group">
					<label for="nha-xuat-ban">Nhà xuất bản</label>
					<input type="text" id="nha-xuat-ban">
				</div>
				<div class="form-group">
					<label for="nam-xuat-ban">Năm xuất bản</label>
					<input type="text" id="nam-xuat-ban">
				</div>
				<div class="form-group ">
					<label for="gia-bia">Giá nhập</label>
					<input type="text" id="gia-bia">
				</div>
				<div class="form-group">
					<label for="giaban">Giá bán</label>
					<input type="text" id="giaban">
				</div>
				<div class="form-group">
					<label for="soluong">Số lượng nhập</label>
					<input type="text" id="soluong">
				</div>
				<div class="form-group">
					<label for="thanh-tien">Thành tiền</label>
					<input type="text" id="thanh-tien">
				</div>
			</div>
			<div class="buttons-container">
				<button name="btnLuu">Lưu</button>
				</div>
		</div>
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