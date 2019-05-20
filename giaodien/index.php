<!DOCTYPE html>
<?php
	session_start();
?>
<html lang="vi">
<head>
  <title>SMART FOOD</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">

	<link href="pickadate.js-3.6.2/pickadate.js-3.6.2/lib/themes/default.date.css" rel="stylesheet">
	<link href="pickadate.js-3.6.2/pickadate.js-3.6.2/lib/themes/default.css" rel="stylesheet">
	<link href="pickadate.js-3.6.2/pickadate.js-3.6.2/lib/themes/default.time.css" rel="stylesheet">
	<script src="pickadate.js-3.6.2/pickadate.js-3.6.2/lib/picker.js"></script>
	<script src="pickadate.js-3.6.2/pickadate.js-3.6.2/lib/picker.date.js"></script>
	<script src="pickadate.js-3.6.2/pickadate.js-3.6.2/lib/legacy.js"></script>
	<script src="pickadate.js-3.6.2/pickadate.js-3.6.2/lib/picker.time.js"></script>


</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" style="font-size: 2em" href="index.php">SMART FOOD</a>
      </div>

      <form class="navbar-form navbar-left">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Nhập tên sản phẩm...">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">Trang chủ</a></li>
          <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Sản phẩm hot</a>
			<ul class="dropdown-menu">
				<li>
					<a style="color:#000" href="mp.html">
						<span><i style="font-size:20px" class="fa">&#xf21e;</i></span>
						<span> Mỹ phẩm</span>
					</a>
				</li>
				<li>
					<a style="color:#000" href="#">
						<span><i style="font-size:20px" class="fa">&#xf072;</i></span>
						<span> Giải trí</span>
					</a>
				</li>
				<li>
					<a style="color:#000" href="#">
						<span><i style="font-size:20px" class="fa">&#xf25b;</i></span>
						<span> Hàng gia dụng</span>
					</a>
				</li>  
				<li>
					<a style="color:#000" href="#">
						<span><i style="font-size:20px" class="fa">&#xf021;</i></span>
						<span> Du lịch</span>
					</a>
				</li>  					
			</ul>
		  </li>
          <li><a href="aboutUs.php">Về chúng tôi</a></li>
          <li><a href="signUp.php">Đăng kí</a></li>
        </ul>  
      </div>
    </div>
  </nav>
  
  <div class="container" style="margin-top:50px;width:100%;padding:0px">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">

		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>


		<div class="carousel-inner">
			<div class="item active">
				<img src="images/landmark.jpg" alt="Los Angeles" style="width:100%;height:400px">
			</div>

			<div class="item">
				<img src="images/8.jpg" alt="Chicago" style="width:100%;height:400px">
			</div>
    
			<div class="item">
				<img src="images/9.jpg" alt="New york" style="width:100%;height:400px">
			</div>
			<div class="item">
				<img src="images/10.jpg" alt="New york" style="width:100%;height:400px">
			</div>
		</div>

 
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	</div>
	<div class="container">
	<div style="font-size: 15px; margin: 5px;float: right;color: #d30f30">
        <?php
        	if(isset($_SESSION['username'])&&isset($_SESSION['pos'])){
        		echo 'Hi, '.$_SESSION['username'].' | ';
        		// admin
        		if($_SESSION['pos']==1){
        			echo "<a style='font-size:15px;color: #d30f30;text-decoration:none;' href='admin_role.php'>Cài đặt</a>".' | ';
        			echo "<a style='font-size:15px;color: #d30f30;text-decoration:none;' href='logout.php'>Đăng xuất</a>";
        		}
        		// user
        		else if($_SESSION['pos']==0){
        			echo "<a style='font-size:15px;color: #d30f30;text-decoration:none;' href='user_role.php'>Thông báo</a>".' | ';
        			echo "<a style='font-size:15px;color: #d30f30;text-decoration:none;' href='logout.php'>Đăng xuất</a>";
        		}
        	}
        	else{
        		 echo "<a style='font-size:15px;color: #d30f30;text-decoration:none;' href='signIn.php'>Bạn chưa đăng nhập</a>".' | ';
        	}
        ?>
    	</div>
    	<br><br>
    </div>
	<div class="container">
		<div id="menu" style="text-align: center;color: #d30f30"><h2>CHỨC NĂNG</h2></div>
		<div style="width: 50%;margin: auto;text-align: center; font-size: 20px;">
			<ul class="list-group" style="border: #d30f30 solid 2px; border-radius:6px">
 				<li class="list-group-item" ><a href="#role1" onclick="view_staff()" style="text-decoration: none;">Thông tin nhân viên</a></li>
 				<li class="list-group-item"><a href="#role2" style="text-decoration: none;">Thêm nhân viên</a></li>
				 <li class="list-group-item"><a href="#role3" style="text-decoration: none;">Xóa nhân viên(Theo ID)</a></li>
				 <li class="list-group-item"><a href="#role4" style="text-decoration: none;">Tìm kiếm cửa hàng</a></li>
			</ul>
		</div>
    <p id="role1"><br></p>
		<div id="result_view"></div>
    <p id="role2"><br></p>
		<h3 style="color:#d30f30;">Thêm nhân viên</h3>
		<div>
			<form method="POST">
					<div class="form-group" style="width: 30%;">
   					<label>ID: </label>
    				<input type="text" class="form-control" id="idt">  				
					</div>
					<div class="form-group" style="width: 30%;">
   					<label>Tên: </label>
    				<input type="text" class="form-control" id="tent">  				
  				</div>
  				<div class="form-group" style="width: 30%;">
   					<label>Ngày sinh:</label> 
    				<input type="text" class="datepicker form-control" id="nst" >  				
  				</div>
					<div class="form-group" style="width: 30%;">
 						 	<label for="sel1">Ca làm việc:</label>
  						<select class="form-control" id="cat">
  							 <option>Sáng</option>
    							<option>Chiều</option>
    							<option>Tối</option>
    							<option>Cả ngày</option>
 							 </select>
					</div>
  				<div class="form-group" style="width: 30%;">
   					<label>CMND:</label>
    				<input type="text" class="form-control" id="cmndt">  				
					</div>
					<div class="form-group" style="width: 30%;">
   					<label>Tên đăng nhập:</label>
    				<input type="text" class="form-control" id="tdnt">  				
					</div>
					<div class="form-group" style="width: 30%;">
   					<label>Mật khẩu:</label>
    				<span><input type="password" class="form-control" id="mkt"></span>  
					</div>
					<div class="form-group" style="width: 30%;">
   					<label>ID cửa hàng:</label>
    				<input type="text" class="form-control" id="idcht">  				
  				</div>
          <button type="button" class="btn btn-success"><a style="text-decoration: none;color: #fff" href="#menu">Quay về</a></button>
  				<button type="button" onclick="add_staff()" class="btn btn-success">Thêm</button>
			</form>
		</div>
		<div id="result_view1"></div>

    <p id="role3"><br></p>
		<h3 style='color:#d30f30;'>Xóa nhân viên</h3>
		<div>
			<label>ID nhân viên:</label>
			<input type="text" class="form-control" style="width: 20%;" id="id_nv">
      <button type="button" class="btn btn-danger"><a style="text-decoration: none;color: #fff" href="#menu">Quay về</a></button>
			<button type="button" onclick="del_staff()" class="btn btn-danger">Xóa</button>
		</div>
		<div id="result_view2"></div>
    <p id="role4"><br></p>

		<h3 style='color:#d30f30;'>Tìm cửa hàng</h3>
		<label> Thông tin những cửa hàng có doanh thu < X, số lượng nhân viên > Y  </label>
		<div>
			<label>X:</label>
			<input type="text" class="form-control" style="width: 20%;" id="dt">
			<label>Y:</label>
			<input type="text" class="form-control" style="width: 20%;" id="slnv">
			<button type="button" class="btn btn-success"><a style="text-decoration: none;color: #fff" href="#menu">Quay về</a></button>
  		<button type="button" onclick="find_store()" class="btn btn-success">Tìm kiếm</button>
		</div>
		<br>
		<div id="result_view3"></div>
