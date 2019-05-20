<?php

	if(isset($_POST['uname'])&&isset($_POST['pw'])){
		include("init.php");
        // câu sql gọi function
        $tsql_dropSP = "IF OBJECT_ID('loginnv1', 'P') IS NOT NULL  
                DROP PROCEDURE loginnv1";  
        $stmt1 = sqlsrv_query( $conn, $tsql_dropSP);
        $Name='';
		$createSP ="CREATE PROCEDURE loginnv1  
			@tdn varchar(20), 
            @mk varchar(20),
			@name nvarchar(25) OUTPUT 
  		AS  
	        IF NOT EXISTS(SELECT nv.NV_ID FROM dbo.NhanVien nv WHERE nv.TenDangNhap = @tdn AND nv.MatKhau = @mk)
		        SET @name='0'
            ELSE
                BEGIN
                    DECLARE @tmp nvarchar(25)
                    SELECT @tmp=nv.NV_HoVaTen FROM dbo.NhanVien nv WHERE nv.TenDangNhap = @tdn AND nv.MatKhau = @mk
                    SET @name=@tmp
                END    
		";
		$stmt2 = sqlsrv_query( $conn, $createSP); 
		$para = array(   
            array($_POST['uname'], SQLSRV_PARAM_IN),  
            array($_POST['pw'], SQLSRV_PARAM_IN),
            array(&$Name, SQLSRV_PARAM_INOUT)  
		  );		
		$callSP = "EXEC loginnv1 @tdn=? , @mk=?, @name=?";
		$stmt3 = sqlsrv_prepare( $conn, $callSP, $para); 
		if (sqlsrv_execute($stmt3)) {
            sqlsrv_next_result($stmt3);
            echo $Name;
        }
        else{
            $errors=sqlsrv_errors();
			foreach( $errors as $err ) {
				echo "Error code:" .$err['code'] ."</br>";
				echo "Message:" .$err['message'] ."</br>";
			}
        }
    }
	sqlsrv_close($conn);
?>