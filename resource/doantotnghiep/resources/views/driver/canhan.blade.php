@extends('driver.master')
@section('ndc')
<div class="panel panel-primary" style="margin-top: 5px;">
<div class="panel panel-heading"> Thông tin cá nhân</div>
                @if(Session::has('xacnhan_message'))
                <div class="alert alert-success">
                {!! Session::get('xacnhan_message')!!}
                </div>
                @elseif(Session::has('kxacnhan_message'))
                <div class="alert alert-danger">
                  {!! Session::get('kxacnhan_message')!!}
                </div>
                @elseif(Session::has('chuaxacnhan_message'))
                <div class="alert alert-info">
                  {!! Session::get('chuaxacnhan_message')!!}
                </div>
            @endif
	<div class="panel-body">
		<table class="table table-hover">
			<!-- <thead>
				<tr>
					<th></th>
				</tr>
			</thead> -->
			<tbody>
				<tr>
					<td>Họ tên</td>
					<td>{!!Auth::user()->name!!}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>{!!Auth::user()->email!!}</td>
				</tr>
				<tr>
                     <td>Birthday:</td>
                     <td>
                         <?php
                         $id = Auth::user()->id;
                         $phone="";
                         foreach ($driver as $key => $value) {
                           if($value->user_id==$id){
                            $phone = $value->birthday;
                           }
                         }
                         echo date('d-m-Y',strtotime($phone));
                         ?>
                     </td>
                     </tr>
				<tr>
                     <td>Phone:</td>
                     <td>
                         <?php
                         $id = Auth::user()->id;
                         $phone="";
                         foreach ($driver as $key => $value) {
                           if($value->user_id==$id){
                            $phone = $value->phone;
                           }
                         }
                         echo $phone;
                         ?>
                     </td>
                     </tr>
                <tr>
                     <td>Gender:</td>
                     <td>
                         <?php
                         $id = Auth::user()->id;
                         $phone="";
                         foreach ($driver as $key => $value) {
                           if($value->user_id==$id){
                            $phone = $value->gender;
                           }
                         }
                         echo $phone;
                         ?>
                     </td>
                     </tr>
                <tr>
                     <td>Graduation:</td>
                     <td>
                         <?php
                         $id = Auth::user()->id;
                         $phone="";
                         foreach ($driver as $key => $value) {
                           if($value->user_id==$id){
                            $phone = $value->graduation;
                           }
                         }
                         echo $phone;
                         ?>
                     </td>
                     </tr>
                <tr>
                     <td>Chức vụ:</td>
                     <td>
                         <?php
                         $id = Auth::user()->id;
                         $phone="";
                         foreach ($driver as $key => $value) {
                           if($value->user_id==$id){
                            $phone = $value->type;
                           }
                         }
                         if($phone==1){
                         	echo "Lái xe lộ trình";
                         }else{
                         	echo "Lái xe đón khách";
                         }
                         ?>
                     </td>
                     </tr>
                <tr>
                     <td>Score:</td>
                     <td>
                         <?php
                         $id = Auth::user()->id;
                         $phone="";
                         foreach ($driver as $key => $value) {
                           if($value->user_id==$id){
                            $phone = $value->score;
                           }
                         }
                         echo $phone;
                         ?>
                     </td>
                     </tr>
                <tr>
                     <td>Exprience:</td>
                     <td>
                         <?php
                         $id = Auth::user()->id;
                         $phone="";
                         foreach ($driver as $key => $value) {
                           if($value->user_id==$id){
                            $phone = $value->experience;
                           }
                         }
                         echo $phone;
                         ?>
                     </td>
                     </tr>
			</tbody>
		</table>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{!!Auth::user()->id!!}">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                          Thay đổi thông tin cá nhân
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="{!!Auth::user()->id!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Sửa thông tin cá nhân</h4>
                              </div>
                              <div class="modal-body">
                                <form action="{!!url('driver')!!}" method="POST" role="form">
                                <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                                <input type="hidden" name="userid" value="{!!Auth::user()->id!!}">
                                  <div class="form-group">
                                    <label for="">Phone:</label>
                                    <input type="text" name="textPhone" class="form-control" id="" placeholder="Input your phone" >
                                    <label for="">Trình độ:</label>
                                    <input type="text" name="textgraduation" class="form-control" id="" placeholder="Input your password">
                                    <label for="">Kinh nghiệm:</label>
                                    <input type="text" name="textkinhnghiem" class="form-control" id="" placeholder="Input your password">
                                  </div>
                                
                                  
                                <!-- <a href=" {!! route('ttadmin') !!}"> -->
                                  <button type="submit" class="btn btn-primary">Sửa</button>
                                  <!-- </a> -->
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                              </div>
                              </div>
                              </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{!!Auth::user()->id!!}{{'mk'}}">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                          Thay đổi mật khẩu
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="{!!Auth::user()->id!!}{{'mk'}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Đổi mật khẩu</h4>
                              </div>
                              <div class="modal-body">
                                <form action="{!!url('driver_suamk')!!}" method="POST" role="form">
                                <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                                <input type="hidden" name="user_id" value="{!!Auth::user()->id!!}">
                                <input type="hidden" name="mkcu" value="{!!Auth::user()->password!!}">
                                <input type="hidden" name="level" value="{!!Auth::user()->level!!}">
                                <input type="hidden" name="mail" value="{!!Auth::user()->email!!}">
                                  <div class="form-group">
                                    <label for="">Mật khẩu cũ:</label>
                                    <input type="password" name="pold" class="form-control" id="" placeholder="Input your old password" required="required">
                                    <label for="">Mật khẩu mới:</label>
                                    <input type="password" name="pnew1" class="form-control" id="" placeholder="Input your password" required="required">
                                    <label for="">Xác nhận mật khẩu:</label>
                                    <input type="password" name="pnew2" class="form-control" id="" placeholder="Input your password" required="required">
                                  </div>
                                
                                  
                                <!-- <a href=" {!! route('ttadmin') !!}"> -->
                                  <button type="submit" class="btn btn-primary">Sửa</button>
                                  <!-- </a> -->
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
<script>
         $("div.alert").delay(3000).slideUp();
         
          </script>
@endsection