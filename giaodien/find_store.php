<?php

	if(isset($_POST['slnv'])&&isset($_POST['dt'])){
		include("init.php");
        // câu sql gọi procedure  đã tạo sẵn
        $callSP = "EXEC select3b @doanhthu=? , @sl=?";
        // set tham số
        $k1 = $_POST['dt']; // doanh thu
        $k2 = $_POST['slnv'];// số lượng nhân viên
        $para = array(   
            array($k1, SQLSRV_PARAM_IN),  
            array($k2, SQLSRV_PARAM_IN)  
          );   
        // thực thi gọi procedure
        $stmt = sqlsrv_prepare( $conn, $callSP, $para);  
		if (sqlsrv_execute($stmt)) {
            // kết quả trả về
            if(sqlsrv_has_rows($stmt)){
			    echo "<table class='table table-hover'>";
                echo "<thead><tr><td>STT</td><td>Tên cửa hàng</td><td>Địa chỉ</td><td>Doanh thu</td><td>SĐT</td><td>Số Lượng Nhân Viên</td></tr></thead>";
	    	    $stt = 0;
	    	    while($row = sqlsrv_fetch_array($stmt)) {
		    	    $stt +=1;
                    $a=$row[0];
                    $b=$row[1];
                    $c=$row[2];
                    $d=$row[3];
                    $e=$row[4];
			        echo "<tr><td>$stt</td><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$e</td></tr>";
		        }
                echo "</table>";
            }
            else{
                echo "Oops. Không có cửa hàng nào.";
            }
        }
		else {
			$errors=sqlsrv_errors();
			foreach( $errors as $err ) {
				echo "Error code:" .$err['code'] ."</br>";
				echo "Message:" .$err['message'] ."</br>";
			}
		}
    }
	sqlsrv_close($conn);
?>