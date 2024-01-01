-- Nguoi dung
DROP TABLE IF EXISTS Users;

CREATE TABLE Users
(
    Id INT NOT NULL AUTO_INCREMENT,
    LastName NVARCHAR(100) NULL,
    FirstName NVARCHAR(100) NOT NULL,
    Gender BIT NOT NULL, -- 0: Khong xac dinh, 1: Nam, 2: Nu
    Address NVARCHAR(512) NULL,
    PhoneNumber VARCHAR(15) NULL,
    Username VARCHAR(20) NULL,
    Email VARCHAR(100) NOT NULL,
    Password VARCHAR(1000) NOT NULL,
    CreatedAt DATETIME NOT NULL,
    CreatedUserId INT NULL, -- null: user tu dang ky tren trang web, not null: dc nguoi khac tao dum
    UpdatedAt DATETIME NULL,
    UpdatedUserId INT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY (CreatedUserId) REFERENCES Users(Id),
    FOREIGN KEY (UpdatedUserId) REFERENCES Users(Id),
    UNIQUE (Username),
    UNIQUE (Email)
);
--chèn dữ liệu vào bảng user
INSERT INTO Users( LastName, FirstName,Gender, Address, PhoneNumber,Username, Email,Password,CreatedAt,CreatedUserId, UpdatedAt,UpdatedUserId) VALUES
('Trần','Vân Anh ',0 , '24 Thành Sơn','0259894906','admin1','va@gmail.com','va12345','2023-12-01',NULL,'2023-12-01',NULL),
('Lê','Kim Loan ', 0, '46 Trịnh Đình Trọng','0339894860','admin2','kl@gmail.com','657gfgb','2023-12-02',NULL,'2023-12-02',NULL),
('Nguyễn','Văn Nam ', 1, '30 Phú Thọ Hòa','055894884','admin3','VN777@gmail.com','hfhfh8','2023-12-03',NULL,'2023-12-03',NULL),
('Đậu','Văn Bắc ', 1, '12 Trịnh Đình Thảo','0933894751','admin4','VB766@gmail.com','fsgs75g','2023-12-04',NULL,'2023-12-04',NULL);

-- 1: nguoi dung binh thuong
-- 2: nguyen van A
-- 3: Tran thi B

-- Roles
DROP TABLE IF EXISTS Roles;

CREATE TABLE Roles
(
    Id INT NOT NULL AUTO_INCREMENT,
    Name NVARCHAR(100) NOT NULL,
    PRIMARY KEY(Id)
);
-- 1: quan ly
-- 2:order va tinh tien
-- 3:  nhan vien phuc vu
--chèn dữ liệu vô bảng role
INSERT INTO Roles(Name) VALUES
('quản lý'),
('order và tính tiền'),
('nhân viên phục vụ');

-- mot user co nhieu roles
DROP TABLE IF EXISTS UserRoles;

CREATE TABLE UserRoles
(
    UserId INT NOT NULL,
    RoleId INT NOT NULL,
    PRIMARY KEY(UserId, RoleId),
    FOREIGN KEY (UserId) REFERENCES Users(Id),
    FOREIGN KEY (RoleId) REFERENCES Roles(Id)
);
--chèn dữ liệu vô bảng UserRoles
INSERT INTO UserRoles(UserId,RoleId) VALUES
-- chèn dữ liệu vô bảng UserRoles
INSERT INTO UserRoles(UserId, RoleId) VALUES
(17,4),--tran van anh qli
(18,5),--le kim loan orders vsf tinh tien
(19,6),--nguyen van nam phục vụ
(20,6);--dau van bac phuc vu

-- Menu
DROP TABLE IF EXISTS Menu;
CREATE TABLE Menu
(
    Id INT NOT NULL AUTO_INCREMENT,
    Name NVARCHAR(255) NOT NULL,
    Path NVARCHAR(255) NULL,
    ParentId INT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY (ParentId) REFERENCES Menu(Id)
);
--chèn dữ liệu vô bảng menu
-- Chèn dữ liệu vào bảng menu
INSERT INTO Menu(Name, Path, ParentId) VALUES
('Cà phê', 'https://thecoffeehouse.com/collections/ca-phe-tai-nha', NULL),
('Trà', 'https://thecoffeehouse.com/collections/tra-tai-nha', NULL),
('Menu', 'https://thecoffeehouse.com/collections/all', NULL),
('Chuyện Nhà', 'https://thecoffeehouse.com/pages/chuyen-ca-phe-va-tra', NULL),
('Cảm hứng CloudFee', 'https://thecoffeehouse.com/pages/cloudfee-the-he-ca-phe-moi', NULL),
('Cửa hàng', 'https://thecoffeehouse.com/pages/danh-sach-cua-hang', NULL),
('Tuyển dụng', 'https://tuyendung.thecoffeehouse.com/', NULL);
('Tất cả','https://thecoffeehouse.com/collections/all',10),
('Caramel Muối','https://thecoffeehouse.com/collections/caramel-muoi',10),
('Cà phê','https://thecoffeehouse.com/collections/ca-phe',10),
('Trà','https://thecoffeehouse.com/collections/ca-phe',10),
('Clould','https://thecoffeehouse.com/collections/cloud',10),
('Hi-Tea Healthy','https://thecoffeehouse.com/collections/hi-tea-healthy',10),
('Trà xanh- Chocolate','https://thecoffeehouse.com/collections/tra-xanh-tay-bac',10),
('Thức uống đá xay','https://thecoffeehouse.com/collections/da-xay-frosty-1',10),
('Bánh & Snack','https://thecoffeehouse.com/collections/banh',10),
('Caramel Muối', 'https://thecoffeehouse.com/collections/caramel-muoi', 16),
('Cà Phê Highlight', 'https://thecoffeehouse.com/collections/ca-phe-highlight', 17),
('Cà phê Việt Nam', 'https://thecoffeehouse.com/collections/ca-phe-viet-nam', 17),
('Cà phê máy', 'https://thecoffeehouse.com/collections/ca-phe-may', 17),
('Cold Brew', 'https://thecoffeehouse.com/collections/cold-brew', 17),
('Trà Trái Cây', 'https://thecoffeehouse.com/collections/tra-trai-cay', 18),
('Trà sữa Macchiato', 'https://thecoffeehouse.com/collections/tra-sua-macchiato', 18),
('CloudTea', 'https://thecoffeehouse.com/collections/cloudtea', 19),
('CloudFee', 'https://thecoffeehouse.com/collections/cloudfee', 19),
('CloudTea Mochi', 'https://thecoffeehouse.com/collections/cloudtea-mochi', 19),
('Hi-Tea Trà', 'https://thecoffeehouse.com/collections/hi-tea-tra', 20),
('Hi-Tea Đá Tuyết', 'https://thecoffeehouse.com/collections/hi-tea-da-tuyet', 20),
('Trà Xanh Tây Bắc', 'https://thecoffeehouse.com/collections/tra-xanh-tay-bac', 21),
('Chocolate', 'https://thecoffeehouse.com/collections/thuc-uong-khac', 21),
('Đá xay Frosty', 'https://thecoffeehouse.com/collections/da-xay-frosty-1', 22),
('Bánh mặn', 'https://thecoffeehouse.com/collections/banh-man', 23),
('Bánh ngọt', 'https://thecoffeehouse.com/collections/banh-ngot', 23),
('Snack', 'https://thecoffeehouse.com/collections/snack', 23),
('Bánh Pastry', 'https://thecoffeehouse.com/collections/banh-pastry', 23),
('CoffeHolic', 'https://thecoffeehouse.com/pages/chuyen-ca-phe-va-tra?b=1000676335', 11),
('Teaholic', 'https://thecoffeehouse.com/pages/chuyen-ca-phe-va-tra?b=1000676336', 11),
('Blog', 'https://thecoffeehouse.com/pages/chuyen-ca-phe-va-tra?b=1000676337', 11);
('#chuyencaphe','https://thecoffeehouse.com/pages/chuyen-ca-phe-va-tra?b=1000676335&h=chuyencaphe',43),
('#phacaphe','https://thecoffeehouse.com/pages/chuyen-ca-phe-va-tra?b=1000676335&h=phacaphe',43),
('#phatra','https://thecoffeehouse.com/pages/chuyen-ca-phe-va-tra?b=1000676336&h=phatra',44),
('#cauchuyenvetra','https://thecoffeehouse.com/pages/chuyen-ca-phe-va-tra?b=1000676336&h=cauchuyenvetra',44),
('#inthemood','https://thecoffeehouse.com/pages/chuyen-ca-phe-va-tra?b=1000676337&h=inthemood',45),
('#Review','https://thecoffeehouse.com/pages/chuyen-ca-phe-va-tra?b=1000676337&h=Review',45),
('HumanofTCH','https://thecoffeehouse.com/pages/chuyen-ca-phe-va-tra?b=1000676337&h=HumanofTCH',45);
-- Chuyen nha : Id: 1 - parentID = null
-- -- Blog : Id: 2 - parent id :1
-- -- Teaholic : Id: 3 - parent id :1
-- Cafe : Id: 4 - parentId = null

