<?php
    include("init.php");
    $sql = "select * from NhanVien";
    $result = sqlsrv_query($conn, $sql);
    echo "<h3 style='color:#d30f30;'>Thông tin nhân viên</h3>";
	if (sqlsrv_has_rows($result)){
		echo "<table class='table table-hover'>";
        echo "<thead><tr><td>STT</td><td>ID</td><td>Họ và tên</td><td>Ngày sinh</td><td>Ca</td><td>CMND</td>
		<td>Tên đăng nhập</td><td>Mật khẩu</td><td>ID cửa hàng</td></tr></thead>";
		$stt = 0;
		while($row = sqlsrv_fetch_array($result)) {
			$stt +=1;
			$a=$row["NV_ID"];
			$b=$row["NV_HovaTen"];
			$c=$row["NgaySinh"]->format('d/m/Y');
			$d=$row["CaLamViec"];
            $e=$row["NV_CMND"];
            $f=$row["TenDangNhap"];
            $g=$row["MatKhau"];
            $h=$row["CH_ID"];
			echo "<tr><td>$stt</td><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$e</td><td>$f</td><td>$g</td><td>$h</td></tr>";
		}
		echo "</table>";
		echo "
			<button type='button' class='btn btn-success'><a style='text-decoration: none;color: #fff' href='#menu'>Quay về</a></button>
		";
	}
	else{
		echo "Danh sách trống!";
	}
  sqlsrv_close($conn);
?>