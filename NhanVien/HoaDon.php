<!doctype html>
<?php
session_start();

include "../connectDB.php";
$idtk = $_SESSION['idtaikhoan'];
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

if (isset($_POST['btnThemsp'])) {
	// Debugging: Kiểm tra dữ liệu POST
    // var_dump($_POST); // Bỏ comment để kiểm tra dữ liệu gửi lên
    // Kiểm tra xem các giá trị đã được gửi hay chưa
    if (isset($_POST['productID']) && isset($_POST['productQuantity'])) {
        $masach = $_POST['productID'];
        $soluong = $_POST['productQuantity'];

        // Kiểm tra sách trong kho
        $laysach = "SELECT * FROM sach WHERE idsach='$masach'";
        $data_sach = mysqli_query($conn, $laysach);

        if ($data_sach && mysqli_num_rows($data_sach) > 0) {
            $row = mysqli_fetch_object($data_sach);
            $nhande = $row->nhande;
            $giaban = $row->giaban;
            $tongtien = $soluong * $giaban;
            
				// Lưu thông tin sản phẩm vào session
			$_SESSION['products'][] = [
				'nhande' => $nhande,
				'soluong' => $soluong,
				'giaban' => $giaban,
				'tongtien' => $tongtien,
				'idsach'=>$masach			
			];
        } else {
            echo '<script>alert("Không có sách trong kho")</script>';
            // header("Location: HoaDon.php"); 
        }
    } else {
        echo '<script>alert("Vui lòng nhập mã sách và số lượng")</script>';
    }
	mysqli_close($conn);
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
	<link rel="stylesheet" href ="content.css" >
	<link rel="stylesheet" href ="user.css" >


<title>Tạo hóa đơn</title>

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
						<li class="nd1"><a href="HoaDon.php">Lập hóa đơn bán hàng</a></li>
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
						<li><a href="DoiMK.php">Đổi mật khẩu</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="content">
			<!--  form tùy chỉnh tại đây -->
            <h2>TẠO HÓA ĐƠN BÁN HÀNG</h2>
			<form>
				<!-- Form nhập thông tin khách hàng -->
				<div class="customer-info">
					<div class="form-group">
						<label for="customerName">Tên khách hàng:</label>
						<input type="text" id="customerName" name="tenkh" placeholder="Nhập tên khách hàng">
					</div>

					<div class="form-group">
						<label for="customerPhone">Số điện thoại:</label>
						<input type="text" id="customerPhone" placeholder="Nhập số điện thoại">
					</div>
				</div>
			</form>

				<!-- Form nhập thông tin sản phẩm -->
			<form method="post" action="">
				<h3>Thông tin sản phẩm</h3>
				<div class="product-info">
					<div class="form-group">
						<label for="productName">Mã sách:</label>
						<input type="text" name="productID" placeholder="Nhập mã sách" required >
					</div>
					<div class="form-group">
						<label for="productQuantity">Số lượng:</label>
						<input  type="number" name="productQuantity" placeholder="Nhập số lượng" require >
					</div>
					</div>
					<button name="btnThemsp" class="stylebutton"  type="submit">Thêm sản phẩm</button>
					
			</form>
					<!-- Bảng hiển thị thông tin hóa đơn -->
				<form>
					<h3>Chi tiết hóa đơn</h3>
					
					
					<table class="invoiceTable">
						<thead>
							<tr>
								<th>Tên sản phẩm</th>
								<th>Số lượng</th>
								<th>Đơn giá (VNĐ)</th>
								<th>Tổng (VNĐ)</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if (isset($_SESSION['products'])) {
							foreach ($_SESSION['products'] as $index => $product) {
								echo "<tr onclick='confirmDelete($index)'>
										<td>{$product['nhande']}</td>
										<td>{$product['soluong']}</td>
										<td>{$product['giaban']}</td>
										<td>{$product['tongtien']}</td>
									</tr>";
							}
						}
						?>
						</tbody>
					</table>
				</form>
					<!-- Hiển thị tổng cộng hóa đơn -->
				<form  method="post" action="LuuHoaDon.php">
					<div class="form-group">
						<label class="total">Tổng cộng (VNĐ): 
							<span name="totalAmount">
								<?php
								$totalAmount = 0;
								if (isset($_SESSION['products'])) {
									foreach ($_SESSION['products'] as $product) {
										$totalAmount += $product['tongtien'];
									}
								}
								echo $totalAmount;
								?>
							</span>
						</label>
            		</div>
					<button name="btnLuu" class="stylebutton" onclick="return confirmHoadon()"  type="submit"> Lưu </button>
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
		<script>
			function confirmDelete(index) {
				var confirmDelete = confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi hóa đơn?");
				if (confirmDelete) {
					// Gửi yêu cầu xóa sản phẩm
					window.location.href = "xoaSanPham.php?index=" + index; // Thay đổi đường dẫn nếu cần
				}
			}
			function confirmHoadon() {
				var confirmHoadon = confirm("XÁC NHẬN TẠO HÓA ĐƠN?");
				return confirmHoadon;
			}
		</script>	
</body>
</html>