-- select * from menu 
-- where parentId is NULL

-- RoleMenus
DROP TABLE IF EXISTS RoleMenus;

CREATE TABLE RoleMenus
(
    RoleId INT NOT NULL,
    MenuId INT NOT NULL,
    PRIMARY KEY(RoleId, MenuId),
    FOREIGN KEY (RoleId) REFERENCES Roles(Id),-- gtri trong cột RoleId phải là 1 giá trị hợp lệ trong cột Id của bảng Roles
    FOREIGN KEY (MenuId) REFERENCES Menu(Id)
);
--chèn dữ liệu vô bảng rolemenu
INSERT INTO RoleMenus(RoleId,MenuId) VALUES 
()
-- 1 - 1
-- 1 - 2
-- 1 - 4
-- Bảng chứa khóa chính trước
-- Bảng size
DROP TABLE IF EXISTS Size;

CREATE TABLE Size (
    idsize INT AUTO_INCREMENT PRIMARY KEY,
    tensize VARCHAR(255) NOT NULL,
    giasize INT NOT NULL
);

-- Chèn dữ liệu vào bảng size
INSERT INTO Size (tensize, giasize) VALUES
('Nhỏ', 0),
('Vừa', 6000),
('Lớn', 10000);
-- Bảng topping
DROP TABLE IF EXISTS `Topping`;
CREATE TABLE `Topping` (
    `idtopping` INT  AUTO_INCREMENT PRIMARY KEY,
    `tentopping` VARCHAR(255) NOT NULL,
    `giatopping` INT NOT NULL
);

-- Chèn dữ liệu vào bảng topping
INSERT INTO `Topping` ( `tentopping`, `giatopping`) VALUES
( 'Shot Espresso', 10000),
('Sốt Caramel', 10000),
( 'Trân châu trắng', 10000),
( 'Thạch cà phê', 10000),
('Kem phô mai Macchiato', 10000);
-- Bảng loại sp
DROP TABLE IF EXISTS `Loaisanpham`;
CREATE TABLE  `Loaisanpham` (
    `idloai` INT AUTO_INCREMENT PRIMARY KEY,
    `tenloai` VARCHAR(255) NOT NULL
);

