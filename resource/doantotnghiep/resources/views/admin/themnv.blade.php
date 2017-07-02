@extends('admin.ad')
@section('ndc')
<div class="panel panel-primary" style="margin-top: 5px;">
<div class="panel panel-heading">Thêm người dùng theo danh sách</div>
   <div class="panel-body">
      <form action="themnv" method="POST" class="navbar-form pull-left" enctype="multipart/form-data">
   <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
   <table class="table table-hover">
      <thead>
         <tr>
            <th></th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td><img src="img/user_add.png"></td>
            <td><input type="file" name="file">
   <button style="margin-top: 10px;" type="submit" class="btn btn-primary"> Thêm </button></td>
         </tr>

      </tbody>
   </table>
   </form>
   </div>
</div>


<!-- <div class="panel panel-primary">
<div class="panel-heading">Thêm lái xe</div>
   <div class="panel-body">
      <form action="themlaixe" method="POST" role="form">
      <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
         <div class="form-group">
          @if(Session::has('ktheml_message'))
            <div class="alert alert-danger">
              {!! Session::get('ktheml_message')!!}
            </div>
            @elseif(Session::has('theml_message'))
            <div class="alert alert-success">
              {!! Session::get('theml_message')!!}
            </div>
            @endif
            <label for="">Tên người dùng</label>
            <input type="text" name="ten" class="form-control" id="" placeholder="Input name" required="required">
            <label for="">Email</label>
            <input type="text" name="mail" class="form-control" id="" placeholder="Input field" required="required">
            <label for="">Mật khẩu</label>
            <input type="password" name="pass" class="form-control" id="" placeholder="Input field" required="required">
            <label for="">Chức vụ</label>
            <select name="chucvu" id="input" class="form-control" required="required">
               <option>--- chọn ---</option>
               <option value="2">Lái xe đón khách</option>
               <option value="1">Lái xe lộ trình</option>
            </select>
         </div>
      
         
      
         <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
   </div>
</div> -->
<div class="panel panel-primary">
<div class="panel-heading">Thêm quản lí bến xe</div>
   <div class="panel-body">
   <?php
   $categories = App\Station::all();
   ?>
      <form action="themqli" method="POST" role="form">
      <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
         <div class="form-group">
         @if(Session::has('kthem_message'))
            <div class="alert alert-danger">
              {!! Session::get('kthem_message')!!}
            </div>
            @elseif(Session::has('them_message'))
            <div class="alert alert-success">
              {!! Session::get('them_message')!!}
            </div>
            @endif
            <label for="">Tên người dùng</label>
            <input type="text" name="ten" class="form-control" id="" placeholder="Input name" required="required">
            <label for="">Email</label>
            <input type="email" name="mail" class="form-control" id="" placeholder="Input field" required="required">
            <label for="">Mật khẩu</label>
            <input type="password" name="pass" class="form-control" id="" placeholder="Input field" required="required">
            <label for="">Quản lí bến</label>
            <select name="chucvu" id="input" class="form-control" required="required" required="required">
               <option value="">--Chọn điểm xuất phát--</option>
                     @foreach($categories as $category)
                   <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                   </select>
         </div>
      
         
      
         <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
   </div>
</div>	
<div class="panel panel-primary">
<div class="panel-heading">Thêm lái xe</div>
   <div class="panel-body">
      <form action="themlaixe" method="POST" role="form">
      <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
         <div class="form-group">
          @if(Session::has('ktheml_message'))
            <div class="alert alert-danger">
              {!! Session::get('ktheml_message')!!}
            </div>
            @elseif(Session::has('theml_message'))
            <div class="alert alert-success">
              {!! Session::get('theml_message')!!}
            </div>
            @endif
            <label for="">Tên người dùng</label>
            <input type="text" name="ten" class="form-control" id="" placeholder="Input name" required="required">
            <label for="">Email</label>
            <input type="email" name="mail" class="form-control" id="" placeholder="Input field" required="required">
            <label for="">Mật khẩu</label>
            <input type="password" name="pass" class="form-control" id="" placeholder="Input field" required="required">
            <label for="">Chức vụ</label>
            <select name="chucvu" id="input" class="form-control" required="required">
               <option>--- chọn ---</option>
               <option value="2">Lái xe đón khách</option>
               <option value="1">Lái xe lộ trình</option>
            </select>
         </div>
      
         
      
         <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
   </div>
</div>
@endsection