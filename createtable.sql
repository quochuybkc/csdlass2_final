USE ass2

GO

CREATE TABLE CuaHang
(
	CH_ID varchar(10) PRIMARY KEY,
	CH_Ten nvarchar(20) NOT NULL,
	CH_DiaChi nvarchar(40),
	ChieuDai float,
	ChieuRong float,
	DoanhThu float,
	CH_SDT char(10) NOT NULL,
	NV_ID  varchar(10) 

);

GO

CREATE TABLE NhanVien
(
	NV_ID varchar(10) PRIMARY KEY,
	NV_HovaTen nvarchar(25) NOT NULL,
	NgaySinh date NOT NULL,
	CaLamViec nvarchar(10) NOT NULL,
	NV_CMND char(9), 
	TenDangNhap varchar(20) NOT NULL UNIQUE,
	MatKhau varchar(20) NOT NULL,
	CH_ID varchar(10) FOREIGN KEY REFERENCES dbo.CuaHang(CH_ID)
);
GO


ALTER TABLE dbo.NhanVien
ADD FOREIGN KEY(CH_ID) REFERENCES dbo.CuaHang(CH_ID)
ON UPDATE CASCADE
ON DELETE CASCADE
 

GO


CREATE TABLE DichVu
(
	MaDichVu varchar(10) PRIMARY KEY,
	LoaiDichVu nvarchar(20) NOT NULL,
	TenDichVu  nvarchar(20) NOT NULL 
);

GO

CREATE TABLE KhachHang
(
	KH_ID varchar(10) PRIMARY KEY,
	KH_HoVaTen nvarchar(20) NOT NULL,
	KH_CMND char(9) NOT NULL,
	KH_DiaChi nvarchar(20),
	KH_SDT char(10),
	KH_DiemTichLuy int DEFAULT 0
	  
);



GO
CREATE TABLE KhuyenMai
(
	KM_ID varchar(10) PRIMARY KEY,
	KM_Ten nvarchar(30),
	NgayBatDau date NOT NULL,
	NgayKetThuc date NOT NULL,
	NhaTaiTro nvarchar(20),
	KM_SoLuong int NOT NULL,
	Discount int
);

GO


CREATE TABLE DonHang
(
	DH_ID varchar(10) PRIMARY KEY,
	KH_ID varchar(10) NOT NULL FOREIGN KEY REFERENCES dbo.KhachHang(KH_ID),
	HH_ID varchar(10) NOT NULL, 
	TongTien varchar(10) NOT NULL,
	TienKhuyenMai varchar(10),
	SL int NOT NULL
)
GO
 
 CREATE TABLE Co
(
	CH_ID varchar(10) FOREIGN KEY REFERENCES dbo.CuaHang(CH_ID),
	MaDichVu varchar(10) FOREIGN KEY REFERENCES dbo.DichVu(MaDichVu),
	PRIMARY KEY (CH_ID, MaDichVu)
);

GO

CREATE TABLE SuDung
(
	KH_ID varchar(10) FOREIGN KEY REFERENCES dbo.KhachHang(KH_ID),
	MaDichVu varchar(10) FOREIGN KEY REFERENCES dbo.DichVu(MaDichVu),
	PRIMARY KEY (KH_ID, MaDichVu)
);

GO


CREATE TABLE HangHoa
(
	HH_ID varchar(10) PRIMARY KEY,
	HH_Ten nvarchar(20) NOT NULL,
	Gia varchar(10) NOT NULL,
	HH_DiemTichLuy int DEFAULT 0,
	HH_SoLuong int DEFAULT 0,
	NSX date NOT NULL,
	HSD date NOT NULL,
	KM_ID varchar(10) FOREIGN KEY REFERENCES dbo.KhuyenMai(KM_ID)
);
 GO



CREATE TABLE Ban
(
	NV_ID varchar(10) FOREIGN KEY REFERENCES dbo.NhanVien(NV_ID),
	HH_ID varchar(10) FOREIGN KEY REFERENCES dbo.HangHoa(HH_ID),
	PRIMARY KEY (NV_ID, HH_ID)
);

GO

ALTER TABLE dbo.CuaHang 
ADD  FOREIGN KEY (NV_ID) REFERENCES dbo.NhanVien(NV_ID);

GO

CREATE TABLE NhanVien_SDT
(
	NV_SDT varchar(10) NOT NULL,
	PRIMARY KEY (NV_SDT, NV_ID)
);

GO

ALTER TABLE dbo.NhanVien_SDT
ADD FOREIGN KEY (NV_ID) REFERENCES dbo.NhanVien(NV_ID)
ON DELETE CASCADE
ON UPDATE CASCADE

GO
CREATE TABLE ThucAn
(
	HH_ID varchar(10) FOREIGN KEY REFERENCES dbo.HangHoa(HH_ID),
	LoaiThucAn nvarchar(10) NOT NULL -- chien, xao, nuong, luoc, nhanh,..
	PRIMARY KEY (HH_ID)
);

GO
CREATE TABLE ThucUong
(
	HH_ID varchar(10) FOREIGN KEY REFERENCES dbo.HangHoa(HH_ID),
	LoaiThucUong nvarchar(10) NOT NULL --co ga,pha che,...
	PRIMARY KEY (HH_ID)
);

GO

CREATE TABLE SanPhamKhac
(
	HH_ID varchar(10) FOREIGN KEY REFERENCES dbo.HangHoa(HH_ID),
	PRIMARY KEY (HH_ID)
);

GO

CREATE TABLE The
(
	HH_ID varchar(10) FOREIGN KEY REFERENCES dbo.HangHoa(HH_ID),
	LoaiThe nvarchar(10) NOT NULL --game, dien thoai,...
	PRIMARY KEY (HH_ID)
);