-- Chèn dữ liệu vào bảng sp
INSERT INTO `Loaisanpham` ( `tenloai`) VALUES
( 'Cà phê'),
( 'Trà'),
( 'Caramel Muối'),
('Cloud'),
('Hi-Tea Healthy'),
('Trà xanh-Chocolate'),
( 'Thức uống đá xay'),
( 'Bánh & Snack');
-- Bảng hình
DROP TABLE IF EXISTS `HinhAnh`;
CREATE TABLE `HinhAnh` (
    `idhinh` INT AUTO_INCREMENT PRIMARY KEY,
    `tenhinh` VARCHAR(255) NOT NULL,
);
--Chèn dữ liệu vào bảng hình
INSERT INTO `HinhAnh` (`tenhinh`) VALUES
( '1.jpg'),('2.jpg'),('3.jpg'),( '4.jpg'),( '5.jpg'),
('6.jpg'),('7.jpg'),('8.jpg'),( '9.jpg'),('10.jpg'),
('11.jpg'),('12.jpg'),('13.jpg'),('14.jpg'),('15.png'),
('16.jpg'),('17.png'),('18.jpg'),('19.jpg'),('20.jpg'),
('21.jpg'),('22.png'),('23.jpg'),('24.jpg'),('25.jpg'),
('26.jpg'),('26.png'),('27.jpg'),('27.png');
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('28.jpg'),('29.jpg');
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('cfrxay1kg.jpg');
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('thung24lon.jpg'),('cfrangxay1250g.jpg'),('cfdamviviet.jpg'),('cfsuahoatantui.jpg'),('thungcfsua.jpg'),('6loncfsua.jpg'),('cfdamviviettui.jpg'),
('cfrangxay1kg.jpg'),('cfdendatui.jpg'),('cfdendahop.jpg'),('cfsuadahoatan.jpg'),('cfsuapack6lon.jpg');
--hinh trà
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('daohop.jpg'),('tstranchau.jpg'),('tacmatong.jpg'),('olongtuiloc.jpg'),('laituiloc.jpg'),('sentuiloc.jpg'),('daotuiloc.jpg'),('giftset.jpg');
--hình caramel
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('crmstuoi.jpg'),('frostycrm.jpg'),('crmchoco.jpg'),('crmtraxah.jpg'),('crmtranog.jpg'),('crmchoconog.jpg');
--Cà Phê Highlight
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('cfhlstuoi.jpg'),('cfhltraxah.jpg');
--Cà Phê VN
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('ddsuada.jpg'),('cfsuanog.jpg'),('bacsiu.jpg'),('bacsnog.jpg'),('cfdda.jpg'),('cfdnog.jpg');
--Cà Phê Máy
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('ddmarble.jpg'),('machiatoda.jpg'),('machiatohot.jpg'),('lateda.jpg'),('latahot.jpg'),('americada.jpg'),('americahot.jpg'),('cpcnda.jpg'),('cpcnhot.jpg'),('Espda.jpg'),('esphot.jpg');
--Cold brew
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('cbkhucbontu.jpg'),('cbstuoi.jpg');
--tra trai cay
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('tralognhan.jpg'),('daocamsa.jpg'),('dcshot.jpg'),('hatsenda.jpg'),('hatsenhot.jpg'),('tradaochai.jpg');
--tra sua
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('machiato.jpg'),('hongtra.jpg'),('hongtrahot.jpg'),('olongnuong.jpg'),('olonghot.jpg'),('tsmacca.jpg');
--cloudtea
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('olkemdua.jpg'),('olkemchese.jpg');
--hitea
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('daokbc.jpg'),('yuzu.jpg'),('mandarin.jpg'),('yuzutc.jpg');
--da tuyeets
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('datuyet.jpg');
--trà xanh TB
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('txlate.jpg'),('txlatehot.jpg'),('txdd.jpg'),('frostytx.jpg');
--chôclate
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('chocolate.jpg');
--đá xay
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('frostygato.png'),('fcfdd.png'),('frtarabica.png'),('frtdau.png'),('frtchoco.png');
--bánh mặn
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('buttersua.jpg'),('bmgay.png'),('bmcangu.jpg'),('bmque.png'),('eggmuoi.jpg'),('chabong.png');
--bánh ngọt
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('mcpbt.jpg'),('mcdua.jpg'),('mcxoai.jpg'),('mousered.jpg'),('mosetira.jpg'),('banhgau.jpg');
--snack
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('mit.jpg'),('ga.jpg');
--bánh pastry
INSERT INTO `HinhAnh` (`tenhinh`) VALUES('butter.jpg'),('chococro.jpg'),('patechaud.jpg');
-- Bảng sp
DROP TABLE IF EXISTS `SanPham`;
CREATE TABLE `Sanpham` (
    `idsp` INT AUTO_INCREMENT PRIMARY KEY,
    `gia` INT NOT NULL,
    `tensp` VARCHAR(255) NOT NULL,
    `banchay` BOOLEAN,
    `mota` NVARCHAR(1000),
    `ngaytao` DATETIME NOT NULL,
    `idloai` INT,
    `idmenu` INT,
    FOREIGN KEY (`idloai`) REFERENCES `Loaisanpham`(`idloai`),
    FOREIGN KEY (`idmenu`) REFERENCES `Menu`(`Id`)
);
--chèn dữ liệu vào bảng sp
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (49000,'CloudFee hạnh nhân nướng',1,'Vị đắng nhẹ từ cà phê phin truyền thống kết hợp Espresso Ý, lẫn chút ngọt ngào của kem sữa và lớp foam trứng cacao, nhấn thêm hạnh nhân nướng thơm bùi, kèm topping thạch cà phê dai giòn mê ly. Tất cả cùng quyện hoà trong một thức uống làm vị giác "thức giấc", thơm ngon hết nấc.','2023-12-10',4,32);
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (39000,'The coffee house sữa đá',1,'Thức uống giúp tỉnh táo tức thì để bắt đầu ngày mới thật hứng khởi. Không đắng khét như cà phê truyền thống, The Coffee House Sữa Đá mang hương vị hài hoà đầy lôi cuốn. Là sự đậm đà của 100% cà phê Arabica Cầu Đất rang vừa tới, biến tấu tinh tế với sữa đặc và kem sữa ngọt ngào cực quyến rũ. Càng hấp dẫn hơn với topping thạch 100% cà phê nguyên chất giúp giữ trọn vị ngon đến ngụm cuối cùng.','2023-12-10',1,26);
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (49000,'Hi-tea vải',1,'Chút ngọt ngào của Vải, mix cùng vị chua thanh tao từ trà hoa Hibiscus, mang đến cho bạn thức uống đúng chuẩn vừa ngon, vừa healthy.','2023-12-10',5,34),
(29000,'Cà phê sữa đá',1,'Cà phê Đắk Lắk nguyên chất được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.','2023-12-10',1,26);
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) VALUES (39000,'Bánh mì VN thịt nguội',1,'Gói gọn trong ổ bánh mì Việt Nam là từng lớp chả, từng lớp jambon hòa quyện cùng bơ và pate thơm lừng, thêm dưa rau cho bữa sáng đầy năng lượng. *Phần bánh sẽ ngon và đậm đà nhất khi kèm pate. Để đảm bảo hương vị được trọn vẹn, Nhà mong bạn thông cảm vì không thể thay đổi định lượng pate.','2023-12-10',8,39);
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) VALUES (19000,'Mochi kem chocolate',1,'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân chocolate độc đáo. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng.','2023-12-10',8,40);
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) VALUES (69000,'CloudTea Trà Xanh Tây Bắc',1,'Không thể rời môi với Mochi Kem Matcha dẻo mịn, núng nính. Trà Xanh Tây Bắc vị mộc hoà quyện sữa tươi, foam phô mai beo béo và vụn bánh quy giòn tan, là lựa chọn đậm không khí lễ hội. Món không thể thiếu đá, để ngoại hình và chất lượng được đảm bảo.','2023-12-10',4,31),
 (69000,'CloudTea Oolong Berry',1,'Cắn một cái, chua chua ngọt ngọt ngon đến từng tế bào với chiếc Mochi Kem Phúc Bồn Tử! Hút một ngụm, mê luôn Trà Oolong Sữa dịu êm quyện vị dâu, cùng lớp foam phô mai phủ vụn bánh quy phô mai mằn mặn. Món không thể thiếu đá, để ngoại hình và chất lượng được đảm bảo.','2023-12-10',4,31);
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (59000,'Trà xanh tây bắc',1,'Được trồng trọt và chăm chút kỹ lưỡng, nuôi dưỡng từ thổ nhưỡng phì nhiêu, nguồn nước mát lành, bao bọc bởi mây và sương cùng nền nhiệt độ mát mẻ quanh năm, những búp trà ở Tây Bắc mập mạp và xanh mướt, hội tụ đầy đủ dưỡng chất, sinh khí, và tinh hoa đất trời.Chính khí hậu đặc trưng cùng phương pháp canh tác của đồng bào dân tộc nơi đây đã tạo ra Trà Xanh vị mộc dễ uống, dễ yêu, không thể trộn lẫn với bất kỳ vùng miền nào khác.','2023-12-10',6,36);
--cafe
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (58000,'Cà Phê Đen Đá Hộp',0,'Cà Phê Đen Đá hoà tan The Coffee House với 100% hạt cà phê Robusta mang đến hương vị mạnh cực bốc, đậm đắng đầy lôi cuốn, đúng gu người Việt.','2023-12-15',1,8),
(110000,'Cà Phê Đen Đá Túi ',0,'Cà Phê Đen Đá hoà tan The Coffee House với 100% hạt cà phê Robusta mang đến hương vị mạnh cực bốc, đậm đắng đầy lôi cuốn, đúng gu người Việt.','2023-12-15',1,8),
(336000,'Thùng Cà Phê Sữa Espresso ',0,'Được sản xuất theo công nghệ Nhật, Cà Phê Sữa Espresso The Coffee House giữ trọn hương vị đậm đà của 100% cà phê Robusta nguyên chất quyện hoà cùng sữa béo thơm lừng. Bật nắp trải nghiệm ngay chất cà phê mạnh mẽ giúp sảng khoái tức thì, tuôn trào hứng khởi','2023-12-15',1,8),
(84000,'Combo 6 Lon Cà Phê Sữa Espresso ',0,'Được sản xuất theo công nghệ Nhật, Cà Phê Sữa Espresso The Coffee House giữ trọn hương vị đậm đà của 100% cà phê Robusta nguyên chất quyện hoà cùng sữa béo thơm lừng. Bật nắp trải nghiệm ngay chất cà phê mạnh mẽ giúp sảng khoái tức thì, tuôn trào hứng khởi','2023-12-15',1,8),
(235000,'Cà Phê Rang Xay Original 1 Túi 1KG ',0,'Cà phê Original 1 của The Coffee House với 100% thành phần cà phê Robusta Đăk Lăk, vùng trồng cà phê ngon nhất Việt Nam. Bằng cách áp dụng kỹ thuật rang xay hiện đại, Cà phê Original 1 mang đến trải nghiệm tuyệt vời khi uống cà phê tại nhà với hương vị đậm đà truyền thống hợp khẩu vị của giới trẻ sành cà phê.','2023-12-15',1,8),
(60000,'Cà Phê Rang Xay Original 1 250g ',0,'Cà phê Original 1 của The Coffee House với thành phần chính cà phê Robusta Đắk Lắk, vùng trồng cà phê nổi tiếng nhất Việt Nam. Bằng cách áp dụng kỹ thuật rang xay hiện đại, Cà phê Original 1 mang đến trải nghiệm tuyệt vời khi uống cà phê tại nhà với hương vị đậm đà truyền thống hợp khẩu vị của giới trẻ sành cà phê.','2023-12-15',1,8),
(44000,'Cà Phê Sữa Đá Hòa Tan (10 gói x 22g)',0,'Thật dễ dàng để bắt đầu ngày mới với tách cà phê sữa đá sóng sánh, thơm ngon như cà phê pha phin. Vị đắng thanh của cà phê hoà quyện với vị ngọt béo của sữa, giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.','2023-12-15',1,8),
(99000,'Cà Phê Sữa Đá Hòa Tan Túi 25x22G ',0,'Thật dễ dàng để bắt đầu ngày mới với tách cà phê sữa đá sóng sánh, thơm ngon như cà phê pha phin. Vị đắng thanh của cà phê hoà quyện với vị ngọt béo của sữa, giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.','2023-12-15',1,8),
(48000,'Cà Phê Hoà Tan Đậm Vị Việt (18 gói x 16 gam) ',0,'Bắt đầu ngày mới với tách cà phê sữa “Đậm vị Việt” mạnh mẽ sẽ giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.','2023-12-15',1,8),
(99000,'Cà Phê Hòa Tan Đậm Vị Việt Túi 40x16G',0,'Bắt đầu ngày mới với tách cà phê sữa “Đậm vị Việt” mạnh mẽ sẽ giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.','2023-12-15',1,8),
(84000,'Cà Phê Sữa Đá Pack 6 Lon ',0,'Với thiết kế lon cao trẻ trung, hiện đại và tiện lợi, Cà phê sữa đá lon thơm ngon đậm vị của The Coffee House sẽ đồng hành cùng nhịp sống sôi nổi của tuổi trẻ và giúp bạn có được một ngày làm việc đầy hứng khởi.Với thiết kế lon cao trẻ trung, hiện đại và tiện lợi, Cà phê sữa đá lon thơm ngon đậm vị của The Coffee House sẽ đồng hành cùng nhịp sống sôi nổi của tuổi trẻ và giúp bạn có được một ngày làm việc đầy hứng khởi.Với thiết kế lon cao trẻ trung, hiện đại và tiện lợi, Cà phê sữa đá lon thơm ngon đậm vị của The Coffee House sẽ đồng hành cùng nhịp sống sôi nổi của tuổi trẻ và giúp bạn có được một ngày làm việc đầy hứng khởi.','2023-12-15',1,8),
(336000,'Thùng 24 Lon Cà Phê Sữa Đá',0,'Bắt đầu ngày mới với tách cà phê sữa “Đậm vị Việt” mạnh mẽ sẽ giúp bạn luôn tỉnh táo và hứng khởi cho ngày làm việc thật hiệu quả.','2023-12-15',1,8);
--trà
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (32000,'Trà Vị Đào Tearoma 14x14g',0,'Được chiết xuất từ 100% trà tự nhiên, không phẩm màu tổng hợp, Trà vị Đào Tearoma mang đến cảm giác thanh mát cực đã. Nhấp một ngụm, cảm nhận trọn vị đào chua ngọt thơm ngon bùng nổ. Ngoài ra, trà còn bổ sung vitamin C cực kỳ có lợi cho sức khoẻ.','2023-12-16',2,9),
 (38000,'Trà Sữa Trân Châu Tearoma 250g',0,'Chỉ 2 phút có ngay ly Trà sữa trân châu ngon chuẩn vị quán. Thơm vị trà, béo vị sữa, cùng trân châu thật giòn dai sật sật. Đặc biệt, đây còn là thức uống tốt cho sức khoẻ nhờ thành phần 100% chiết xuất trà tự nhiên, không chất hoá học.','2023-12-16',2,9),
 (32000,'Trà Vị Tắc Mật Ong Tearoma 14x14g',0,'Thổi bùng sảng khoái cùng Trà vị Tắc Mật Ong Tearoma không phẩm màu tổng hợp. Chiết xuất từ 100% trà tự nhiên, bổ sung vitamin C tốt cho sức khoẻ. Vị tắc chua chua hoà cùng mật ong ngọt dịu giúp bật vị giác, bừng vị mát tức thì.','2023-12-16',2,9),
 (28000,'Trà Oolong Túi Lọc Tearoma 20x2G',0,'Trà Oolong túi lọc với mùi hương dịu nhẹ hoàn toàn từ tự nhiên, vị hậu ngọt, và hương thơm tinh tế. Trà túi lọc Tearoma tiện lợi để sử dụng tại văn phòng, tại nhà,... nhưng vẫn đảm bảo được chất lượng về hương trà tinh tế, vị trà đậm đà.','2023-12-16',2,9),
 (28000,'Trà Lài Túi Lọc Tearoma 20x2G',0,'Trà túi lọc Tearoma hương lài thơm tinh tế, thanh mát, trên nền trà xanh đậm đà khó quên. Trà túi lọc Tearoma tiện lợi để sử dụng tại văn phòng, tại nhà,.. nhưng vẫn đảm bảo được chất lượng về hương trà tinh tế, vị trà đậm đà.','2023-12-16',2,9),
 (28000,'Trà Sen Túi Lọc Tearoma 20x2G',0,'Trà túi lọc Tearoma hương sen tinh tế, thanh mát, trên nền trà xanh đậm đà khó quên. Trà túi lọc Tearoma tiện lợi để sử dụng tại văn phòng, tại nhà, đi du lịch,... nhưng vẫn đảm bảo được chất lượng về hương trà tinh tế, vị trà đậm đà.','2023-12-16',2,9),
 (28000,'Trà Đào Túi Lọc Tearoma 20x2G',0,'Trà túi lọc Tearoma hương đào với hương thơm tinh tế và hoàn toàn tự nhiên, cùng nền trà đen đậm vị khó quên. Trà túi lọc Tearoma tiện lợi để sử dụng tại văn phòng, tại nhà,.. nhưng vẫn đảm bảo được chất lượng về hương trà tinh tế, vị trà đậm đà.','2023-12-16',2,9),
 (166000,'Giftset Trà Tearoma',0,'Hộp quà tặng với 4 hộp trà túi lọc Tearoma các loại là món quà thật ý nghĩa cho những người thân yêu.','2023-12-16',2,9);
 --caramel muối
 INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (69000,'Caramel Muối Phin Sữa Tươi',0,'Bái bai cơn uể oải ngay sau hớp cà phê sữa tươi vị Caramel Muối đầu tiên. Thêm bánh Biscotti cùng kem Vani, càng nhúng càng vui! *Món không thể thiếu đá và kem Vani để giữ trọn vị. Nhấp một ngụm, cảm nhận trọn vị đào chua ngọt thơm ngon bùng nổ. Ngoài ra, trà còn bổ sung vitamin C cực kỳ có lợi cho sức khoẻ.', '2023-12-18', 3,24),
  (72000, 'Frosty Caramel Muối Arabica', 0, 'Đã tức thì với Đá Xay Frosty Caramel Muối Arabica. Nhúng bánh Biscotti, nếm kem phủ vụn hạnh nhân giòn. Hút một hơi Cà Phê Espresso Arabica Cầu Đất đậm đà, thêm tròn vị cùng Caramel Muối mằn mặn, mùa hội vui đang chờ ta!', '2023-12-18', 3,24),
   (69000, 'Caramel Muối Choco', 0, 'Choco vị ngọt, hậu đắng kinh điển của tuổi thơ, nay sáng tạo hơn với chút mặn mà của Caramel Muối. Nhúng bánh Biscotti, nếm kem Vani tận hưởng niềm vui bé bỏng! *Món không thể thiếu đá và kem Vani để giữ trọn vị.', '2023-12-18', 3,24),
   (69000, 'Caramel Muối Trà Xanh Tây Bắc', 0, 'Cho tâm trí tan ra với Trà Xanh Tây Bắc vị mộc kết hợp cùng Caramel Muối mằn mặn. Tan thêm chút nữa khi cho bánh Biscotti đắm mình vào kem Vani và vụn bánh quy giòn. *Món không thể thiếu đá và kem Vani để giữ trọn vị.', '2023-12-18', 3,24),
    (69000, 'Caramel Muối Trà Xanh Tây Bắc Nóng', 0, 'Trà Xanh Tây Bắc nóng thêm tròn vị cùng Caramel Muối - chiếc ôm ấm mà ai cũng sẽ cần. Lòng thêm hân hoan với bánh Biscotti nhúng kem Vani, giòn tan trong miệng.', '2023-12-18', 3,24),
    (69000, 'Caramel Muối Choco Nóng', 0, 'Xông hơi trái tim se lạnh của bạn bằng một tách Caramel Muối Choco nóng. Mặn ngọt đan xen, mỗi hớp như một món quà Giáng Sinh tự thưởng cho mình.', '2023-12-18', 3,24);
