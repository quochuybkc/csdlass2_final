USE ass2
GO
----------------------------2a
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


----------------------------2b

CREATE TABLE DH_edit(
    change_id INT IDENTITY PRIMARY KEY,
    DH_ID varchar(10) NOT NULL, 
	KH_ID varchar(10) NOT NULL,
	HH_ID varchar(10) NOT NULL,
    TongTien varchar(10) NOT NULL,
    TienKhuyenMai varchar(10),
	SL int NOT NULL,
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
        KH_ID,
        HH_ID,
        TongTien,
        TienKhuyenMai,
		SL, 
        updated_at, 
        operation
    )
    SELECT
        i.DH_ID, 
        KH_ID,
        HH_ID,
        TongTien,
        TienKhuyenMai,
		i.SL,
        GETDATE(),
        'INS'
    FROM
        inserted i
    UNION ALL
    SELECT
        d.DH_ID, 
        KH_ID,
        HH_ID,
        TongTien,
        TienKhuyenMai,
		d.SL,
        GETDATE(),
        'DEL'
    FROM
        deleted d;
END

----------------------------
INSERT INTO [dbo].[DonHang]
           ([DH_ID]
           ,[KH_ID]
           ,[HH_ID]
           ,[TongTien]
           ,[TienKhuyenMai]
           ,[SL])
     VALUES
           ('dh18','kh4','hh3',13676792,0,12)
----------------------------
DELETE FROM 
    dbo.DonHang
WHERE 
    DH_id = 'dh1';

----------------------------
SELECT 
    * 
FROM 
    DH_edit;



----------------------------------------------------------2a


CREATE TRIGGER before_khachhang_update 
   ON dbo.KhachHang
    for UPDATE 
	AS 
BEGIN
	DECLARE @a varchar(10), @b nvarchar(20), @c varchar(20), @d nvarchar(20), @e varchar(20), @f int
	SELECT @a=d.KH_ID, @b=d.KH_HoVaTen, @c = d.KH_CMND, @d= d.KH_DiaChi, @e=d.KH_SDT,@f=d.KH_DiemTichLuy
	FROM INSERTED d
	INSERT INTO KH_edit(KH_ID, KH_HoVaTen,KH_CMND,KH_DiaChi,KH_SDT,KH_DiemTichLuy,changedate,action)
    VALUES(
		@a,@b,@c,@d,@e,@f,getdate(),'update'
	)
	UPDATE dbo.KhachHang SET KH_ID=@a, KH_HoVaTen=@b, KH_CMND=@c, KH_DiaChi=@d, KH_SDT=@e, KH_DiemTichLuy=@f WHERE @a=dbo.KhachHang.KH_ID
END
-------------------------------
UPDATE dbo.KhachHang 
SET 
    KH_DiemTichLuy = 70

WHERE
    KH_ID = 'kh7';
	     
	     
SELECT  * FROM KH_edit;
