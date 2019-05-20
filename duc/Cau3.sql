USE ass2
GO

-----  Lấy thông tin Hàng hóa có số lượng hàng khuyến mãi > x, Giảm giá Discount > y, hàng hóa có chữ 'a'
ALTER PROCEDURE Cau3a(@SL float, @GiaKM float)
AS

SELECT DISTINCT
	HH.HH_ID,
	HH.HH_Ten,
	HH.Gia,
	KM.KM_SoLuong
FROM dbo.KhuyenMai KM, dbo.HangHoa HH 
WHERE KM.KM_ID = HH.KM_ID AND KM.KM_SoLuong > @SL AND KM.Discount > @GiaKM AND (HH.HH_Ten LIKE '%a%')
ORDER BY HH.HH_Ten

GO

EXEC Cau3a 50, 20
GO

----- Lấy thông tin nhân viên có > x (SDT)
CREATE PROCEDURE Cau3b(@x int)
AS  
SELECT 
	NV.NV_ID,
	NV.NV_HovaTen,
	count(SDT.NV_ID) AS 'SL'
FROM dbo.NhanVien NV, dbo.NhanVien_SDT SDT
WHERE NV.NV_ID = SDT.NV_ID
GROUP BY NV.NV_ID, NV.NV_HovaTen
HAVING count(SDT.NV_ID) > @x
ORDER BY NV.NV_ID, NV.NV_HovaTen ASC;

GO

EXEC Cau3b 1
GO