--Cà Phê Highlight
 INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (49000,'Phin Sữa Tươi Bánh Flan',0,'Tỉnh tức thì cùng cà phê Robusta pha phin đậm đà và bánh flan núng nính. Uống là tỉnh, ăn là dính, xứng đáng là highlight trong ngày của bạn.', '2023-12-18', 1,25),
  (49000,' Trà Xanh Espresso Marble',0, 'Cho ngày thêm tươi, tỉnh, êm, mượt với Trà Xanh Espresso Marble. Đây là sự mai mối bất ngờ giữa trà xanh Tây Bắc vị mộc và cà phê Arabica Đà Lạt. Muốn ngày thêm chút highlight, nhớ tìm đến sự bất ngờ này bạn nhé!', '2023-12-18', 1,25);
--Cà Phê VN
 INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (45000,'Đường Đen Sữa Đá',0,'Nếu chuộng vị cà phê đậm đà, bùng nổ và thích vị đường đen ngọt thơm, Đường Đen Sữa Đá đích thị là thức uống dành cho bạn. Không chỉ giúp bạn tỉnh táo buổi sáng, Đường Đen Sữa Đá còn hấp dẫn đến ngụm cuối cùng bởi thạch cà phê giòn dai, nhai cực cuốn. - Khuấy đều trước khi sử dụng', '2023-12-18', 1,26),
  (39000,'Cà Phê Sữa Nóng',0,' Cà phê được pha phin truyền thống kết hợp với sữa đặc tạo nên hương vị đậm đà, hài hòa giữa vị ngọt đầu lưỡi và vị đắng thanh thoát nơi hậu vị.', '2023-12-18', 1,26),
  (29000,'Bạc Sỉu',0,'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.', '2023-12-18', 1,26),
  (39000,'Bạc Sỉu Nóng',0,'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.', '2023-12-18', 1,26),
  (29000,'Cà Phê Đen Đá',0,'Không ngọt ngào như Bạc sỉu hay Cà phê sữa, Cà phê đen mang trong mình phong vị trầm lắng, thi vị hơn. Người ta thường phải ngồi rất lâu mới cảm nhận được hết hương thơm ngào ngạt, phảng phất mùi cacao và cái đắng mượt mà trôi tuột xuống vòm họng.', '2023-12-18', 1,26),
  (39000,'Cà Phê Đen Nóng',0,'Không ngọt ngào như Bạc sỉu hay Cà phê sữa, Cà phê đen mang trong mình phong vị trầm lắng, thi vị hơn. Người ta thường phải ngồi rất lâu mới cảm nhận được hết hương thơm ngào ngạt, phảng phất mùi cacao và cái đắng mượt mà trôi tuột xuống vòm họng.', '2023-12-18', 1,26);
