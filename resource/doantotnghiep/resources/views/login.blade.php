<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login</title>
      <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap-theme.css" type="text/css">
      <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap-theme.min.css" type="text/css">
      <link rel="stylesheet" href="bootstrap/bootstrap/css/mystyle.css" type="text/css">
      <!-- jvascrip and jquery external -->
      <script src="bootstrap/bootstrap/js/bootstrap.js" type="text/javascript"></script>
      <script src="bootstrap/bootstrap/js/jquery.min.js" type="text/javascript"></script>
      <script src="bootstrap/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="bootstrap/bootstrap/js/jquery-1.11.2.min.js" type="text/javascript"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
        <img src="img/img5.png" class="img-responsive" alt="Image" style="">    
     </div>
     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 name-header">
        <span style="font-size: 20px"> Hệ thống quản lí xe khách</span><br>
        <span> Công ty TNHH LIMOUSIN</span>
     </div>
   </div>  
   </div>  
   @include('error') 
   @if(Session::has('fla_message'))
            <div class="alert alert-danger">
              {!! Session::get('fla_message')!!}
            </div>
            @endif 
		<form action="" method="POST" style="width: 350px; margin: auto; ">
        <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
            <fieldset style="background: #e6e6ff;">
               <legend style="text-align: center; background:#e6e6ff; "> Đăng nhập hệ thống</legend>
               <label for="">Tài khoản</label>
               <input type="text" class="form-control" id="" placeholder="email" name="txtUser"> 
                <label for="">Mật khẩu</label>
               <input type="password" class="form-control" id="" placeholder="password" name="txtPass" required="required">
               <button style="margin-top: 5px;" type="submit" class="btn btn-primary"> Đăng Nhập </button>   
            </fieldset>
             <div class="panel panel-default">
       <div class="panel-footer"  style="background: #001731;"">
           <a href="home">Quay về trang chủ?</a></br>
           <a href="{!!url('password/reset')!!}">Quên mật khẩu?</a>
       </div>
   </div>
        </form>
    </div>
  
</div>
          <script type="text/javascript>
         $("div.alert").delay(3000).slideUp();
         
          </script>
</body>
</html>