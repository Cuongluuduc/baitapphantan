<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Vote</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <script src="bootstrap/bootstrap/chart/Chart.min.js" type="text/javascript"></script>
       <script src="bootstrap/bootstrap/table-data/dataTables.bootstrap.min.css" type="text/css"></script>
       <script src="bootstrap/bootstrap/table-data/jquery.dataTables.min.js" type="text/javascript"></script>
       <script src="bootstrap/bootstrap/table-data/dataTables.bootstrap.min.js" type="text/javascript"></script>
      
      
      
      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"> -->
      <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->

      <style type="text/css">
        .stars {
          display: inline-block;
        }
        .stars2 {
          display: inline-block;
        }
        input.star { display: none; }

        label.star {
          float: right;
          padding: 10px;
          font-size: 20px;
          color: #bdc3c7;
          transition: all .2s;
        }

        input.star:checked ~ label.star:before {
          content: '\f005';
          color: #FFD700;
          transition: all .25s;
        }
        
        input.star-1:checked ~ label.star:before { color: #F62; }

        label.star:hover { transform: rotate(-15deg) scale(1.3); }

        label.star:before {
          content: '\f006';
          font-family: FontAwesome;
        }
      </style>
      
      <style type="text/css">
        .name-header{
          font-weight: bold;
          font-family: arial;
          color:#FFFFFF;
          font-size: 30px;
          margin-left: -54px;
          margin-top: 29px;
        }
        }
      </style>
      
   </head>
   <body onload="myFunction()">
   <div class="container" style="max-width: 1000px">
   <div class="row">
   	 <div id="banner">
     <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-left: -15px">
        <a href="home">  <img src="img/img5.png" class="img-responsive" alt="Image" style=""></a>
     </div>
   	 <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 name-header">
        <span style="font-size: 20px"> Hệ thống quản lí xe khách</span><br>
        <span> Công ty TNHH LIMOUSIN</span>
     </div>
   	 </div>
   </div>
   <div class="row">
   	 <!-- <nav style="background: black; margin: auto;">
         <a style=" float: right;padding-top: 15px; padding-right: 10px; display: block;background: black; padding-left: 3px; " href="{!! url('logout') !!}">Đăng xuất</a>
         <ul class="menu">
           
         </ul>
      </nav> -->
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
      <div class="row" style=" margin-top:5px; background: white;">
         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style=" height: 800px;background: #d6d6c2;">
         <div  class="panel panel-primary" style="margin-top: 5px;">
               <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Hỗ trợ trực tuyến</div>
                 <div class="panel-body">
                      <p style="color: blue; "><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> 19001096</p>
                      <p>Hộp thư thoại: 24/24</p>
                      <p>Gặp nhân viên giờ hành chính</p>
                      <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                          Thông tin khách hàng
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Quý khách đăng nhập hệ thống</h4>
                              </div>
                              <div class="modal-body">
                                <form action="" method="POST" role="form">
                                <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                                  <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="text" class="form-control" id="" placeholder="Input your email">
                                    <label for="">Mật khẩu:</label>
                                    <input type="text" class="form-control" id="" placeholder="Input your password">
                                    <a href="password/reset">Khách hàng chưa có hoặc quên mật khẩu?</a>
                                  </div>
                                
                                  
                                
                                  <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                </div>
           </div>
         
         </div>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="background: #b3b3e6;">
        @yield('ndc')
        </div>

         </div>
         <div class="row" style="background: #001731;height: 100px;text-align: center; padding-top: 10px;">
         <a>  &copy BK GROUP </br></a>
        <a>Địa chỉ: 110-120 Hai Bà Trưng, Quận Hai Bà Trưng Hà Nội</br></a>
        <a>hotline: 0123456987 | F: (08) 62 638 668 </a>
         </div> 
      <script>
         $('#ttkh').DataTable();
         $("div.alert").delay(3000).slideUp();
      </script>   
        
   </body>
</html>