--Cà Phê máy
 INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (55000,'Đường Đen Marble Latte',0,'Đường Đen Marble Latte êm dịu cực hấp dẫn bởi vị cà phê đắng nhẹ hoà quyện cùng vị đường đen ngọt thơm và sữa tươi béo mịn. Sự kết hợp đầy mới mẻ của cà phê và đường đen cũng tạo nên diện mạo phân tầng đẹp mắt. Đây là lựa chọn đáng thử để bạn khởi đầu ngày mới đầy hứng khởi. - Khuấy đều trước khi sử dụng', '2023-12-18', 1,27),
  (55000,'Caramel Macchiato Đá',0,'Khuấy đều trước khi sử dụng Caramel Macchiato sẽ mang đến một sự ngạc nhiên thú vị khi vị thơm béo của bọt sữa, sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng và vị ngọt đậm của sốt caramel được gói gọn trong một tách cà phê.', '2023-12-18', 1,27),
  (55000,'Caramel Macchiato Nóng',0,'Caramel Macchiato sẽ mang đến một sự ngạc nhiên thú vị khi vị thơm béo của bọt sữa, sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng và vị ngọt đậm của sốt caramel được gói gọn trong một tách cà phê.', '2023-12-18', 1,27),
  (55000,'Latte Đá',0,'Một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.', '2023-12-18', 1,27),
  (55000,'Latte Nóng',0,'Một sự kết hợp tinh tế giữa vị đắng cà phê Espresso nguyên chất hòa quyện cùng vị sữa nóng ngọt ngào, bên trên là một lớp kem mỏng nhẹ tạo nên một tách cà phê hoàn hảo về hương vị lẫn nhãn quan.', '2023-12-18', 1,27),
  (45000,'Americano Đá',0,'Americano được pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.', '2023-12-18', 1,27),
  (45000,'Americano Nóng',0,'Americano được pha chế bằng cách pha thêm nước với tỷ lệ nhất định vào tách cà phê Espresso, từ đó mang lại hương vị nhẹ nhàng và giữ trọn được mùi hương cà phê đặc trưng.', '2023-12-18', 1,27),
  (55000,'Cappuccino Đá',0,'Capuchino là thức uống hòa quyện giữa hương thơm của sữa, vị béo của bọt kem cùng vị đậm đà từ cà phê Espresso. Tất cả tạo nên một hương vị đặc biệt, một chút nhẹ nhàng, trầm lắng và tinh tế.', '2023-12-18', 1,27),
  (55000,'Cappuccino Nóng',0,'Capuchino là thức uống hòa quyện giữa hương thơm của sữa, vị béo của bọt kem cùng vị đậm đà từ cà phê Espresso. Tất cả tạo nên một hương vị đặc biệt, một chút nhẹ nhàng, trầm lắng và tinh tế.', '2023-12-18', 1,27),
  (45000,'Espresso Đá',0,'Một tách Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc.', '2023-12-18', 1,27),
  (45000,'Espresso Nóng',0,'Một tách Espresso nguyên bản được bắt đầu bởi những hạt Arabica chất lượng, phối trộn với tỉ lệ cân đối hạt Robusta, cho ra vị ngọt caramel, vị chua dịu và sánh đặc.', '2023-12-18', 1,27)
--Cold brew
 INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (49000,'Cold Brew Phúc Bồn Tử',0,'Vị chua ngọt của trái phúc bồn tử, làm dậy lên hương vị trái cây tự nhiên vốn sẵn có trong hạt cà phê, hòa quyện thêm vị đăng đắng, ngọt dịu nhẹ nhàng của Cold Brew 100% hạt Arabica Cầu Đất để mang đến một cách thưởng thức cà phê hoàn toàn mới, vừa thơm lừng hương cà phê quen thuộc, vừa nhẹ nhàng và thanh mát bởi hương trái cây đầy thú vị.', '2023-12-18', 1,28),
  (49000,'Cold Brew Sữa Tươi',0,'Thanh mát và cân bằng với hương vị cà phê nguyên bản 100% Arabica Cầu Đất cùng sữa tươi thơm béo cho từng ngụm tròn vị, hấp dẫn.', '2023-12-18', 1,28);
