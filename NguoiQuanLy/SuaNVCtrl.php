<?php
session_start();

	// kết nối database
	$con=mysqli_connect('localhost','root','','qlnhasach') or die("Kết nối thất bại");	
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
	mysqli_close($con);
?>