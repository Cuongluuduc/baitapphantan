<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login</title>
      <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap-theme.css" type="text/css">
      <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap-theme.min.css" type="text/css">
      <link rel="stylesheet" href="../bootstrap/bootstrap/css/mystyle.css" type="text/css">
      <!-- jvascrip and jquery external -->
      
      <!-- datetimepicker -->
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
<body style="background: white;">
<div class="container" style="max-width: 1000px">
   <div class="row">
     <div id="banner">
     <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="margin-left: -15px">
        <img src="../img/img5.png" class="img-responsive" alt="Image" style="">    
     </div>
     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 name-header">
        <span style="font-size: 20px"> Hệ thống quản lí xe khách</span><br>
        <span> Công ty TNHH LIMOUSIN</span>
     </div>
   </div>  
   </div>   
   <div class="row"> 
   <div class="col-md-6 col-md-offset-3">
     <div  class="panel panel-primary">
                   <div class="panel-heading"><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> Đổi Mật khẩu</div>
                     <div class="panel-body">
                       <form action="{!!url('password/email')!!}" method="POST" style="">
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                         <label for="">Email</label>
                         <input type="email" class="form-control" id="" placeholder="email" name="email"> 
                         <button style="margin-top: 5px;" type="submit" class="btn btn-primary"> Xác nhận </button>
                         <div class="panel panel-primary">
                         <div class="panel-footer"  >
                        <a href="{!!url('home')!!}">Quay về trang chủ?</a>
                       <a href=""></a></br>
                   </div>
               </div>
                    </form>   
                    </div>
               </div>
      
      </div>
  </div>
  </div>
</div>

</body>
</html>