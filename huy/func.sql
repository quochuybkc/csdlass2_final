USE ass2
GO
--- đếm số nhân viên có tuổi > x, 10<x<30
ALTER FUNCTION func4a(@age int)
RETURNS nvarchar(30)
AS
BEGIN 
	DECLARE @sl int, @err nvarchar(30)
	IF @age < 10 OR @age > 30 
		BEGIN 
			SET @err = N'Tuổi từ 10 tới 30!'  
			RETURN @err
		END 	 
	ELSE
		SELECT @sl = count(nv.NV_ID)
		FROM dbo.NhanVien nv
		WHERE datediff(day, year(nv.NgaySinh), getdate())/365 > @age	
	RETURN @sl
END


SELECT dbo.func4a(20) AS'SLNV';


GO

SELECT dbo.func4a(20) AS'SLNV'

GO
-- Tính giá hàng hóa khi có khuyến mãi

CREATE FUNCTION newprice(@mathang nvarchar(20))
RETURNS nvarchar(30)
AS
BEGIN
	DECLARE @err nvarchar(30), @price float
	SELECT @price = hh.Gia FROM dbo.HangHoa hh WHERE hh.HH_Ten = @mathang
	IF @mathang NOT IN (SELECT hh.HH_Ten FROM dbo.HangHoa hh ) 
		BEGIN
			SET @err = N'Hàng hóa không tồn tại!'
			RETURN @err
		END 
	IF NOT EXISTS(SELECT hh.KM_ID FROM dbo.HangHoa hh WHERE hh.HH_Ten = @mathang)
		RETURN	N'Không có khuyến mãi!'
	ELSE
		BEGIN 
			SELECT @price = (hh.Gia - hh.Gia*km.Discount/100) FROM dbo.HangHoa hh, dbo.KhuyenMai km 
			WHERE hh.HH_Ten = @mathang AND hh.KM_ID = km.KM_ID
		END 
	RETURN @price
END 
GO

SELECT hh.HH_Ten AS N'Mặt hàng', hh.Gia AS N'Giá trước', dbo.newprice(N'giấy') AS N'Giá sau' 
FROM dbo.HangHoa hh
WHERE hh.HH_Ten = N'giấy';

GO



