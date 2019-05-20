USE ass2
GO
----------------------------
CREATE TABLE KH_edit (
    	id INT IDENTITY(1,1) PRIMARY KEY,
   	KH_ID varchar(10) NOT NULL,
KH_HoVaTen nvarchar(20) NOT NULL,
KH_CMND char(9) NOT NULL,
	KH_DiaChi nvarchar(20),
	KH_SDT char(10),
	KH_DiemTichLuy int DEFAULT 0,
       changedate DATETIME DEFAULT NULL,
       action VARCHAR(50) DEFAULT NULL
);
----------------------------
CREATE TRIGGER before_khachhang_update 
    BEFORE UPDATE ON dbo.KhachHang
    FOR EACH ROW 
BEGIN
    INSERT INTO KH_edit
    SET action = 'update',
		KH_ID = OLD.KH_ID,
		KH_HoVaTen = OLD.KH_HoVaTen,
		KH_CMND = OLD.KH_CMND,
		KH_DiaChi = OLD.KH_DiaChi,
		KH_SDT = OLD.KH_SDT,
		KH_DiemTichLuy = OLD.KH_DiemTichLuy,
        changedate = NOW(); 
END

----------------------------
UPDATE dbo.KhachHang 
SET 
    KH_DiemTichLuy = 9
WHERE
    KH_ID = kh6;
-truy vấn trên bảng KH_edit:
SELECT  * FROM KH_edit;

----------------------------

CREATE TABLE DH_edit(
    change_id INT IDENTITY PRIMARY KEY,
    DH_ID int IDENTITY(0,1) NOT NULL,
	MatHang nvarchar(20) NOT NULL,
	NhanVienBan nvarchar(20),
	TongTien varchar(10) NOT NULL,
	DiemTichLuy int,
	TienKhuyenMai varchar(10),
    updated_at DATETIME NOT NULL,
    operation CHAR(3) NOT NULL,
    CHECK(operation = 'INS' or operation='DEL')
);
----------------------------
CREATE TRIGGER trg_product_edit
ON dbo.DonHang
AFTER INSERT, DELETE
AS
BEGIN
    SET NOCOUNT ON;
    INSERT INTO DH_edit(
        DH_ID, 
        MatHang,
        NhanVienBan,
        TongTien,
        DiemTichLuy,
        TienKhuyenMai, 
        updated_at, 
        operation
    )
    SELECT
        i.DH_ID,
        MatHang,
        NhanVienBan,
        TongTien,
        DiemTichLuy,
        i.TienKhuyenMai,
        GETDATE(),
        'INS'
    FROM
        inserted i
    UNION ALL
    SELECT
        d.DH_ID,
        MatHang,
        NhanVienBan,
        TongTien,
        DiemTichLuy,
        d.TienKhuyenMai,
        GETDATE(),
        'DEL'
    FROM
        deleted d;
END

----------------------------
DELETE FROM 
    dbo.DonHang
WHERE 
    DH_id = 3;

----------------------------
SELECT 
    * 
FROM 
    DH_edit;
