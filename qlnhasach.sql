-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2024 lúc 09:14 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlnhasach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdon`
--

CREATE TABLE `chitietdon` (
  `idcthd` int(11) NOT NULL,
  `iddonhang` int(11) NOT NULL,
  `idsach` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdon`
--

INSERT INTO `chitietdon` (`idcthd`, `iddonhang`, `idsach`, `soluong`, `tongtien`) VALUES
(0, 19, 1, 6, 60000),
(0, 31, 1, 7, 70000),
(0, 33, 1, 5, 50000),
(0, 34, 1, 2, 20000),
(0, 35, 1, 2, 20000),
(0, 36, 1, 5, 50000),
(0, 37, 1, 8, 80000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `iddonhang` int(11) NOT NULL,
  `idtaikhoan` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `tinhtrang` varchar(225) NOT NULL DEFAULT 'Chờ xử lý',
  `ngaytaodh` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`iddonhang`, `idtaikhoan`, `tongtien`, `tinhtrang`, `ngaytaodh`) VALUES
(1, 1, 22222, 'dangxuly', NULL),
(9, 0, 30000, 'Chờ xử lý', NULL),
(11, 0, 10000, 'Chờ xử lý', NULL),
(12, 0, 30000, 'Chờ xử lý', NULL),
(15, 0, 60000, 'Chờ xử lý', NULL),
(17, 0, 10000, 'Chờ xử lý', NULL),
(19, 0, 60000, 'Chờ xử lý', NULL),
(30, 0, 140000, 'Chờ xử lý', NULL),
(32, 0, 50000, 'Chờ xử lý', NULL),
(33, 0, 50000, 'Chờ xử lý', NULL),
(34, 0, 20000, 'Chờ xử lý', NULL),
(35, 0, 40000, 'Chờ xử lý', NULL),
(36, 0, 100000, 'Chờ xử lý', '2024-10-26 10:08:47'),
(37, 2, 80000, 'Chờ xử lý', '2024-10-26 10:14:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `idkh` int(255) NOT NULL,
  `tenkh` varchar(255) NOT NULL,
  `sodienthoai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`idkh`, `tenkh`, `sodienthoai`) VALUES
(111, 'khachtaiquay', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idnv` int(6) NOT NULL,
  `manv` varchar(25) NOT NULL,
  `tennv` varchar(25) NOT NULL,
  `sdt` int(10) NOT NULL,
  `ngaysinh` date NOT NULL,
  `ngayvaolam` date NOT NULL,
  `thoigianlam` int(10) NOT NULL,
  `luongcoban` float NOT NULL,
  `chucvunv` varchar(25) NOT NULL,
  `diachinv` varchar(25) NOT NULL,
  `gioitinh` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`idnv`, `manv`, `tennv`, `sdt`, `ngaysinh`, `ngayvaolam`, `thoigianlam`, `luongcoban`, `chucvunv`, `diachinv`, `gioitinh`) VALUES
(1, 'NV1', 'Ngọc', 339899811, '2003-06-12', '2024-10-01', 0, 100000000, 'CEO', 'Hà Nội', 'Nữ'),
(6, 'NV2', 'Diep', 123, '2003-11-24', '2024-10-24', 0, 0, 'Nhân Viên', 'Nam Dinh', 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `idquyen` int(11) NOT NULL,
  `tenquyen` varchar(50) NOT NULL,
  `loaiquyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`idquyen`, `tenquyen`, `loaiquyen`) VALUES
(1, 'Người dùng', '1'),
(2, 'Admin', '2'),
(3, 'KhachTV', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `idphieunhap` int(11) NOT NULL,
  `idsach` int(11) NOT NULL,
  `ngaynhap` datetime NOT NULL,
  `soluongnhap` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `idsach` int(11) NOT NULL,
  `theloai` varchar(225) NOT NULL,
  `tacgia` varchar(225) NOT NULL,
  `nhande` varchar(225) NOT NULL,
  `namxb` varchar(225) NOT NULL,
  `nhaxb` varchar(225) NOT NULL,
  `gianhap` int(20) NOT NULL,
  `giaban` float NOT NULL,
  `slkho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`idsach`, `theloai`, `tacgia`, `nhande`, `namxb`, `nhaxb`, `gianhap`, `giaban`, `slkho`) VALUES
(0, '---Chọn loại sách---', '', '', '', '', 0, 0, 412),
(1, 'Kinh tế', 'ngoc', 'aadqq', '1999', '2ewfcsadqw', 393, 10000, 415),
(2, 'Văn học', '3214567', '34567', '5123435654', '12312', 32456, 0, 412),
(3, 'Giáo khoa-Tham khảo', '3', '3', '3', '3', 3, 0, 412),
(4, 'Văn học', 'qqqq', 'rew', '2013', 'dsdsgf', 200, 0, 412);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `idtaikhoan` int(11) NOT NULL,
  `idnv` int(11) NOT NULL,
  `idquyen` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `matkhau` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`idtaikhoan`, `idnv`, `idquyen`, `email`, `matkhau`) VALUES
(1, 0, 2, 'testgmail@gmail.com', '12345'),
(2, 1, 1, 'ngoc@gmail.com', '123'),
(3, 0, 2, 'diep@gmail.com', '2424'),
(4, 6, 2, 'a@g.com', '111'),
(5, 6, 2, 'testggg@gmail.com', '12345'),
(6, 6, 2, 'a@g.com', '1111'),
(7, 1, 2, 'a@g.com', '12'),
(8, 1, 1, 'a@g.com', '12'),
(9, 6, 1, 'a@g.com', 'aaaa'),
(10, 1, 1, 'a@g.com', 'vbbb'),
(11, 6, 1, 'b@g.v', '2222');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdon`
--
ALTER TABLE `chitietdon`
  ADD PRIMARY KEY (`iddonhang`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`iddonhang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idkh`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idnv`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`idphieunhap`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`idsach`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`idtaikhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `iddonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idkh` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idnv` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `idphieunhap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idtaikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
