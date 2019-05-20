-- Ham kiem tra diem tich luy cua khach hang, neu > 100 = VIP. duoi 100 ko co VIP
ALTER FUNCTION Cau4(@X INT)
RETURNS varchar(10)
AS
BEGIN 

	DECLARE @SL int, @err nvarchar(30)
	IF @X < 100
		BEGIN 
			SET @err = N'KHONG CO!'  
			RETURN @err
		END 	 
	ELSE
		SELECT @SL = count(KH.KH_ID)
		FROM dbo.KhachHang KH
		WHERE KH.KH_DiemTichLuy > @X	
	RETURN @SL

END

GO

SELECT dbo.Cau4(100) AS'SO LUONG KHACH HANG (VIP > 100 DIEM)';

-- Ham kiem tra so luong cua hang TIEM NANG, TOT, RAT TOT
	--	5,000,000 - 8,000,000 xep vao tiem nang, 8,000,000 - 15,000,000 xep vao phat trien TOT, > 15,000,000 RAT TOT

CREATE FUNCTION Cau4b(@X varchar(10))
RETURNS varchar(10)
AS
BEGIN 

	DECLARE @XL int, @err nvarchar(30)
	IF @X = 'TIEM NANG'
		BEGIN 
			SELECT @XL = count(CH.CH_ID)
			FROM dbo.CuaHang CH
			WHERE CH.DoanhThu > 5000000 AND CH.DoanhThu < 8000000	
			RETURN @XL
		END 	 
	ELSE IF @X = 'TOT'
		BEGIN 
			SELECT @XL = count(CH.CH_ID)
			FROM dbo.CuaHang CH
			WHERE CH.DoanhThu > 5000000 AND CH.DoanhThu < 8000000	
			RETURN @XL
		END 
	ELSE IF @X = 'RAT TOT'
		BEGIN 
			SELECT @XL = count(CH.CH_ID)
			FROM dbo.CuaHang CH
			WHERE CH.DoanhThu > 15000000
			RETURN @XL
		END 
	RETURN 0

END

GO

SELECT dbo.Cau4b('RAT TOT') AS'DOANH THU CUA HANG RAT TOT';
SELECT dbo.Cau4b('TOT') AS'DOANH THU CUA HANG TOT';
SELECT dbo.Cau4b('TIEM NANG') AS'DOANH THU CUA HANG TIEM NANG';