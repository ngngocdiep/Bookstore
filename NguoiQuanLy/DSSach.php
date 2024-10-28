<!doctype html>
<?php
session_start();
include '../connectDB.php';


// Khởi tạo session cho taikhonan nếu chưa có
if (!isset($_SESSION['sach'])) {
    $_SESSION['sach'] = [];
}

// Truy vấn dữ liệu từ bảng taikhoan
$sql="select * from sach where  sach.idsach ";
$data=mysqli_query($conn, $sql);
if ($data) {
    // Lưu dữ liệu vào session
    while ($row = mysqli_fetch_assoc($data)) {
        $_SESSION['sach'][] = $row; 
    }
} else {
    echo "Lỗi truy vấn: " . mysqli_error($conn);
}

// Truy vấn dữ liệu từ bảng nhanvien
$sqlCount = "SELECT COUNT(*) as total FROM sach";
$countResult = mysqli_query($conn, $sqlCount);
$totalEmployees = 0;

if ($countResult) {
    $countRow = mysqli_fetch_assoc($countResult);
    $totalEmployees = $countRow['total']; // Lưu số lượng nhân viên vào biến
} else {
    echo "Lỗi truy vấn: " . mysqli_error($conn);
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
	<link rel="stylesheet" href ="admin.css" >
	

<title>DanhMucSach</title>

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
						<li class="nd1"><a href="DSSach.php">Danh mục Sách</a></li>
						<li><a href="NhapSachAdmin.php">Nhập sách</a></li>
						<li><a href="#">Kiểm kê sách</a></li>
					</ul>		
				</li>			  
				<li ><a href="#"><i class="fa-solid fa-chart-simple"></i>Báo cáo</a>
					<ul class="sub-menu">
						<li ><a href="BCDoanhThuAdmin.php">Doanh thu</a></li>
						<li><a href="#">Tồn kho</a></li>
					</ul>
				</li>
				</ul>
		</div>
     
		<div class="content">
			<div class="div">
				<p class="div-left">DANH MỤC SÁCH</p> 
				<p class="div-right">TỔNG:<?php echo $totalEmployees; ?></p>
		   </div>
		   <?php

			// Kiểm tra xem session có chứa dữ liệu tài khoản nhân viên không
			if (isset($_SESSION['sach']) && !empty($_SESSION['sach'])) {
				echo '<table class="table-5-cols">';
				echo '<thead>
						<tr>
							<th>Mã Sách</th>
							<th>Ngày Nhập</th>
							<th>Nhan Đề</th>
							<th>Thể Loại</th>
							<th>Tác Giả</th>
							<th>Năm Xuất Bản</th>
							<th>Nhà Xuất Bản</th>
							<th>Giá Nhập</th>
							<th>Giá Bán</th>
							<th>Số Lượng</th>
							<th>Chức Năng</th>
						</tr>
					</thead>
					<tbody>';
				foreach ($_SESSION['sach'] as $row) {
					?>
					<tr>
						
						<td><?php echo htmlspecialchars($row["idsach"]); ?></td>
						<td><?php echo htmlspecialchars($row["ngaynhap"]); ?></td>
						<?php 
							$dayin = $row["ngaynhap"];
							$fixedDate = new DateTime($dayin);
							$today = new DateTime();
							$interval = $fixedDate->diff($today);
							?>
							<!-- <td><?php echo $interval->m . " tháng và " . $interval->d . " ngày."; ?></td> -->
						<td><?php echo htmlspecialchars($row["nhande"]); ?></td>
						<td><?php echo htmlspecialchars($row["theloai"]); ?></td>
						<td><?php echo htmlspecialchars($row["tacgia"]); ?></td>
						<td><?php echo htmlspecialchars($row["namxb"]); ?></td>
						<td><?php echo htmlspecialchars($row["nhaxb"]); ?></td>
						<td><?php echo htmlspecialchars($row["gianhap"]); ?></td>
						<td><?php echo htmlspecialchars($row["giaban"]); ?></td>
						<td><?php echo htmlspecialchars($row["slkho"]); ?></td>
						<td>
							<button class="btn-edit" onclick="suaS('<?php echo $row['idsach']; ?>')">Sửa</button>
							<button class="btn-delete" onclick="xoaS('<?php echo $row['idsach']; ?>')">Xóa</button>
						</td>
					</tr>
					<?php
				}
				unset($_SESSION['sach']);
				echo '</tbody></table>';
			} else {
				echo '<p>Không có dữ liệu nào!</p>';
			}
			?>
			 <button class="btn-add" onclick="themS()">Thêm sách</button>
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

		<script>		
		function themS() {
			window.location.href = "NhapSachAdmin.php";
		}
		function suaS(index) {
			window.location.href = "SuaSachAdmin.php?index=" + index;
		}
		function xoaS(index) {
		var xoaS = confirm("Bạn có chắc chắn muốn xóa sách này?");
		if (xoaS) {
			window.location.href = "XoaSAdmin.php?index=" + index;
		}		
	}
	</script>	
</body>
</html>