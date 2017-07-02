@extends('admin.ad')
@section('ndc')
<table class="table table-hover">
	<thead>
		<tr>
			<th>Thông tin cá nhân</th>
		</tr>
	</thead>
	<tbody>
	@foreach($data as $item)
		<tr>
			<td>Họ tên:</td>
			<td>
			<?php
			$name = $item->user_id;
			$ten="";
			foreach ($user as $key => $value) {
				if($value->id==$name){
                   $ten=$value->name;
				}
			}
			echo $ten;
			?>
				
			</td>
		</tr>
		<tr>
			<td>Chức vụ:</td>
			<td>Admin</td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td>{!!$item->address!!}</td>
		</tr>
		<tr>
			<td>Phone:</td>
			<td>{!!$item->phone!!}</td>
		</tr>
		<tr>
			<td>Giới tính:</td>
			<td>{!!$item->gender!!}</td>
		</tr>
		<tr>
			<td>Ngày sinh:</td>
			<td>
			<?php
			$ngay = $item->birthday;
			// $ngay = strtotime(date('d-m-Y',$ngay));
			echo $ngay;
			?>
			
			</td>
		</tr>
		<tr>
			<td>Trình độ:</td>
			<td>{!!$item->graduation!!}</td>
		</tr>
		
	</tbody>
</table>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                          Thay đổi thông tin cá nhân
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Sửa thông tin cá nhân</h4>
                              </div>
                              <div class="modal-body">
                                <form action="{!!url('ttadmin')!!}" method="POST" role="form">
                                <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                                  <div class="form-group">
                                    <label for="">Phone:</label>
                                    <input type="text" name="textPhone" class="form-control" id="" placeholder="Input your email">
                                    <label for="">Trình độ:</label>
                                    <input type="text" name="textgraduation" class="form-control" id="" placeholder="Input your password">
                                    
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
                              @endforeach
@endsection