--tra trái cây
 INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (49000,'Trà Long Nhãn Hạt Sen',0,'Thức uống mang hương vị của nhãn, của sen, của trà Oolong đầy thanh mát cho tất cả các thành viên trong dịp Tết này. An lành, thư thái và đậm đà chính là những gì The Coffee House mong muốn gửi trao đến bạn và gia đình.', '2023-12-19', 2,29),
  (49000,'Trà Đào Cam Sả - Đá',0,'Vị thanh ngọt của đào, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', '2023-12-19', 2,29),
  (49000,'Trà Đào Cam Sả - Nóng',0,'Vị thanh ngọt của đào, vị chua dịu của Cam Vàng nguyên vỏ, vị chát của trà đen tươi được ủ mới mỗi 4 tiếng, cùng hương thơm nồng đặc trưng của sả chính là điểm sáng làm nên sức hấp dẫn của thức uống này.', '2023-12-19', 2,29),
  (39000,'Trà Hạt Sen - Đá',0,'Nền trà oolong hảo hạng kết hợp cùng hạt sen tươi, bùi bùi và lớp foam cheese béo ngậy. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.', '2023-12-19', 2,29),
  (49000,'Trà Hạt Sen - Nóng',0,'Nền trà oolong hảo hạng kết hợp cùng hạt sen tươi, bùi bùi thơm ngon. Trà hạt sen là thức uống thanh mát, nhẹ nhàng phù hợp cho cả buổi sáng và chiều tối.', '2023-12-19', 2,29),
  (105000,'Trà Đào Cam Sả Chai Fresh 500ML',0,'Với phiên bản chai fresh 500ml, thức uống "best seller" đỉnh cao mang một diện mạo tươi mới, tiện lợi, phù hợp với bình thường mới và vẫn giữ nguyên vị thanh ngọt của đào, vị chua dịu của cam vàng nguyên vỏ và vị trà đen thơm lừng ly Trà đào cam sả nguyên bản. *Sản phẩm dùng ngon nhất trong ngày. *Sản phẩm mặc định mức đường và không đá.', '2023-12-19', 2,29);
  --tra sua
 INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (55000,'Trà Đen Macchiato',0,'Trà đen được ủ mới mỗi ngày, giữ nguyên được vị chát mạnh mẽ đặc trưng của lá trà, phủ bên trên là lớp Macchiato "homemade" bồng bềnh quyến rũ vị phô mai mặn mặn mà béo béo.', '2023-12-19', 2,30),
  (55000,'Hồng Trà Sữa Trân Châu',0,'Thêm chút ngọt ngào cho ngày mới với hồng trà nguyên lá, sữa thơm ngậy được cân chỉnh với tỉ lệ hoàn hảo, cùng trân châu trắng dai giòn có sẵn để bạn tận hưởng từng ngụm trà sữa ngọt ngào thơm ngậy thiệt đã.', '2023-12-19', 2,30),
  (55000,'Hồng Trà Sữa Nóng',0,'Từng ngụm trà chuẩn gu ấm áp, đậm đà beo béo bởi lớp sữa tươi chân ái hoà quyện. Trà đen nguyên lá âm ấm dịu nhẹ, quyện cùng lớp sữa thơm béo khó lẫn - hương vị ấm áp chuẩn gu trà, cho từng ngụm nhẹ nhàng, ngọt dịu lưu luyến mãi nơi cuống họng.', '2023-12-19', 2,30),
  (55000,'Trà sữa Oolong Nướng Trân Châu',0,'Hương vị chân ái đúng gu đậm đà với trà oolong được “sao” (nướng) lâu hơn cho hương vị đậm đà, hòa quyện với sữa thơm béo mang đến cảm giác mát lạnh, lưu luyến vị trà sữa đậm đà nơi vòm họng.', '2023-12-19', 2,30),
  (55000,'Trà sữa Oolong Nướng (Nóng)',0,'Đậm đà chuẩn gu và ấm nóng - bởi lớp trà oolong nướng đậm vị hoà cùng lớp sữa thơm béo. Hương vị chân ái đúng gu đậm đà - trà oolong được "sao" (nướng) lâu hơn cho vị đậm đà, hoà quyện với sữa thơm ngậy. Cho từng ngụm ấm áp, lưu luyến vị trà sữa đậm đà mãi nơi cuống họng.', '2023-12-19', 2,30),
  (55000,'Trà Sữa Mắc Ca Trân Châu',0,'Mỗi ngày với The Coffee House sẽ là điều tươi mới hơn với sữa hạt mắc ca thơm ngon, bổ dưỡng quyện cùng nền trà oolong cho vị cân bằng, ngọt dịu đi kèm cùng Trân châu trắng giòn dai mang lại cảm giác “đã” trong từng ngụm trà sữa.', '2023-12-19', 2,30);
 --cloudtea
 INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (55000,'CloudTea Oolong Nướng Kem Dừa',0,'Vừa chạm môi là mê mẩn ngay lớp kem dừa beo béo, kèm vụn bánh quy phô mai giòn tan trong miệng. Đặc biệt, trà Oolong nướng đậm đà, hòa cùng sữa dừa ngọt dịu. Hương vị thêm bùng nổ nhờ có thạch Oolong nướng nguyên chất, giòn dai.', '2023-12-19', 4,31),
  (55000,'CloudTea Oolong Nướng Kem Cheese',0,'Hội mê cheese sao có thể bỏ lỡ chiếc trà sữa siêu mlem này. Món đậm vị Oolong nướng - nền trà được yêu thích nhất hiện nay, quyện thêm kem sữa thơm béo. Đặc biệt, chinh phục ngay fan ghiền cheese bởi lớp foam phô mai mềm tan mằn mặn. Càng ngon cực với thạch Oolong nướng nguyên chất giòn dai nhai siêu thích.', '2023-12-19', 4,31),
  (55000,'CloudTea Oolong Nướng Kem Dừa Đá Xay',0,'Trà sữa đá xay - phiên bản nâng cấp đầy mới lạ của trà sữa truyền thống, lần đầu xuất hiện tại Nhà. Ngon khó cưỡng với lớp kem dừa béo ngậy nhưng không ngấy, thêm vụn bánh quy phô mai giòn tan vui miệng. Trà Oolong nướng rõ hương đậm vị, quyện với sữa dừa beo béo, được xay mịn cùng đá, mát rượi trong tích tắc. Đặc biệt, thạch Oolong nướng nguyên chất giúp giữ trọn vị đậm đà của trà sữa đến giọt cuối cùng.', '2023-12-19', 4,31);
  --cloudfee
 INSERT INTO SanPham(gia, tensp, banchay, mota, ngaytao, idloai, idmenu) 
VALUES 
(49000, 'CloudFee Caramel', 0, 'Ngon khó cưỡng bởi xíu đắng nhẹ từ cà phê phin truyền thống pha trộn với Espresso lừng danh nước Ý, quyện vị kem sữa và caramel ngọt ngọt, thêm lớp foam trứng cacao bồng bềnh béo mịn, kèm topping thạch cà phê dai giòn nhai cực cuốn. Một thức uống "điểm mười" cho cả ngày tươi không cần tưới.', '2023-12-19', 4, 32),
(49000, 'CloudFee Hà Nội', 0, 'Khiến bạn mê mẩn ngay ngụm đầu tiên bởi vị đắng nhẹ của cà phê phin truyền thống kết hợp Espresso Ý, quyện hòa cùng chút ngọt ngào của kem sữa, và thơm béo từ foam trứng cacao. Nhấp một ngụm rồi nhai cùng thạch cà phê dai dai giòn giòn, đúng chuẩn "ngon quên lối về". CloudFee Classic là món đậm vị cà phê nhất trong bộ sưu tập nhưng không quá đắng, ngậy nhưng không hề ngấy.', '2023-12-19', 4, 32);
--cloudtea mochi
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) VALUES (69000,'CloudTea Trà Xanh Tây Bắc',1,'Không thể rời môi với Mochi Kem Matcha dẻo mịn, núng nính. Trà Xanh Tây Bắc vị mộc hoà quyện sữa tươi, foam phô mai beo béo và vụn bánh quy giòn tan, là lựa chọn đậm không khí lễ hội. Món không thể thiếu đá, để ngoại hình và chất lượng được đảm bảo.','2023-12-10',4,33),
 (69000,'CloudTea Oolong Berry',1,'Cắn một cái, chua chua ngọt ngọt ngon đến từng tế bào với chiếc Mochi Kem Phúc Bồn Tử! Hút một ngụm, mê luôn Trà Oolong Sữa dịu êm quyện vị dâu, cùng lớp foam phô mai phủ vụn bánh quy phô mai mằn mặn. Món không thể thiếu đá, để ngoại hình và chất lượng được đảm bảo.','2023-12-10',4,33);
  --hi tea tra
 INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (59000,'Hi-Tea Đào Kombucha',0,'Trà hoa Hibiscus 0% caffeine chua nhẹ, kết hợp cùng trà lên men Kombucha hoàn toàn tự nhiên và Đào thanh mát tạo nên Hi-Tea Đào Kombucha chua ngọt cực cuốn. Đặc biệt Kombucha Detox giàu axit hữu cơ, Đào nhiều chất xơ giúp thanh lọc cơ thể và hỗ trợ giảm cân hiệu quả. Lưu ý: Khuấy đều trước khi dùng', '2023-12-19', 5,34),
  (59000,'Hi-Tea Yuzu Kombucha',0,'Trà hoa Hibiscus 0% caffeine thanh mát, hòa quyện cùng trà lên men Kombucha 100% tự nhiên và mứt Yuzu Marmalade (quýt Nhật) mang đến hương vị chua chua lạ miệng. Đặc biệt, Hi-Tea Yuzu Kombucha cực hợp cho team thích detox, muốn sáng da nhờ Kombucha Detox nhiều chất chống oxy hoá cùng Yuzu giàu vitamin C. Lưu ý: Khuấy đều trước khi dùng', '2023-12-19', 5,34),
  (49000,'Hi-Tea Phúc Bồn Tử Mandarin',0,'Nền trà Hibiscus thanh mát, quyện vị chua chua ngọt ngọt của phúc bồn tử 100% tự nhiên cùng quýt mọng nước mang đến cảm giác sảng khoái tức thì.', '2023-12-19', 5,34),
  (49000,'Hi-Tea Yuzu Trân Châu',0,'Không chỉ nổi bật với sắc đỏ đặc trưng từ trà hoa Hibiscus, Hi-Tea Yuzu còn gây ấn tượng với topping Yuzu (quýt Nhật) lạ miệng, kết hợp cùng trân châu trắng dai giòn sần sật, nhai vui vui.', '2023-12-19', 5,34);
  --dda tuyet
 INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (59000,'Hi-Tea Đá Tuyết Yuzu Vải',0,'Vị trà hoa Hibiscus chua chua, kết hợp cùng đá tuyết Yuzu mát lạnh tái tê, thêm miếng vải căng mọng, ngọt ngào sẽ khiến bạn thích thú ngay từ lần thử đầu tiên.', '2023-12-19', 5,35);
