<?php
	
	if(isset($_POST['id'])&&isset($_POST['ten'])&&isset($_POST['ns'])&&isset($_POST['ca'])&&isset($_POST['cmnd'])&&isset($_POST['tdn'])&&isset($_POST['mk'])&&isset($_POST['idch'])){
		include("init.php");
		$a = $_POST['id'];
		$g = $_POST['ten'];
		$b = $_POST['ca'];
		$c = $_POST['cmnd'];
		$d = $_POST['tdn'];
		$e = $_POST['mk'];
		$f = $_POST['idch'];
		$h = $_POST['ns'];
		$addstaff = "INSERT INTO NhanVien (
											NV_ID, 
											NV_HovaTen,
											NgaySinh, 
											CaLamViec,
											NV_CMND, 
											TenDangNhap, 
											MatKhau, 
											CH_ID) 
								VALUES ('$a', 
										'$g', 
										'$h', 
										'$b', 
										'$c', 
										'$d', 
										'$e', 
										'$f'
										)";
		if (sqlsrv_query($conn, $addstaff)) {
			echo 1;
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