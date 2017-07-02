@extends('admin.ad')
@section('ndc')
<div class="panel panel-primary" style="margin-top: 5px;">
<div class="panel panel-heading">Thông tin nhân viên quản lí từng bến</div>
	<div class="panel-body">

		<!-- <a><img src="img/user.png" class="img-responsive" alt="Image" style=""></a> -->
		<div class="panel-body">
		<table id="ttnv" class="table table-bordered" style="font-size: 13px;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Tên bến quản lí</th>
                <th>Email</th>
                
                <th>Quản lí</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Tên bến quản lí</th>
                <th>Email</th>
                
                <th>Quản lí</th>
            </tr>
        </tfoot>
        <tbody>
        <?php $i=0 ?>
        @foreach($user as $item)
        <?php $i++ ?>
            <tr>
                <td>{!!$i!!}</td>
                <td>{!!$item["name"]!!}</td>
                <td><?php
                $user_id = $item["id"];
                $type ="";
                $name ="";
                foreach ($adben as $key => $value) {
                    if($value->user_id==$user_id){
                        $type =$value->station_id;
                    }
                }
                foreach ($station as $key => $value) {
                	if($value->id==$type){
                		$name = $value->name;
                	}
                }
                echo $name;
                ?>
                </td>
                <td>{!!$item["email"]!!}</td>
                
                <td><a href=" {!! route('getdeletead',['id'=>$item["id"]]) !!}"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#{!!$item["id"]!!}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                <div class="modal fade" id="{!!$item["id"]!!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <?php
                    // $user = App\User::all();
                    // $user_id =$item["id"];
                    // $adben = App\AdminStation::where('user_id','=',$user_id)->get();
                    // $station = App\Station::all();
                    ?>
                     <div class="modal-dialog" role="document">
                        <div class="modal-content" style="">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Thông tin chi tiết lái xe</h4>
                           </div>
                           <div class="modal-body">
                            <table class="table table-hover">
                                   
                                    <tbody>
                                    
                                        <tr>
                                            <td>Họ tên:</td>
                                            <td>
                                            <?php
                                            $name = $item["name"];
                                            
                                            echo $name;
                                            ?>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Quản lí bến:</td>
                                            <td>
                                            <?php
                                                $phone = "";
                                                $name ="";
                                                foreach ($adben as $key => $value) {
                                                    if($value->user_id==$user_id){
                                                        $phone = $value->station_id;
                                                    }
                                                }
                                                foreach ($station as $key => $value) {
                                                	if($value->id==$phone){
                                                		$name = $value->name;
                                                	}
                                                }
                                                echo $name;
                                                ?></td>
                                        </tr>
                                        <tr>
                                            <td>Giới tính</td>
                                            <td>
                                                <?php
                                                $phone = "";
                                                foreach ($adben as $key => $value) {
                                                    if($value->user_id==$user_id){
                                                        $phone = $value->gender;
                                                    }
                                                }
                                                echo $phone;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone:</td>
                                            <td>
                                                <?php
                                                $phone = "";
                                                foreach ($adben as $key => $value) {
                                                    if($value->user_id==$user_id){
                                                        $phone = $value->phone;
                                                    }
                                                }
                                                echo $phone;
                                                ?>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Ngày sinh:</td>
                                            <td>
                                            <?php
                                            
                                                $phone = "";
                                                foreach ($adben as $key => $value) {
                                                    if($value->user_id==$user_id){
                                                        $phone = $value->birthday;
                                                    }
                                                }
                                                echo date('d-m-Y',strtotime($phone));
                                                
                                            ?>
                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Trình độ:</td>
                                            <td>
                                                <?php
                                                $phone = "";
                                                foreach ($adben as $key => $value) {
                                                    if($value->user_id==$user_id){
                                                        $phone = $value->graduation;
                                                    }
                                                }
                                                echo $phone;
                                                ?>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                           </div>
                           
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                </td>
            </tr>
          @endforeach
          </tbody>
</table>
</div>
</div>

	</div>


@endsection