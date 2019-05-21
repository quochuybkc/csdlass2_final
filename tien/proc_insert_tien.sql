USE ass2
GO

create PROCEDURE InsertNhanViena
@NV_ID varchar(10),
@NV_HovaTen nvarchar(25),
@NgaySinh date,
@CaLamViec nvarchar(10),
@NV_CMND char(9),
@TenDangNhap varchar(20),
@MatKhau varchar(20),
@CH_ID varchar(10)
AS
begin 
	if(@NV_ID>1000)
		print N'không dc insert nhan vien co ma >1000' 
	else
		begin

			INSERT INTO [dbo].[NhanVien]
				([NV_ID]
				,[NV_HovaTen]
				,[NgaySinh]
				,[CaLamViec]
				,[NV_CMND]
				,[TenDangNhap]
				,[MatKhau]
				,[CH_ID])
			VALUES
           (
				@NV_ID ,
				@NV_HovaTen ,
				@NgaySinh ,
				@CaLamViec ,
				@NV_CMND ,
				@TenDangNhap, 
				@MatKhau,
				@CH_ID 
		   )


		end
end





EXEC InsertNhanViena '098', N'Vũ', '1998-04-11', N'sáng' , '123456789', 'assa', 'sasas', '2a';

EXEC InsertNhanViena '1092', N'Vũ', '1998-04-11', N'sáng' , '123456789', 'assa', 'sasas', '2a';


