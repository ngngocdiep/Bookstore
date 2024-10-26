<?php
    if (isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        include '../connectDB.php'; // Kết nối cơ sở dữ liệu

        // Truy vấn để tìm kiếm trong cơ sở dữ liệu
        $sql = "SELECT * FROM sach WHERE nhande LIKE '%" . mysqli_real_escape_string($conn, $keyword) . "%'";
        $result = mysqli_query($conn, $sql);

        // Kiểm tra nếu có kết quả
        if (mysqli_num_rows($result) > 0) {
            // Hiển thị kết quả
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='result-item'>";
                echo "<h3>" . htmlspecialchars($row['nhande']) . "</h3>"; // Thay 'cot_tieu_de' bằng tên cột của bạn
                echo "<p>" . htmlspecialchars($row['giaban']) . "</p>"; // Thay 'cot_noi_dung' bằng tên cột của bạn
                echo "</div>";
            }
        } else {
            echo "<p>Không tìm thấy nội dung nào!</p>";
        }

        // Đóng kết nối
        mysqli_close($conn);
    }
    ?>