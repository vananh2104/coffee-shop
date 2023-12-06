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
-- 2: nhan vien phuc vu
-- 3: tinh tien

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
-- 2 - 1 -- nguyen van A co vai tro quan ly
-- 2 - 2 -- nguyen van A co vai tro nhan vien phuc vu
-- 3 - 3 -- tran thi b co vai tro tinh tien
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
-- 1 - 1
-- 1 - 2
-- 1 - 4

INSERT INTO Users(
    LastName,
    FirstName,
    Gender,
    Address,
    PhoneNumber,
    Username,
    Email,
    Password,
    CreatedAt,
    CreatedUserId, 
    UpdatedAt,
    UpdatedUserId) 
VALUES(
'Tran',
'Van Anh 2', 
0, 
'24 Thanh Son',
'000900909',
'admin3',
'admin3@vananh.com',
'123456',
'2023-12-06',
NULL,
'2023-12-06',
NULL)