--trà xanh TB
 INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (45000,'Trà Xanh Latte',0,'Không cần đến Tây Bắc mới cảm nhận được sự trong trẻo của núi rừng, khi Trà Xanh Latte từ Nhà được chắt lọc từ những búp trà xanh mướt, ủ mình trong sương sớm. Trà xanh Tây Bắc vị thanh, chát nhẹ hoà cùng sữa tươi nguyên kem ngọt béo tạo nên hương vị dễ uống, dễ yêu. Đây là thức uống healthy, giúp bạn tỉnh táo một cách êm mượt, xoa dịu những căng thẳng.', '2023-12-19', 6,36),
  (45000,'Trà Xanh Latte (Nóng)',0,'Trà Xanh Latte (Nóng) là phiên bản rõ vị trà nhất. Nhấp một ngụm, bạn chạm ngay vị trà xanh Tây Bắc chát nhẹ hoà cùng sữa nguyên kem thơm béo, đọng lại hậu vị ngọt ngào, êm dịu. Không chỉ là thức uống tốt cho sức khoẻ, Trà Xanh Latte (Nóng) còn là cái ôm ấm áp của đồng bào Tây Bắc gửi cho người miền xuôi.', '2023-12-19', 6,36),
  (55000,'Trà Xanh Đường Đen',0,'Trà Xanh Đường Đen với hiệu ứng phân tầng đẹp mắt, như phác hoạ núi đồi Tây Bắc bảng lảng trong sương mây, thấp thoáng những nương chè xanh ngát. Từng ngụm là sự hài hoà từ trà xanh đậm đà, đường đen ngọt ngào, sữa tươi thơm béo. Khuấy đều trước khi dùng, để thưởng thức đúng vị', '2023-12-19', 6,36),
  (59000,'Frosty Trà Xanh',0,'Đá Xay Frosty Trà Xanh như lời mời mộc mạc, ghé thăm Tây Bắc vào những ngày tiết trời se lạnh, núi đèo mây phủ. Vị chát dịu, ngọt thanh của trà xanh Tây Bắc kết hợp đá xay sánh mịn, whipping cream bồng bềnh và bột trà xanh trên cùng thêm đậm vị. Đây không chỉ là thức uống mát lạnh bật mood, mà còn tốt cho sức khoẻ nhờ giàu vitamin và các chất chống oxy hoá.', '2023-12-19', 6,36);
  --chocolate
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) VALUES 
 (55000,'Chocolate Đá',0,'Bột chocolate nguyên chất hoà cùng sữa tươi béo ngậy, ấm nóng. Vị ngọt tự nhiên, không gắt cổ, để lại một chút đắng nhẹ, cay cay trên đầu lưỡi.','2023-12-19',6,37);
 --đá xay
 INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (55000,'Frosty Phin-Gato',0,'Đá Xay Frosty Phin-Gato là lựa chọn không thể bỏ lỡ cho tín đồ cà phê. Cà phê nguyên chất pha phin truyền thống, thơm đậm đà, đắng mượt mà, quyện cùng kem sữa béo ngậy và đá xay mát lạnh. Nhân đôi vị cà phê nhờ có thêm thạch cà phê đậm đà, giòn dai. Thức uống khơi ngay sự tỉnh táo tức thì. Lưu ý: Khuấy đều phần đá xay trước khi dùng', '2023-12-19', 7,38),
 (59000,'Frosty Cà Phê Đường Đen',0,'Đá Xay Frosty Cà Phê Đường Đen mát lạnh, sảng khoái ngay từ ngụm đầu tiên nhờ sự kết hợp vượt chuẩn vị quen giữa Espresso đậm đà và Đường Đen ngọt thơm. Đặc biệt, whipping cream beo béo cùng thạch cà phê giòn dai, đậm vị nhân đôi sự hấp dẫn, khơi bừng sự hứng khởi trong tích tắc.', '2023-12-19', 7,38),
  (59000,'Frosty Caramel Arabica',0,'Caramel ngọt thơm quyện cùng cà phê Arabica Cầu Đất đượm hương gỗ thông, hạt dẻ và nốt sô cô la đặc trưng tạo nên Đá Xay Frosty Caramel Arabica độc đáo chỉ có tại Nhà. Cực cuốn với lớp whipping cream béo mịn, thêm thạch cà phê giòn ngon bắt miệng.', '2023-12-19', 7,38),
  (59000,'Frosty Bánh Kem Dâu',0,'Bồng bềnh như một đám mây, Đá Xay Frosty Bánh Kem Dâu vừa ngon mắt vừa chiều vị giác bằng sự ngọt ngào. Bắt đầu bằng cái chạm môi với lớp kem whipping cream, cảm nhận ngay vị beo béo lẫn sốt dâu thơm lừng. Sau đó, hút một ngụm là cuốn khó cưỡng bởi đá xay mát lạnh quyện cùng sốt dâu ngọt dịu. Lưu ý: Khuấy đều phần đá xay trước khi dùng', '2023-12-19', 7,38),
  (59000,'Frosty Choco Chip',0,'Đá Xay Frosty Choco Chip, thử là đã! Lớp whipping cream bồng bềnh, beo béo lại có thêm bột sô cô la và sô cô la chip trên cùng. Gấp đôi vị ngon với sô cô la thật xay với đá sánh mịn, đậm đà đến tận ngụm cuối cùng.', '2023-12-19', 7,38);
 --bánh mặn 
  INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (35000,'Butter Croissant Sữa Đặc',0,'Bánh Butter Croissant bạn đã yêu, nay yêu không lối thoát khi được chấm cùng sữa đặc. Thơm bơ mịn sữa, ngọt ngào lòng nhau!', '2023-12-19', 8,39),
 (25000,'Bánh Mì Gậy Gà Kim Quất',0,'Phiên bản nâng cấp với trọng lượng tăng 80% so với bánh mì que thông thường, đem đến cho bạn bữa ăn nhanh gọn mà vẫn đầy đủ dinh dưỡng. Cắn một miếng là mê mẩn bởi vỏ bánh nướng giòn rụm, nhân đậm vị với từng miếng thịt gà mềm, ướp sốt kim quất chua ngọt, thơm nức đặc trưng. Càng "đúng bài" hơn khi thưởng thức kèm Cà phê đượm vị hoặc trà Hi-Tea thanh mát.', '2023-12-19', 8,39),
  (25000,'Bánh Mì Gậy Cá Ngừ Mayo',0,'Trọng lượng tăng 70% so với bánh mì que thông thường, thêm nhiều dinh dưỡng, thích hợp cho cả bữa ăn nhẹ lẫn ăn no. Ngon hết chỗ chê từ vỏ bánh nướng nóng giòn, cá ngừ đậm đà quyện lẫn sốt mayo thơm béo đến từng hạt bắp ngọt bùi hấp dẫn. Nhâm nhi bánh cùng ly Cà phê thơm nồng hay Hi-Tea tươi mát thì đúng chuẩn "điểm mười".', '2023-12-19', 8,39),
  (15000,'Bánh Mì Que Pate',0,'Vỏ bánh mì giòn tan, kết hợp với lớp nhân pate béo béo đậm đà sẽ là lựa chọn lý tưởng nhẹ nhàng để lấp đầy chiếc bụng đói , cho 1 bữa sáng - trưa - chiều - tối của bạn thêm phần thú vị.', '2023-12-19', 8,39),
  (15000,'Bánh Mì Que Pate Cay',0,'Vỏ bánh mì giòn tan, kết hợp với lớp nhân pate béo béo đậm đà và 1 chút cay cay sẽ là lựa chọn lý tưởng nhẹ nhàng để lấp đầy chiếc bụng đói , cho 1 bữa sáng - trưa - chiều - tối của bạn thêm phần thú vị.', '2023-12-19', 8,39),
   (39000,'Croissant trứng muối',0,'Croissant trứng muối thơm lừng, bên ngoài vỏ bánh giòn hấp dẫn bên trong trứng muối vị ngon khó cưỡng.', '2023-12-19', 8,39),
    (39000,'Chà Bông Phô Mai',0,'Chiếc bánh với lớp phô mai vàng sánh mịn bên trong, được bọc ngoài lớp vỏ xốp mềm thơm lừng. Thêm lớp chà bông mằn mặn hấp dẫn bên trên.', '2023-12-19', 8,39);
    --bánh ngọt
  INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (19000,'Mochi Kem Phúc Bồn Tử',0,'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân phúc bồn tử ngọt ngào. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng.', '2023-12-19', 8,40),
 (19000,'Mochi Kem Dừa Dứa',0,'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân dừa dứa thơm lừng lạ miệng. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng.', '2023-12-19', 8,40),
  (19000,'Mochi Kem Xoài',0,'Bao bọc bởi lớp vỏ Mochi dẻo thơm, bên trong là lớp kem lạnh cùng nhân xoài chua chua ngọt ngọt. Gọi 1 chiếc Mochi cho ngày thật tươi mát. Sản phẩm phải bảo quán mát và dùng ngon nhất trong 2h sau khi nhận hàng.', '2023-12-19', 8,40),
  (35000,'Mousse Red Velvet',0,'Bánh nhiều lớp được phủ lớp kem bên trên bằng Cream cheese.', '2023-12-19', 8,40),
  (35000,'Mousse Tiramisu',0,'Hương vị dễ ghiền được tạo nên bởi chút đắng nhẹ của cà phê, lớp kem trứng béo ngọt dịu hấp dẫn', '2023-12-19', 8,40),
   (39000,'Mousse Gấu Chocolate',0,'Với vẻ ngoài đáng yêu và hương vị ngọt ngào, thơm béo nhất định bạn phải thử ít nhất 1 lần.', '2023-12-19', 8,40);
