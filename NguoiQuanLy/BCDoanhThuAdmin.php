<!doctype html>
<?php
// Kết nối cơ sở dữ liệu
include '../connectDB.php';

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu đơn hàng
$sql = "SELECT iddonhang, ngaytaodh, tongtien FROM donhang";
$data = $conn->query($sql);
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
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
         .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            width: 100%;
            }

            .form-inline {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            }

            .form-inline .form-group {
            margin-right: 10px;
            }

            .table-container {
            flex-basis: 60%;
            margin-right: 20px;
            }

            .table {
            width: 100%;
            }

            .total-revenue {
            font-weight: bold;
            margin-top: 10px;
            }

            #revenueChart {
                flex-basis: 35%;
                height: 400px;
            }
    </style>

<title>Báo Cáo Doanh Thu</title>

</head>

<body>
	<div class="td">
		<h3 class="chu">NHÀ SÁCH CÓ ĐỦ CẢ</h3>
			<div class="tieude1">
				<form method="post" action="kqtimkiem.php">
				<div class="search-container">
					<input type="text" name="keyword" class="search-input" placeholder="Nhập từ khóa">
					<button class="search-button" name="btnTim" >Tìm kiếm</button>
				</div>
				</form>
				<i class="fa-solid fa-envelope"></i>
				<i class="fa-solid fa-bell"></i>
				<a href="../Logout.php"><i class="fa-solid fa-right-from-bracket" ></i></a>
				<i class="fa-solid fa-user"></i>
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
						<li class ="nd1"><a href="BCDoanhThuAdmin.php">Doanh thu</a></li>
						<li><a href="#">Tồn kho</a></li>
					</ul>
				</li>
				</ul>
		</div>

		<div class="content">
        <h5>Báo cáo doanh thu</h5>
			<div class="container">
			
				<form class="form-inline" method="POST" action="">
					<div class="form-group">
						<label for="month">Tháng:</label>
						<select class="form-control" id="month" name="month">
							<?php
								for ($i = 1; $i <= 12; $i++) {
									echo "<option value='" . $i . "'>" . date("F", mktime(0, 0, 0, $i, 1)) . "</option>";
								}
							?>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Xem</button>
				</form>
		
				<?php
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$selectedMonth = $_POST["month"];
						$totalRevenue = 0;
						$monthlyRevenue = array_fill(0, 12, 0); // Khởi tạo mảng với 12 phần tử bằng 0
		
						while ($row = $data->fetch_assoc()) {
							$orderDate = date("m", strtotime($row["ngaytaodh"]));
							$monthlyRevenue[$orderDate-1] += $row["tongtien"];
							if ($orderDate == $selectedMonth) {
								$totalRevenue += $row["tongtien"];
							}
						}
		
						echo "<table class='table table-striped'>";
						echo "<thead>";
						echo "<tr>";
						echo "<th>Mã đơn hàng</th>";
						echo "<th>Ngày tạo</th>";
						echo "<th>Tổng tiền</th>";
						echo "</tr>";
						echo "</thead>";
						echo "<tbody>";
		
						$data->data_seek(0); // Reset lại vị trí con trỏ dữ liệu
						while ($row = $data->fetch_assoc()) {
							$orderDate = date("m", strtotime($row["ngaytaodh"]));
							if ($orderDate == $selectedMonth) {
								echo "<tr>";
								echo "<td>" . $row["iddonhang"] . "</td>";
								echo "<td>" . $row["ngaytaodh"] . "</td>";
								echo "<td>" . $row["tongtien"] . "</td>";
								echo "</tr>";
							}
						}
		
						echo "</tbody>";
						echo "</table>";
		
						echo "<p>Tổng doanh thu trong tháng: " . $totalRevenue . " VND</p>";
					}
				?>
		
				<!-- Phần tạo biểu đồ -->
				<canvas id="revenueChart"></canvas>
			</div>
		
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
			<script>
			// Giả sử bạn đã có dữ liệu doanh thu theo tháng trong mảng sau
			var monthlyRevenue = [
				<?php echo implode(", ", $monthlyRevenue); ?>
			];
		
			// Tạo biểu đồ
			var ctx = document.getElementById('revenueChart').getContext('2d');
			var revenueChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
					datasets: [{
						label: 'Doanh thu',
						data: monthlyRevenue,
						backgroundColor: '#4CAF50',
						borderColor: '#4CAF50',
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						y: {
							beginAtZero: true,
							display: true,
							title: {
								display: true,
								text: 'Doanh thu (VND)'
							}
						}
					}
				}
			});
		</script>	
		</div>
	<!-- Footer -->
		<!-- <div class="container1">
			<footer class="py-31 my-41">
				<ul class="nav justify-content-center1 border-bottom1 pb-31 mb-31">
				<li class="nav-item1"><a href="#" class="nav-link1 px-2 text-body-secondary">Home</a></li>
				<li class="nav-item1"><a href="#" class="nav-link1 px-2 text-body-secondary">FAQs</a></li>
				<li class="nav-item1"><a href="#" class="nav-link1 px-2 text-body-secondary">About</a></li>
				</ul>
				<p class="text-center1 text-body-secondary1">© 2024 Company, Inc</p>
			</footer>
		</div> -->
		
		
</body>
</html>