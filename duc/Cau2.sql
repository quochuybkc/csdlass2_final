-- CREATE TRIGGER BEFORE: 
	-- Truoc khi them 'ITEM KHUYEN MAI' kiem tra 'So luong hang Khuyen Mai' co phu hop hay khong!!!
ALTER TRIGGER Cau2a
ON dbo.KhuyenMai
FOR INSERT
AS
BEGIN
	DECLARE @start date, @end date
	SELECT @start = Item.NgayBatDau, @end = Item.NgayKetThuc
	FROM INSERTED Item

	IF( DATEDIFF( day, @start, @end) < 0  OR DATEDIFF(day, GETDATE(), @end) < 0 )
		BEGIN
			PRINT 'Thoi gian khuyen mai khong hop le.'
			ROLLBACK TRANSACTION
		END
END

GO

INSERT INTO dbo.KhuyenMai (KM_ID, KM_Ten, NgayBatDau, NgayKetThuc, KM_SoLuong)
VALUES ('km7', 'Mừng sinh nhật 1 tuổi', '2019-05-20', '2019-05-17', 7)

GO


-- CREATE TRIGGER AFTER: 
	-- Khách sau khi có đơn hàng ta cập nhật điểm tích lũy
ALTER TRIGGER Cau2b
ON dbo.DonHang
AFTER INSERT
AS
BEGIN
	DECLARE @HangHoaID varchar(10), @HangHoaTen nvarchar(20), @KH_Maso varchar(10)
	UPDATE dbo.KhachHang
	SET KH_DiemTichLuy = KH_DiemTichLuy + (SELECT HH.HH_DiemTichLuy FROM dbo.HangHoa HH WHERE HH.HH_ID = ITEM.HH_ID)*ITEM.SL
	FROM dbo.HangHoa HH, INSERTED ITEM
END

GO

INSERT INTO dbo.DonHang (DH_ID, KH_ID, HH_ID, TongTien, SL)
VALUES ('80420', 'kh1', 'hh3', '28000', 4)