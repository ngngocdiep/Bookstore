<!doctype html>
<?php
session_start();

	// kết nối database
	$con=mysqli_connect('localhost','root','','qlnhasach') or die("Kết nối thất bại");	
    $idtk = $_SESSION['idtaikhoan'];
	$sql="Select * From nhanvien, taikhoan where taikhoan.idtaikhoan='$idtk' and taikhoan.idnv=nhanvien.idnv";

	// $sql="Select * From nhanvien Where id='$idtk'";
    $data=mysqli_query($con,$sql);
    if ($data && mysqli_num_rows($data) > 0) {
        $row = mysqli_fetch_object($data);
        $emailcu = $row->email;
		$idnv = $row->idnv;
        $matkhaucu = $row->matkhau;
        $tennv = $row->tennv;
        $chucvucu = $row->chucvunv;
        $ngaysinhcu= $row->ngaysinh;
        $diachicu= $row->diachinv;
        $sdtcu= $row->sdt;
        $gtcu= $row->gioitinh;
    $_SESSION['email']=$emailcu;
	$_SESSION['idnv']=$idnv;
    $_SESSION['tennv']=$tennv;
    $_SESSION['sdt']=$sdtcu;
    $_SESSION['ngaysinh']=$ngaysinhcu;
    $_SESSION['diachinv']=$diachicu;
	$_SESSION['gioitinh']=$diachicu;
    }
	
	//kiểm tra người dùng ấn vào nút lưu 
	if(isset($_POST['btnLuu'])){
		//lấy các giá trị trên đk đưa vào biến
		
		$ten=$_POST['txtTennguoidung'];
		$sdt=$_POST['txtSdt'];
		$ngs=$_POST['txtNgaysinh'];
		$gt=$_POST['ddlGioitinh'];
		$dc=$_POST['txtDiachi'];
		//thực hiện câu lệnh sql lưu data vào bảng trong db
		$sql1="Update nhanvien Set tennv='$ten',sdt='$sdt',ngaysinh='$ngs',gioitinh='$gt',diachinv='$dc' Where nhanvien.idnv='$idnv'";
		$kq=mysqli_query($con,$sql1);
		if($kq){
			echo'<script>alert("Thay đổi thành công")</script>';
		}else{
			echo'<script>alert("Thay đổi thất bại")</script>';
			
		}
	}
	//đóng kết nối
	mysqli_close($con);
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
	<link rel="stylesheet" href ="admin.css" >
	<style>
        *{margin: 0px;}
        .menu_left{
            width: 300px;
        }
        .content{
            padding-top: 30px;
            padding-left: 30px;
            vertical-align: top;
        }
        .col1{
            width: 150px;
            color: black;
        }
    </style>
    <link rel="stylesheet" href="./Css/bootstrap.min.css">

<title>HỒ SƠ ADMIN</title>

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
				<li ><a href="TrangChuAdmin.php"><i class="fa-solid fa-house"></i>Trang Chủ</a></li>
				<li ><a href="#"><i class="fa-solid fa-person"></i>Quản Lý Nhân Viên</a>
					<ul class="sub-menu">
						<li><a href="DSNhanVien.php">Danh sách nhân viên</a></li>
						<li><a href="DSTaiKhoanNV.php">Danh sách tài khoản nhân viên</a></li>
						<li><a href="ChamCongNV.php">Chấm công nhân viên</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="fa-solid fa-cart-shopping"></i>Quản Lý Đơn Hàng</a>
					<ul class="sub-menu">
						<li><a href="DSDonHang.php">Danh sách đơn hàng</a></li>
						<li><a href="#">Xử lý hoàn/hủy đơn</a></li>
					</ul>		
				</li>	
				<li><a href="#"><i class="fa-solid fa-swatchbook"></i>Quản Lý Sách</a>
					<ul class="sub-menu">
						<li><a href="DSSach.php">Danh sách Sách</a></li>
						<li><a href="NhapSachAdmin.php">Nhập sách</a></li>
						<li><a href="#">Kiểm kê sách</a></li>
					</ul>		
				</li>			  
				<li ><a href="#"><i class="fa-solid fa-chart-simple"></i>Báo cáo</a>
					<ul class="sub-menu">
						<li><a href="BCDoanhThuAdmin.php">Doanh thu</a></li>
						<li><a href="#">Tồn kho</a></li>
					</ul>
				</li>
				</ul>
			</div>
			<div class="content">
				<h4>THÔNG TIN HỒ SƠ</h4>
			<!--  form tùy chỉnh tại đây -->
            <form method="post" action="">
                    <table width="70%">
                        <tr>
                            <td class="col1">
                                <label for="myEmail">Email</label>
                            </td>
                            <td>
                                <input type="email" id = "myEmail" name="txtEmail" disabled class="form-control" placeholder="Email" value="<?php echo $_SESSION['email'] ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label for="myEmail">Tên người dùng</label>
                            </td>
                            <td>
                                <input type="text" id = "myEmail" name="txtTennguoidung" class="form-control" placeholder="Tên người dùng" value="<?php echo $_SESSION['tennv'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="col1">
                                <label for="myEmail">Số điện thoại</label>
                            </td>
                            <td>
                                <input type="tel" id = "myEmail" name="txtSdt" class="form-control"  placeholder="Số điện thoại" value="<?php echo $_SESSION['sdt'] ?>">
                            </td>
                        </tr>
						<tr>
                            <td class="col1">
                                <label for="myEmail">Ngày sinh</label>
                            </td>
                            <td>
                                <input type="date" id = "myEmail" name="txtNgaysinh" class="form-control" min="1900-01-01" max="2020-12-31" placeholder="Ngày sinh" value="<?php echo $_SESSION['ngaysinh'] ?>">
                            </td>
                        </tr>
						<tr>
                            <td class="col1">
                                <label for="myEmail">Giới tính</label>
                            </td>
                            <td>
								<select name="ddlGioitinh" id="">
									<option value="">---Chọn giới tính</option>
									<option value="Nam" <?php if($gtcu=='Nam') echo 'selected' ?>>Nam</option>
									<option value="Nữ"  <?php if($gtcu=='Nữ') echo 'selected' ?>>Nữ</option>
									<option value="Khác" <?php if($gtcu=='Khác') echo 'selected' ?>>Khác</option>
								</select>
                            </td>
                        </tr>
						<tr>
                            <td class="col1">
                                <label for="myEmail">Địa chỉ</label>
                            </td>
                            <td>
                                <input type="text" id = "myEmail" name="txtDiachi" class="form-control" placeholder="Địa chỉ" value="<?php echo $_SESSION['diachinv'] ?>">
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