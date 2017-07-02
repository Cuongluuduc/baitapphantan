@extends('trangchinh')
@section('ndc')
               <div  class="panel panel-primary" style="margin-top: 5px;">
               <div class="panel-heading"> <span class="glyphicon glyphicon-book" aria-hidden="true"></span> Gửi Thông tin đặt vé</div>
                 <div class="panel-body">
          <form action="" method="POST" role="form" onsubmit="return  validatePhone();">
          <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
            @if(Session::has('flash_message'))
            <div class="alert alert-success">
              {!! Session::get('flash_message')!!}
            </div>
            @elseif(Session::has('fla_message'))
            <div class="alert alert-danger">
              {!! Session::get('fla_message')!!}
            </div>
            @elseif(Session::has('flas_message'))
            <div class="alert alert-info">
              {!! Session::get('flas_message')!!}
            </div>
            @endif
            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
               <label for="">Họ tên</label>
               <input type="text" name="txtname" class="form-control" id="" placeholder="" required="required">
               <label for="">Số người</label>
               <input type="text" name="txtsoluong" class="form-control" id="" placeholder="" required="required">
               <label for="">Số điện thoại</label>
               <input type="text" name="txtphone" class="form-control" id="txtphone" placeholder="" required="required">
               <label for="">Email</label>
               <input type="email" name="txtemail" class="form-control" id="txtemail" placeholder="" required="required">
               <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Đặt vé</button>
            </div>
            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
               <div class="row"> 
	               <label for="">Điểm xuất phát</label>
	               <select name="category" id="category" class="form-control" required="required">
                  <option value="">--Chọn điểm xuất phát--</option>
		               @foreach($categories as $category)
                   <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
              		 </select>
                   <label for=""> Tuyến xe</label>
                   <select name="subcategory" id="subcategory" class="form-control" required="required">
                  <option value="">--Chọn tuyến xe--</option>
                  </select>
               </div>
               <div class="row">
	               <label for="">Địa điểm đón</label>
	               <select name="pick_up" id="pick_up" class="form-control" required="required">
		                <option value="">--Chọn điểm đón--</option>
              		 </select>
               </div>
               <div class="row">
                   <label for="">Giờ xe chạy</label>
                   <select name="time" id="time" class="form-control" required="required">
	                     <option value="">--Giờ xe chạy--</option>
                   </select>
                   <label for="">Ngày đi</label>
                   <input type="text" name="txtdate" class="form-control" id="datepicker" placeholder="--mm/dd/yy--" required="required">
                   </div>
                   
             </div>  
            </form>
            <div id="row">
              <p style="color: blue; font-size: 15px;"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> <strong>Quý khách lưu ý khi đặt vé xe</strong></p>
              <p style="padding-right: 5px;">- Quý khách có thắc mắc vui lòng gọi điện đến số <mark> (04) 2219 3868 - 091 781 2209 </mark> hoặc tổng đài <mark>19006105 </mark>ấn 0 gặp tổng đài viên trong giờ hành chính để biết thêm thông tin...</p>
              <p>- Quý khách hàng hỏi thông tin về vé tàu có thể gửi mail tới địa chỉ : <mark>limousin@gmail.com</mark> hoặc lựa chọn đặt chỗ kiểm tra thông tin trên website :<mark> www.limousin.com.</mark> Chúng tôi sẽ kiểm tra tình trạng và phản hồi email trong thời gian sớm nhất.</p>
              <p>- <strong>Lưu ý</strong>: Quý khách nhớ ghi rõ thông tin hành trình cần đi và ghi rõ số điện thoại và địa chỉ email của quý khách để chúng tôi còn phản hồi.</p>
              <p style="text-align: center;"><strong> ***Công ty TNHH LIMOUSIN xin hân hạnh phục vụ quý khách trên mọi chặng đường!***</strong></p>
            </div>
            </div>
           </div>
           <div  class="panel panel-primary">
               <div class="panel-heading"><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> Tin tức</div>
                 <div class="panel-body">
                      @foreach($new as $value)
                      {{$value->title}}
                      <p>{!! $value->content !!}</p>
                      @endforeach
                </div>
           </div>
           <script>
         $("div.alert").delay(3000).slideUp();
         
          </script>
@endsection
