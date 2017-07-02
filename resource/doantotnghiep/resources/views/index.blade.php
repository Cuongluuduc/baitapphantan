<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Trang chủ</title>
      <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap-theme.css" type="text/css">
      <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap-theme.min.css" type="text/css">
      <link rel="stylesheet" href="bootstrap/bootstrap/css/mystyle.css" type="text/css">
      <!-- jvascrip and jquery external -->
      <script src="bootstrap/bootstrap/js/bootstrap.js" type="text/javascript"></script>
      <script src="bootstrap/bootstrap/js/jquery.min.js" type="text/javascript"></script>
      <script src="bootstrap/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="bootstrap/bootstrap/js/jquery-1.11.2.min.js" type="text/javascript"></script>
      <!-- datetimepicker -->
      <link rel="stylesheet" href="bootstrap/datetime/datepicker.min.css" type="text/css">
      <script src="bootstrap/datetime/en-gb.js" type="text/javascript"></script>
      <script src="bootstrap/datetime/moment.min.js" type="text/javascript"></script>
      <script src="bootstrap/datetime/bootstrap.min.js" type="text/javascript"></script>
      <script src="bootstrap/datetime/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/js/bootstrap-datetimepicker.min.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
         $( function() {
           $( "#datepicker" ).datepicker();
         } );
      </script>
   </head>
   <body>
   <div class="container" style="max-width: 1000px">
   <div class="row">
   	 <div id="banner">
   	 	<img src="img/img5.png" class="img-responsive" alt="Image" style="margin: 5px;">
   	 	
   	 </div>
   </div>
   <div class="row">
   	 <nav style="background: black; margin: auto;">
         <a style=" float: right;padding-top: 15px; padding-right: 10px; display: block;background: black; padding-left: 3px; " href="login">Đăng nhập</a>
         <ul class="menu">
            <li><a href="#">Trang chủ</a></li>
            <li>
               <a href="#s1">Hà Nội<=>Hải Dương</a>
               <ul class="submenu">
                  <li><a href="#">Hà.nội-Ninh.Giang</a></li>
                  <li><a href="#">Hà nội<=>Tứ kỳ </a></li>
                  <li><a href="#">Submenu c</a></li>
               </ul>
            </li>
            <li class="active">
               <a href="#s2">Hà Nội<=>Hải Phòng</a>
               <ul class="submenu">
                  <li><a href="#">Submenu a</a></li>
                  <li><a href="#">Submenu b</a></li>
                  <li><a href="#">Submenu c</a></li>
               </ul>
            </li>
            
            <li><a href="#">Liên hệ</a></li>
         </ul>
      </nav>
   </div>
      <div class="row">
      	<div  id="slide">
         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
               <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
               <li data-target="#carousel-example-generic" data-slide-to="1"></li>
               <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
               <div class="item active">
                  <img src="img/img1.jpg" alt="Share Learning" style="width: 100%; height: 300px">
               </div>
               <div class="item">
                  <img src="img/img2.jpg" alt="Share Learning" style="width:100%;height: 300px">
               </div>
               <div class="item">
                  <img src="img/img4.png" alt="Share Learning" style="width: 100%;height: 300px">
               </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </div>
      </div>
      <div class="row" style="background: white; margin-top:5px;">
         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="background: black;">
         <legend style="margin-top:10px;display: block;background: #f0f0f5;text-align:center;"> <span style="font-family: arial,helvetica,sans-serif;">Thông tin chi tiết</span></legend>
           <ul class="nav navbar-stacked">
           	<li class="active">
           		<a href="#">Hình thức thanh toán</a>
           	</li>
           	<li>
           		<a href="#">Quy định nhà xe</a>
           	</li>
           	<li>
           		<a href="#">Tin tức tổng hợp</a>
           	</li>
           	<li>
           		<a href="#">Tuyển nhân viên</a>
           	</li>
           </ul>
           <legend style="margin-top:10px;display: block;background: #f0f0f5;text-align:center;"> <span style="font-family: arial,helvetica,sans-serif;">Thông tin chi tiết</span></legend>
           <ul class="nav navbar-stacked">
           	<li class="active">
           		<a href="#">Home</a>
           	</li>
           	<li>
           		<a href="#">Link</a>
           	</li>
           </ul>
         </div>
        
         <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="">
         
            <form action="" method="POST" role="form">
            <legend style="display: block;background: #f0f0f5;margin-top:10px; "><span style="font-family: arial,helvetica,sans-serif;">Gửi thông tin đặt vé</span></legend>
            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
               <label for="">Số ghế</label>
               <input type="text" class="form-control" id="" placeholder="">
               <label for="">Số điện thoại</label>
               <input type="text" class="form-control" id="" placeholder="">
               <label for="">Ngày đi</label>
               <input type="text" class="form-control" id="datepicker" placeholder="">
               
               <button style="margin-top: 5px;" type="submit" class="btn btn-primary">Đặt vé</button>
            </div>
            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
               <div class="row">
	               <label for="">Tuyến xe đi</label>
	               <select name="Chon" id="inputChon " class="form-control" required="required">
		               <option value="Hanoi">Hà nội - Ninh Giang</option>
		               <option value="Hanoi">Ninh Giang - Hà Nội</option>
		               <option value="Hanoi">Hà Nội - Tứ kỳ</option>
		               <option value="Hanoi">Tứ kỳ - Hà Nội</option>
		               <option value="Hanoi">Hue</option>
              		 </select>
               </div>
               <div class="row">
	               <label for="">Địa điểm đón</label>
	               <select name="Chon" id="inputChon " class="form-control" required="required">
		               <option value="Hanoi">Hà nội - Ninh Giang</option>
		               <option value="Hanoi">Ninh Giang - Hà Nội</option>
		               <option value="Hanoi">Hà Nội - Tứ kỳ</option>
		               <option value="Hanoi">Tứ kỳ - Hà Nội</option>
		               <option value="Hanoi">Hue</option>
              		 </select>
               </div>
               <div class="row">
                   <label for="">Giờ xe chạy</label>
                   <select name="ChonG" id="inputChonG " class="form-control" required="required">
	                     <option value="Ha1">8h-sang</option>
	                     <option value="Ha2">10h-sang</option>
	                     <option value="Ha3">14h-chieu</option>
                   </select>
               </div>
             </div>  
            </form>
      </div>
   </div>

   </body>
</html>