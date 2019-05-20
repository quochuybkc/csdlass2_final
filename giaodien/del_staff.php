<?php

	if(isset($_POST['idnv'])){
		include("init.php");
		$id = $_POST['idnv'];
		$status = 1;
		$tsql_dropSP = "IF OBJECT_ID('deletenvhasid', 'P') IS NOT NULL  
                DROP PROCEDURE deletenvhasid";  
		$stmt1 = sqlsrv_query( $conn, $tsql_dropSP); 
		$createSP ="CREATE PROCEDURE deletenvhasid  
			@eID varchar(10), 
			@stt int OUTPUT
  		AS  
 		 	IF EXISTS(select NV_ID from dbo.NhanVien where NV_ID = @eID)
				DELETE FROM NhanVien WHERE NV_ID = @eID
			ELSE	  
				SET @stt=0
		";
		$stmt2 = sqlsrv_query( $conn, $createSP); 
		$para = array(   
            array($id, SQLSRV_PARAM_IN),  
            array(&$status, SQLSRV_PARAM_INOUT)  
		  );		
		$callSP = "EXEC deletenvhasid @eID=? , @stt=?";
		$stmt3 = sqlsrv_prepare( $conn, $callSP, $para); 
		if (sqlsrv_execute($stmt3)) {
			sqlsrv_next_result($stmt3);
			echo $status;
		}
		else {
			$errors=sqlsrv_errors();
			foreach( $errors as $err ) {
				echo "Error code:" .$err['code'] ."</br>";
				echo "Message:" .$err['message'] ."</br>";
			}
		}
		sqlsrv_free_stmt( $stmt1);  
		sqlsrv_free_stmt( $stmt2);  
		sqlsrv_free_stmt( $stmt3);
		sqlsrv_close($conn);
	}

?>