CREATE PROCEDURE newCustomer ( @MaThe varchar(10), @HoTen nvarchar(20), @CMT char(9), @DiaChi nvarchar(20), @SDT char(10) )
AS
IF len(@CMT) < 9
BEGIN
	PRINT 'Thong tin khong hop le!!!';	-- CMT của ta (cũ) thường có 9 số và với loại thẻ mới có > 10 số, vậy với mã thẻ nhỏ hơn 9 số là không hợp lệ
END
ELSE
BEGIN
	INSERT INTO dbo.KhachHang
	(
		KH_ID, KH_HoVaTen, KH_CMND, KH_DiaChi, KH_SDT
	)
	VALUES
	(
		@MaThe,	@HoTen,	@CMT, @DiaChi, @SDT
	)	
END

EXECUTE newCustomer '9704480607', N'Nguyễn Quốc Luân', '241790019', 'Phường An Khánh', '0943215448'; 


EXECUTE newCustomer '9704480607', N'Nguyễn Quốc Luân', '24179001', 'Phường An Khánh', '0943215448'; 