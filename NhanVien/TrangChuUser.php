<!doctype html>
<?php
session_start();

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
	

<title>TrangChuUser</title>

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
				<a href="#"><i class="fa-solid fa-user"></i></a>
				
			</div>
	</div>
	
	<div class="nd">
			<div class="menu">
				<!-- <div class="admin">
					<i class="fa-solid fa-circle-user"></i> -->
					<!-- <?php echo $_SESSION['tennguoidung']; ?> -->
				<!-- </div> -->
				<ul>
				<li class ="nd1"><a href="TrangChuUser.php"><i class="fa-solid fa-house"></i>Trang Chủ</a></li>
				<li ><a href=""><i class="fa-solid fa-store"></i>Bán Hàng</a>
					<ul class="sub-menu">
						<li><a href="HoaDon.php">Lập hóa đơn bán hàng</a></li>
						<li><a href="DanhSachHoaDon.php">Quản lý đơn hàng</a></li>
						<li><a href="#">Xử lý hoàn trả hàng</a></li>
					</ul>
				</li>
		
				<li><a href="DSSachNV.php"><i class="fa-solid fa-swatchbook"></i>Quản Lý Sách</a>
					<ul class="sub-menu">
						<li><a href="DSSachNV.php">Danh sách Sách</a></li>
						<li><a href="NhapSachNV.php">Nhập sách</a></li>
						<li><a href="#">Kiểm kê sách</a></li>
					</ul>		
				</li>			  
				<li ><a href=""><i class="fa-solid fa-chart-simple"></i>Báo cáo</a>
					<ul class="sub-menu">
						<li><a href="#">Danh thu</a></li>
						<li><a href="#">Tồn kho</a></li>
					</ul>
			</li>
			<li ><a href="HoSoUser.php"><i class="fa-solid fa-user" id="fa-user"></i>Tài khoản</a>
					<ul class="sub-menu">
						<li><a href="HoSoUser.php">Hồ sơ</a></li>
						<li><a href="DoiMK.php">Đổi mật khẩu</a></li>
					</ul>
			</li>
				<!-- <li ><a href="../Logout.php"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a></li>	 -->
				</ul>
			</div>
			<div class="content">
				<div class="form-container">
					<!-- Các trường nhập liệu trước đó -->
					<div class="form-group time" style="text-align: center;">
						<label for="current-time">ĐỒNG HỒ</label>
						<div class="time-display" id="current-time"></div>
					</div>
				</div>
				<div class="buttons-container">
					<!-- Các nút bấm trước đó -->
				</div>

				<div class="calendar">
					<div class="header">
						<button id="prev">◀</button>
						<h2 id="monthYear"></h2>
						<button id="next">▶</button>
					</div>
					<div class="days">
						<div>Sun</div>
						<div>Mon</div>
						<div>Tue</div>
						<div>Wed</div>
						<div>Thu</div>
						<div>Fri</div>
						<div>Sat</div>
					</div>
					<div id="dates" class="dates"></div>
				</div>

				<script>
					function updateCurrentTime() {
					var currentTime = new Date();
					var timeString = currentTime.toLocaleTimeString();
					document.getElementById("current-time").textContent = timeString;
				}

				setInterval(updateCurrentTime, 1000);
				</script>
				
				<script>
					


					const monthYear = document.getElementById("monthYear");
					const dates = document.getElementById("dates");
					const prevBtn = document.getElementById("prev");
					const nextBtn = document.getElementById("next");

					let currentDate = new Date();
					const today = new Date();

					function renderCalendar() {
						const year = currentDate.getFullYear();
						const month = currentDate.getMonth();
						
						monthYear.textContent = `${month + 1}/${year}`;
						dates.innerHTML = '';

						const firstDay = new Date(year, month, 1).getDay();
						const lastDate = new Date(year, month + 1, 0).getDate();
						
						for (let i = 0; i < firstDay; i++) {
							const emptyDiv = document.createElement("div");
							dates.appendChild(emptyDiv);
						}

						for (let date = 1; date <= lastDate; date++) {
							const dateDiv = document.createElement("div");
							dateDiv.textContent = date;
							dateDiv.classList.add("date");

							// Kiểm tra xem có phải là ngày hôm nay không
							if (date === today.getDate() && 
								month === today.getMonth() && 
								year === today.getFullYear()) {
								dateDiv.classList.add("today");
							}

							dates.appendChild(dateDiv);
						}
					}

					prevBtn.addEventListener("click", () => {
						currentDate.setMonth(currentDate.getMonth() - 1);
						renderCalendar();
					});

					nextBtn.addEventListener("click", () => {
						currentDate.setMonth(currentDate.getMonth() + 1);
						renderCalendar();
					});

					// Render lịch tháng đầu tiên khi tải trang
					renderCalendar();
				</script>
			<div class="ad">
				<div class="ad1">
					<img src="imgNV/cdc1.jpg">
				</div>
				<div class="ad2">
						<img src="imgNV/cdc2.jpg">
					</div>
					<div class="ad3">
						<img src="imgNV/cdc3.jpg">
					</div>
				<!-- <div class="AD">
					<div class="ad2">
						<img src="imgNV/cdc2.jpg">
					</div>
					<div class="ad3">
						<img src="imgNV/cdc3.jpg">
					</div>
					
				</div> -->

			</div>

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