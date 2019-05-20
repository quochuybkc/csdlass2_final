USE ass2
GO

-----  Lấy Thông tin cửa hàng có doanh thu > x, diện tích > y và tên nhân viên có chữ 'h'
CREATE PROC select3aa(@dt float, @doanhthu float)
AS

SELECT DISTINCT
	ch.CH_ID,
	ch.CH_Ten,
	ch.CH_DiaChi,
	ch.CH_SDT
FROM dbo.CuaHang ch, dbo.NhanVien nv 
WHERE ch.CH_ID = nv.CH_ID AND ch.DoanhThu > @doanhthu AND ch.ChieuDai*ch.ChieuRong > @dt AND (nv.NV_HovaTen LIKE '%h%')
ORDER BY ch.CH_ID 

GO

EXEC select3aa 500, 5000000
GO
----- Lấy thông tin cửa hàng có doanh thu < x, số lượng nhân viên >y
CREATE PROC select3b(@doanhthu float, @sl int)
AS  
SELECT 
	ch.CH_Ten AS N'Tên cửa hàng', 
	ch.CH_DiaChi AS N'Địa chỉ', 
	ch.DoanhThu AS N'Doanh Thu',
	ch.CH_SDT AS N'SĐT',
	count(nv.NV_ID) AS 'SLNV'
FROM dbo.CuaHang ch, dbo.NhanVien nv
WITH(INDEX (index1))
WHERE ch.CH_ID = nv.CH_ID AND ch.DoanhThu < @doanhthu
GROUP BY ch.CH_Ten, ch.CH_DiaChi, ch.DoanhThu, ch.CH_SDT
HAVING count(nv.NV_ID) > @sl
ORDER BY ch.CH_DiaChi DESC;

GO

EXEC select3b 10000000, 2

GO
---------------------------------------

 
