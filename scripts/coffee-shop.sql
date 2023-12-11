SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
-- Bảng chứa khóa chính trước
-- Bảng size
DROP TABLE IF EXISTS `Size`;
CREATE TABLE IF NOT EXISTS `Size` (
    `idsize` INT PRIMARY KEY,
    `tensize` VARCHAR(255) NOT NULL,
    `giasize` INT NOT NULL
);

-- Chèn dữ liệu vào bảng size
INSERT INTO `Size` (`idsize`, `tensize`, `giasize`) VALUES
(1, 'S', 49000),
(2, 'M', 54000),
(3, 'L', 59000);

-- Bảng topping
DROP TABLE IF EXISTS `Topping`;
CREATE TABLE IF NOT EXISTS `Topping` (
    `idtopping` INT PRIMARY KEY,
    `tentopping` VARCHAR(255) NOT NULL,
    `giatopping` INT NOT NULL
);

-- Chèn dữ liệu vào bảng topping
INSERT INTO `Topping` (`idtopping`, `tentopping`, `giatopping`) VALUES
(1, 'Shot Espresso', 10000),
(2, 'Sốt Caramel', 10000),
(3, 'Trân châu trắng', 10000),
(4, 'Thạch cà phê', 10000),
(5, 'Kem phô mai Macchiato', 10000);

-- Bảng loại sp
DROP TABLE IF EXISTS `Loaisanpham`;
CREATE TABLE IF NOT EXISTS `Loaisanpham` (
    `idloai` INT PRIMARY KEY,
    `tenloai` VARCHAR(255) NOT NULL
);

-- Chèn dữ liệu vào bảng sp
INSERT INTO `Loaisanpham` (`idloai`, `tenloai`) VALUES
(1, 'Cà phê'),
(2, 'Trà'),
(3, 'Caramel Muối'),
(4, 'Cloud'),
(5, 'Hi-Tea Healthy'),
(6, 'Trà xanh-Chocolate'),
(7, 'Thức uống đá xay'),
(8, 'Bánh & Snack');

-- Bảng menu
DROP TABLE IF EXISTS `Menu`;
CREATE TABLE IF NOT EXISTS `Menu` (
    `idmenu` INT PRIMARY KEY,
    `tenmenu` VARCHAR(255) NOT NULL
);

-- Chèn dữ liệu vào bảng menu
INSERT INTO `Menu` (`idmenu`, `tenmenu`) VALUES
(1, 'Cà phê'),
(2, 'Trà'),
(3, 'Menu'),
(4, 'Chuyện nhà'),
(5, 'Cảm hứng CloudFee'),
(6, 'Cửa hàng'),
(7, 'Tuyển dụng');

-- Bảng hình
DROP TABLE IF EXISTS `HinhAnh`;
CREATE TABLE IF NOT EXISTS `HinhAnh` (
    `idhinh` INT PRIMARY KEY,
    `tenhinh` VARCHAR(255) NOT NULL
);
--Chèn dữ liệu vào bảng hình
INSERT INTO `HinhAnh` (`idhinh`,`tenhinh`) VALUES
(1, '1.jpg'),(2, '2.jpg'),(3, '3.jpg'),(4, '4.jpg'),(5, '5.jpg'),
(6,'6.jpg'),(7,'7.jpg'),(8, '8.jpg'),(9, '9.jpg'),(10,'10.jpg'),
(11,'11.jpg'),(12,'12.jpg'),(13,'13.jpg'),(14,'14.jpg'),(15,'15.png'),
(16,'16.jpg'),(17,'17.png'),(18,'18.jpg'),(19,'19.jpg'),(20,'20.jpg'),
(21,'21.jpg'),(22,'22.png'),(23,'23.jpg'),(24,'24.jpg'),(25,'25.jpg'),
(26,'26.jpg'),(27,'26.png'),(28,'27.jpg'),(29,'27.png'),
-- Bảng sp
DROP TABLE IF EXISTS `SanPham`;
CREATE TABLE IF NOT EXISTS `Sanpham` (
    `idsp` INT PRIMARY KEY,
    `hinhsp` INT,
    `gia` INT NOT NULL,
    `tensp` VARCHAR(255) NOT NULL,
    `idloai` INT,
    `idmenu` INT,
    FOREIGN KEY (`idloai`) REFERENCES `Loaisanpham`(`idloai`),
    FOREIGN KEY (`idmenu`) REFERENCES `Menu`(`idmenu`),
    CONSTRAINT `fk_hinh` FOREIGN KEY (`hinhsp`) REFERENCES `HinhAnh`(`idhinh`)
);
--chèn dữ liệu vào bảng sp
INSERT INTO `SanPham`(`idsp`, `hinhsp`, `gia`, `tensp`, `idloai`, `idmenu`) VALUES 
(1,1,49.000,`CloudFee hạnh nhân nướng`,null,null),
(2,2,39.000,`The coffee house sữa đá`,null,null ),
(3,)
-- Bảng user
DROP TABLE IF EXISTS `User`;
CREATE TABLE IF NOT EXISTS `User` (
    `iduser` INT PRIMARY KEY,
    `tenuser` VARCHAR(255) NOT NULL,
    `diachi` VARCHAR(255),
    `sodt` VARCHAR(15)
);

-- Những bảng chứa khóa ngoại tạo sau
-- Bảng chi tiết sản phẩm
DROP TABLE IF EXISTS `CTSanpham`;
CREATE TABLE IF NOT EXISTS `CTSanpham` (
    `idsp` INT,
    `idsize` INT,
    `idtopping` INT,
    PRIMARY KEY (`idsp`, `idsize`, `idtopping`),
    FOREIGN KEY (`idsp`) REFERENCES `Sanpham`(`idsp`),
    FOREIGN KEY (`idsize`) REFERENCES `Size`(`idsize`),
    FOREIGN KEY (`idtopping`) REFERENCES `Topping`(`idtopping`)
);

-- Bảng menu con
DROP TABLE IF EXISTS `MenuCon`;
CREATE TABLE IF NOT EXISTS `MenuCon` (
    `idmenucon` INT PRIMARY KEY,
    `tenmenu` VARCHAR(255) NOT NULL,
    `idcha` INT,
    FOREIGN KEY (`idcha`) REFERENCES `MenuCon`(`idmenucon`),
    FOREIGN KEY (`idmenu`) REFERENCES `Menu`(`idmenu`)
);

-- Bảng hóa đơn
DROP TABLE IF EXISTS `HoaDon`;
CREATE TABLE IF NOT EXISTS `HoaDon` (
    `idhoadon` INT PRIMARY KEY,
    `ngaylaphoadon` DATE NOT NULL,
    `tongtien` INT NOT NULL,
    `iduser` INT,
    FOREIGN KEY (`iduser`) REFERENCES `User`(`iduser`)
);

-- Bảng chi tiết hóa đơn
DROP TABLE IF EXISTS `CTHoaDon`;
CREATE TABLE IF NOT EXISTS `CTHoaDon` (
    `iduser` INT,
    `idsp` INT,
    `soluong` INT NOT NULL,
    `thanhtien` INT NOT NULL,
    PRIMARY KEY (`iduser`, `idsp`),
    FOREIGN KEY (`iduser`) REFERENCES `User`(`iduser`),
    FOREIGN KEY (`idsp`) REFERENCES `Sanpham`(`idsp`)
);


