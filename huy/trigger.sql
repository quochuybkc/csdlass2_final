USE ass2

GO

CREATE TRIGGER insertolder
ON dbo.NhanVien
AFTER INSERT
AS
BEGIN
	SET NOCOUNT ON;
	DECLARE @age date
	SELECT @age=i.NgaySinh FROM INSERTED i 
	IF (datediff(day, @age, getdate())/365 > 30)
	BEGIN
		PRINT 'Khong duoc insert nguoi tren 30 tuoi!!!'
		ROLLBACK TRANSACTION
	END

END

GO


USE ass2
GO



CREATE TRIGGER DHupateSL
ON dbo.DonHang
FOR INSERT
AS
BEGIN
	SET NOCOUNT ON;
	UPDATE dbo.HangHoa
	SET HH_SoLuong = hh.HH_SoLuong - (SELECT i2.SL FROM INSERTED i2 WHERE hh.HH_ID = i.HH_ID)
	FROM dbo.HangHoa hh, INSERTED i
    WHERE hh.HH_ID = i.HH_ID

END

GO 




