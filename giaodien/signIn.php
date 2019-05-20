<!DOCTYPE html>

<html lang="vi">
<head>
  <title>SMART FOOD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
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
	<div class="signIn">
		<div class="signIncap">ĐĂNG NHẬP</div>
		<form class="sign" method="POST">
			<div id="mess000" style="color: #d30f30;font-size: 12px;"></div>
			<div class="form-group" style="width: 30%;">
   					<label>Tên đăng nhập: </label>
    				<input type="text" class="form-control" id="username">  				
			</div>
			<div class="form-group" style="width: 30%;">
   					<label>Mật khẩu: </label>
    				<input type="password" class="form-control" id="pwd">  				
			</div>
			<div class="form-group" style="width: 30%;">
    				<input type="checkbox" class="form-control" id="idt"><span>Nhớ mật khẩu</span>  	
						<button type="button" onclick="login()" class="btn btn-success">Đăng nhập</button>			
			</div>
			
		</form>
	</div>
	<script language="javascript">
		function login() {
 
    		$user_signin = $('#username').val();
    		$pass_signin = $('#pwd').val();
    		if ($user_signin == '' || $pass_signin == ''){
        		$('#mess000').html('Vui lòng nhập đầy đủ!');
    		}
    		else{
       			 $.ajax({
          			url : 'checklogin.php',
           			type : 'post',
           			dataType : 'text',
            		data : {
                		uname : $user_signin,
                		pw : $pass_signin,
       			 	},
       			 	success : function(strdata) {
                		if(strdata==0){
											alert("Tên đăng nhập hoặc mật khẩu không đúng.")
										}
										else{
											alert("Đăng nhập thành công. Hello" + strdata);
										}
           			},
           			error : function() {
                		$('#mess000').html('Không thể đăng nhập vào lúc này, hãy thử lại sau.');
            		}
       			});
    		}
    	};
	</script>
	<div class="otherSignIn" style="margin-top:20px">
		<p class="signOther">
		Đăng nhập tài khoản bằng
		<a href="https://facebook.com"><i class="fa fa-facebook-square" style="font-size:20px"></i></a>
		hoặc
		<a href="https://google.com"> <i class="fa fa-google-plus-square" style="font-size:20px"></i></a>
		</p>
	</div>
	<div class="letter">
		<i style="font-size:50px;margin-top:15px;color:rgb(236, 200, 71)" class="glyphicon">&#x2709;</i>
		<h4 style="margin-bottom:0px">Đăng kí nhận bảng tin</h4>
		<p>Đừng bỏ lỡ hàng ngàn sản phẩm khuyến mại hấp hẫn</p>
		<input type="email" name="email" placeholder=" Địa chỉ email của bạn">
		<button style="background:#d30c30;border-radius:3px;border:none;color:#fff">Đăng kí</button>
	</div>
  </div>
   
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
						<li>Mr Dũng: 18271827812</li>
						<li>Mr Cường: 12989128982</li>
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
