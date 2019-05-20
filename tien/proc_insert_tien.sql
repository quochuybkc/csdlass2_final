USE ass2
GO

CREATE PROCEDURE InsertNhanVien
@NV_ID varchar(10),
@NV_HovaTen nvarchar(25),
@NgaySinh date,
@CaLamViec nvarchar(10),
@NV_CMND char(9),
@TenDangNhap varchar(20),
@MatKhau varchar(20),
@CH_ID varchar(10)
AS
SELECT CASE 
            WHEN MAX(NV_ID) > 1000 
               THEN 
					BEGIN
						PRINT 'Ma nhan vien khong vuot qua 1000!';
					END
               ELSE 
					BEGIN
						INSERT INTO dbo.NhanVien
						(
						 NV_ID, NV_HovaTen, NgaySinh, CaLamViec, NV_CMND, TenDangNhap, MatKhau, CH_ID
						) 
						VALUES 
						( 
						@NV_ID, @NV_HovaTen, @NgaySinh, @CaLamViec, @NV_CMND, @TenDangNhap, @MatKhau, @CH_ID
						 ) 
						END
       END as NV_ID, * 
FROM dbo.NhanVien


EXEC InsertNhanVien '098', N'Vũ', '1998-04-11', N‘sáng’, ‘123456789’, ‘tlvu’, ‘vu9’, ‘1a’;