</div>
		<br><br>
   <script type="text/javascript">
	 		$('.datepicker').pickadate({
   			selectMonths: true,
  			selectYears: true,
				min: new Date(1950,3,1),
  			max: new Date(2019,5,21),
				formatSubmit: 'yyyy-mm-dd',
			})
   		function view_staff(){
   			$.ajax({
   				url : 'view_staff.php',
   				type : 'get',
   				dataType : 'text',
   				success:function(data1){
   					document.getElementById('result_view').innerHTML=data1;
   				}
   			});
   		};
   		function del_staff(){
				 if(!$('#id_nv').val())
				 	alert("Vui lòng nhập.");
					 else{
   			$.ajax({
   				url : 'del_staff.php',
   				type : 'post',
   				dataType : 'text',
   				data : {
   					idnv : $('#id_nv').val()
   				},
   				success:function(data2){
   					if(data2==1){
   						alert("Xóa thành công.");
   					}
						 else if(data2==0)
						 {
							alert("Không tồn tại ID này.");
						 }
   					else{
							document.getElementById('result_view2').innerHTML=data2;
   					}
   				}
   			});}
   		};
   		function add_staff(){
				if(!$('#idt').val()||!$('#tent').val()||!$('#nst').val()||!$('#cat').val()||!$('#cmndt').val()||!$('#tdnt').val()||!$('#mkt').val()||!$('#idcht').val())
				 	alert("Vui lòng nhập đủ.");
					 else{
   			$.ajax({
   				url : 'add_staff.php',
   				type : 'post',
   				dataType : 'text',
   				data : {
   					id : $('#idt').val(),
						ten : $('#tent').val(),
   					ns : $('#nst').val(),
   					ca : $('#cat').val(),
   					cmnd : $('#cmndt').val(),
						tdn : $('#tdnt').val(),
						mk : $('#mkt').val(),
						idch : $('#idcht').val()
   				},
   				success:function(data3){
   					if(data3==1){
   						alert("Thêm thành công.");
   					}
   					else{
							document.getElementById('result_view1').innerHTML=data3;
   					}
   				}
   			});
					 }
   		};
			 function find_store(){
				 if(!$('#dt').val()||!$('#slnv').val())
				  alert("Vui lòng nhập đủ.")
					else{
   			$.ajax({
   				url : 'find_store.php',
   				type : 'post',
   				dataType : 'text',
   				data : {
   					dt : $('#dt').val(),
   					slnv : $('#slnv').val()
   				},
   				success:function(data4){
						document.getElementById('result_view3').innerHTML=data4;
   				}
   			});}
   		};



	 </script>
 <div class="container-fluid">
    <div class="row">
     <div class="col-sm-12 footer">
		<div class="ft">
			<div style="float:left;margin-top:10px;">
				<a style="color:#d30f30" href="aboutUs.php">Về SMART FOOD</a><br>
				<div>
					<i style="font-size:15px;color:#d30f30;float:left" class="fa">&#xf2a0;</i>
					<p style="margin-left:5px;color:#d30c30;font-weight:bold;font-size:16px;float:left">LIÊN HỆ<p>
				</div>
				<div style="clear:both"></div>
				<div>
					<ul>
						<li>Mr Đức: 18271827812</li>
						<li>Mr Tiến: 12989128982</li>
						<li>Mr Huy: 10920192909</li>
					</ul>
					<p>Địa chỉ: 605H6, ĐHBK, TP.HCM<p>
				</div>
			</div>
			<div class="b">
				<i style="font-size:15px;color:#d30f30;float:left" class="fa">&#xf14c;</i>
				<p style="margin-left:5px;color:#d30c30;font-weight:bold;font-size:16px;float:left">LIÊN KẾT<p>
				<i style="font-size:24px;color:#4267b2" class="fa">&#xf082;</i><a style="color:#58595b;text-decoration:none" href="https://facebook.com">  Facebook</a><br>
				<i style="font-size:24px;color:#1da1f2" class="fa">&#xf081;</i><a style="color:#58595b;text-decoration:none" href="https://twitter.com">  Twitter</a><br>
				<i style="font-size:24px;color:#cd486b" class="fa">&#xf16d;</i><a style="color:#58595b;text-decoration:none" href="https://instagram.com">  Instagram</a>	
			</div>
			<div class="a">
				<h3>SMART FOOD</h3>
			</div>
		</div>
     </div>
	</div>
 </div>
</body>
</html>
