<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Trang Quản Lý</title>
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
      <link rel="stylesheet" href="bootstrap/bootstrap/datetime/datepicker.min.css" type="text/css">
      <script src="bootstrap/bootstrap/datetime/en-gb.js" type="text/javascript"></script>
      <script src="bootstrap/bootstrap/datetime/moment.min.js" type="text/javascript"></script>
      <script src="bootstrap/bootstrap/datetime/bootstrap.min.js" type="text/javascript"></script>
      <script src="bootstrap/bootstrap/datetime/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/js/bootstrap-datetimepicker.min.js"></script>
      
       <script src="bootstrap/bootstrap/chart/Chart.min.js" type="text/javascript"></script>
       <script src="bootstrap/bootstrap/table-data/dataTables.bootstrap.min.css" type="text/css"></script>
       <script src="bootstrap/bootstrap/table-data/jquery.dataTables.min.js" type="text/javascript"></script>
       <script src="bootstrap/bootstrap/table-data/dataTables.bootstrap.min.js" type="text/javascript"></script>
       
       <link rel="stylesheet" href="bootstrap/editor/bootstrap.css" type="text/css">
       <!-- <script src="bootstrap/bootstrap/editor/jquery.js"></script> -->
       <!-- <script src="bootstrap/bootstrap/editor/bootstrap.js"></script> -->
       <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
       <script src="bootstrap/bootstrap/editor/summernote.js"></script>
      <style type="text/css">
        .name-header{
          font-weight: bold;
          font-family: arial;
          color:#FFFFFF;
          font-size: 30px;
          margin-left: -54px;
          margin-top: 29px;
        }
      .datepicker table{
        width: 230px;
        
      }
      </style>
   </head>
   <body>
   <div class="container" style="max-width: 1000px;">
   <div class="row">
   	 <div id="banner">
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-left: -15px">
   	 	<a href="admin"><img src="img/img5.png" class="img-responsive" alt="Image" style=""></a>	
   	 </div>
     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 name-header">
        <span style="font-size: 20px"> Hệ thống quản lí xe khách</span><br>
        <span> Công ty TNHH LIMOUSIN</span>
     </div>
   </div>
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
   <!-- <div class="row">
   	 <nav style="background: black; margin: auto;">
         <a style="padding-top: 5px; padding-left:10px; display: block;background: black;">{!!Auth::user()->name!!} </a>
         <a style="padding-top: 5px; padding-left:10px; display: block;background: black;" href="{!! url('logout') !!}">Logout</a>
   </div> -->
      
      <div class="row" style="background: white; margin-top:5px;">
         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style=" height: 1200px; background: #d6d6c2;">
         <div class="panel panel-primary" style="margin-top: 5px;">
          <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Cá nhân </div>
           <div class="panel-body" style="background: black;">
           <ul class="nav navbar-stacked" style="">
           <li class="active">
              <a href="admin"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Trang home</a>
            </li>
            <li class="active">
              <a href="new"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Quản lí tin tức</a>
            </li>
            <!-- <li class="active">
              <a href="themnv"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Thêm nhân viên</a>
            </li>
            <li class="active">
              <a href="ttnv"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Danh sách lái xe</a>
            </li>
            <li class="active">
              <a href="ttnv_adminsts"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Danh sách nhân viên trạm</a>
            </li>
            <li class="active">
              <a href="themtuyenlt"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Quản lí bến-tuyến xe</a>
            </li>
            <li>
              <a href="taolt"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Quản lí lộ trình</a>
            </li>
            <li>
              <a href="qlixe"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Quản lí xe</a>
            </li>
            <li>
              <a href="baocao"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Thống kê</a>
            </li>
 -->
            <li>
              <a href="ttadmin"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Thông tin cá nhân</a>
            </li>
            <li>
              <a href="{!! url('logout') !!}"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Đăng xuất</a>
            </li>
           </ul>
           </div>
         </div>
         <div class="panel panel-primary" style="margin-top: 5px;">
          <div class="panel-heading"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Quản lí người dùng </div>
           <div class="panel-body" style="background: black;">
           <ul class="nav navbar-stacked" style="">
           <!-- <li class="active">
              <a href="admin"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Phân công</a>
            </li> -->
            <li class="active">
              <a href="themnv"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Thêm nhân viên</a>
            </li>
            <li class="active">
              <a href="ttnv"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Danh sách lái xe</a>
            </li>
            <li class="active">
              <a href="ttnv_adminsts"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Danh sách nhân viên trạm</a>
            </li>
            <!-- <li class="active">
              <a href="themtuyenlt"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Quản lí bến-tuyến xe</a>
            </li>
            <li>
              <a href="taolt"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Quản lí lộ trình</a>
            </li>
            <li>
              <a href="qlixe"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Quản lí xe</a>
            </li>
            <li>
              <a href="baocao"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Thống kê</a>
            </li>

            <li>
              <a href="ttadmin"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Thông tin cá nhân</a>
            </li>
            <li>
              <a href="{!! url('logout') !!}"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Đăng xuất</a>
            </li> -->
           </ul>
           </div>
         </div>
         <div class="panel panel-primary" style="margin-top: 5px;">
          <div class="panel-heading"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Quản lí nhà xe </div>
           <div class="panel-body" style="background: black;">
           <ul class="nav navbar-stacked" style="">
           <!-- <li class="active">
              <a href="admin"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Phân công</a>
            </li>
            <li class="active">
              <a href="themnv"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Thêm nhân viên</a>
            </li>
            <li class="active">
              <a href="ttnv"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Danh sách lái xe</a>
            </li>
            <li class="active">
              <a href="ttnv_adminsts"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Danh sách nhân viên trạm</a>
            </li> -->
            <li class="active">
              <a href="themtuyenlt"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Quản lí bến-tuyến xe</a>
            </li>
            <li>
              <a href="taolt"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Quản lí lộ trình</a>
            </li>
            <li>
              <a href="qlixe"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Quản lí xe</a>
            </li>
            <li>
              <a href="baocao"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Thống kê</a>
            </li>

            <!-- <li>
              <a href="ttadmin"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Thông tin cá nhân</a>
            </li>
            <li>
              <a href="{!! url('logout') !!}"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Đăng xuất</a>
            </li> -->
           </ul>
           </div>
         </div>
         <div class="panel panel-primary">
         <div class="panel-heading"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Quản lí chuyến đi </div>
           <div class="panel-body" style="background: black;">
             <ul class="nav navbar-stacked">
            <li class="active">
              <a href="themve"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Thêm vé</a>
            </li>
            <li>
              <a href="dsve"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> chuyến đi hôm nay</a>
            </li>
            <li>
              <a href="lsve"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Lịch sử các chuyến đi</a>
            </li>
           </ul>
           </div>
         </div>
           
         </div>
         
         <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="background:#b3b3e6;height: 1200px;">
         @yield('ndc')
            </div>
   </div>
    <div class="row" style="background: #001731;height: 100px;text-align: center; padding-top: 10px;">
         <a>  &copy BK GROUP </br></a>
        <a>Địa chỉ: 110-120 Hai Bà Trưng, Quận Hai Bà Trưng Hà Nội</br></a>
        <a>hotline: 0123456987 | F: (08) 62 638 668 </a>
         </div> 
         <script>
         $(document).ready(function() {
         $('#example').DataTable();
         $('#exampled').DataTable();
         $('#exam').DataTable();
         $('#ttnv').DataTable();
         $('#examtuyen').DataTable();
         $('#bangpc').DataTable();
         $('#xemxe').DataTable();
         $('#veds').DataTable();
         $('.dskh').DataTable();
         $('#bangbaocao').DataTable();
         $('#bangbaocaoben').DataTable();
          $('#bangbaocaobenl').DataTable();
         $('#bangpclxd').DataTable();
         $('#bangpclxlt').DataTable();
          } );
          </script> 
          
   </body>
</html>