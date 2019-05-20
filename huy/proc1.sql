USE ass2

GO

CREATE PROC insertDichVu (@MaDV varchar(10), @LoaiDV nvarchar(20), @TenDV nvarchar(20))
AS
IF len(@MaDV) > 5
BEGIN
	PRINT 'Ma dich vu it hon 5 ki tu!!!';	
END
ELSE
BEGIN
	INSERT INTO dbo.DichVu
	(
		MaDichVu,
		LoaiDichVu,
		TenDichVu
	)
	VALUES
	(
		@MaDV, -- MaDichVu - varchar
		@LoaiDV, -- LoaiDichVu - nvarchar
		@TenDV -- TenDichVu - nvarchar
	)	
END

GO
EXEC insertDichVu '123Agg', N'Có phí', N'Giải trí';
GO