--snack
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (20000,'Mít Sấy',0,'Mít sấy khô vàng ươm, giòn rụm, giữ nguyên được vị ngọt lịm của mít tươi.', '2023-12-19', 8,41),
 (25000,'Gà Xé Lá Chanh',0,'Thịt gà được xé tơi, mang hương vị mặn, ngọt, cay cay quyện nhau vừa chuẩn, thêm chút thơm thơm thơm từ lá chanh sấy khô giòn giòn xua tan ngay cơn buồn miệng.', '2023-12-19', 8,41);
 --bánh pastry
INSERT INTO SanPham(gia, tensp, banchay,mota, ngaytao, idloai, idmenu) 
VALUES (29000,'Butter Croissant',0,'Cắn một miếng, vỏ bánh ngàn lớp giòn thơm bơ béo, rồi mịn tan trong miệng. Cực dính khi nhâm nhi Butter Croissant với cà phê hoặc chấm cùng các món nước có foam trứng của Nhà', '2023-12-19', 8,42),
(39000,'Choco Croffle',0,'Lạ mắt, bắt vị với chiếc bánh Croffle được làm từ cốt bánh Croissant nướng trong khuôn Waffle tổ ong. Trong mềm mịn, ngoài giòn thơm, thêm topping sô cô la tan chảy, ăn là yêu!', '2023-12-19', 8,42),
 (39000,'Pate Chaud',0,'Ngon nức lòng cùng nhân patê và thịt heo cuộn mình trong vỏ bánh ngàn lớp thơm bơ, giòn rụm.', '2023-12-19', 8,42);
DROP TABLE IF EXISTS HinhSanPham
CREATE TABLE HinhSanPham
(
    idsp INT,
    idhinh INT,
    PRIMARY KEY(idsp, idhinh),
    FOREIGN KEY (idsp) REFERENCES SanPham(idsp),-- gtri trong cột RoleId phải là 1 giá trị hợp lệ trong cột Id của bảng Roles
    FOREIGN KEY (idhinh) REFERENCES HinhAnh(idhinh)
)
INSERT INTO HinhSanPham VALUES(12,1)
INSERT INTO HinhSanPham VALUES(7,2)
INSERT INTO HinhSanPham VALUES(10,4)
INSERT INTO HinhSanPham VALUES(11,3),(13,6),(14,5),
INSERT INTO HinhSanPham VALUES(15,30),(16,31);
INSERT INTO HinhSanPham VALUES(1,22)
INSERT INTO HinhSanPham VALUES(7,2)
INSERT INTO HinhSanPham VALUES(17,17)
INSERT INTO HinhSanPham VALUES(17,22)
INSERT INTO HinhSanPham VALUES(58,44)
INSERT INTO HinhSanPham VALUES(54,41)
INSERT INTO HinhSanPham VALUES(55,40)
INSERT INTO HinhSanPham VALUES(56,36),(57,37),(58,39),(59,33),(60,42),(61,35),(62,34),(63,38),(64,43),(65,32);
--hinh trà
INSERT INTO HinhSanPham VALUES(78,45),(79,46),(80,47),(81,48),(82,49),(83,50),(84,51),(85,52);
--hình caremel
INSERT INTO HinhSanPham VALUES(86,53),(87,54),(88,55),(89,56),(90,57),(91,58);
--Cà Phê Highlight
INSERT INTO HinhSanPham VALUES(92,59),(93,60);
--Cà Phê VN
INSERT INTO HinhSanPham VALUES(94,61),(95,62),(96,63),(97,64),(98,65),(99,66);
--Cà Phê máy
INSERT INTO HinhSanPham VALUES(100,67),(101,68),(102,69),(103,70),(104,71),(105,72),(106,73),(107,74),(108,75),(109,76),(110,77);
--Cold brew
INSERT INTO HinhSanPham VALUES(111,78),(112,79);
--trà trái cây
INSERT INTO HinhSanPham VALUES(113,80),(114,81),(115,82),(116,83),(117,84),(118,85);
--trà sua
INSERT INTO HinhSanPham VALUES(119,86),(120,87),(121,88),(122,89),(123,90),(124,91);
--cloudtea
INSERT INTO HinhSanPham VALUES(125,92),(126,93),(127,92);
--cloudfee
INSERT INTO HinhSanPham VALUES(128,1),(129,1);
--cloudteamochi
INSERT INTO HinhSanPham VALUES(130,30),(131,31);
--hitea tra
INSERT INTO HinhSanPham VALUES(132,94),(133,95),(134,96),(135,97);
--datuyet
INSERT INTO HinhSanPham VALUES(136,98);
--tx Tb
INSERT INTO HinhSanPham VALUES(137,99),(138,100),(139,101),(140,102);
--chocolate
INSERT INTO HinhSanPham VALUES(141,103);
--đá xay
INSERT INTO HinhSanPham VALUES(142,104),(143,105),(144,106),(145,107),(146,108);
--bánh mặn
INSERT INTO HinhSanPham VALUES(147,109),(148,110),(149,111),(150,112),(151,112),(152,113),(153,114);
--bánh ngọt
INSERT INTO HinhSanPham VALUES(154,115),(155,116),(156,117),(157,118),(158,119),(159,120);
--snack
INSERT INTO HinhSanPham VALUES(160,121),(161,122);
--bánh pastry
INSERT INTO HinhSanPham VALUES(162,123),(163,124),(164,125);
select * from hinhanh;
select * from sanpham;

SELECT * from Sanpham s
OUTER APPLY (SELECT * FROM HinhSanPham WHERE idsp = s.idsp ORDER BY idsp limit 1) a

SELECT S.idsp, S.idhinh, H.tenhinh
FROM HinhSanPham S 
JOIN HinhAnh H ON S.idhinh = H.idhinh;

SELECT S.idsp, S.idhinh, GROUP_CONCAT(H.tenhinh) AS tenhinhs
FROM HinhSanPham S 
LEFT JOIN HinhAnh H ON S.idhinh = H.idhinh
GROUP BY S.idsp, S.idhinh;

                
SELECT idsize, tensize, giasize FROM Size WHERE idsize = $idsize;









