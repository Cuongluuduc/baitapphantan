@extends('admin.ad')
@section('ndc')
<div class="panel panel-primary" style="width: 100%; margin-top: 5px;">
<div class="panel panel-heading">Vé hôm nay</div>

	<div class="panel-body">
  
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size: 12px;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ngày</th>
                <th>Tổng vé</th>
                <th>Vé trống</th>
                <th>Giá vé</th>
                <th>Tuyến</th>
                <th>Thời gian</th>
                <th style="min-width: 61px;">Quản lí</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>STT</th>
                <th>Ngày</th>
                <th>Tổng vé</th>
                <th>Vé Trống</th>
                <th>Giá vé</th>
                <th>Tuyến</th>
                <th>Thời gian</th>
                <th>Quản lí</th>
            </tr>
        </tfoot>
        <tbody>
        <?php $i=0;?>
        @foreach($data as $item)
        <?php $i++?>
            <tr> 
                <td>{!!$i!!}</td>
                <td>
                <?php
                $ngay = $item["date"];
                $ngay = date('d-m-Y',strtotime($ngay));
                echo $ngay;
                ?>
                </td>
                <td>{!!$item["total_tickit"]!!}</td>
                <td>{!!$item["empty_tickit"]!!}</td>
                <td>{!!$item["cost"]!!}</td>
                <td>
                <?php
                 $idlt = $item["routercar_id"];
                 $idtuyen = "";
                 $name = "";
                 foreach ($router_car as $key => $value) {
                     if($value->id==$idlt){
                        $idtuyen = $value->router_id;
                     }
                 }
                 foreach ($route as $key => $value) {
                     if($value->id==$idtuyen){
                        $name = $value->name;
                     }
                 }
                  echo $name;
                ?>
                </td>
                <td>
                    <?php
                    $idlt = $item["routercar_id"];
                 $idtuyen = "";
                 $name = "";
                 foreach ($router_car as $key => $value) {
                     if($value->id==$idlt){
                        $idtuyen = $value->time;
                     }
                 }
                 foreach ($route as $key => $value) {
                     if($value->id==$idtuyen){
                        $name = $value->name;
                     }
                 }
                  echo $idtuyen;
                ?>
                </td>
                <td><a href=""><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#{{$item->id}}">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                <!-- modal -->
                <div class="modal fade" id="{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <?php
                    $khach=App\Guest::where('tickit_id','=',$item->id)->get();
                    $user=App\User::all();
                    $pick=App\Pickup_point::all();
                    ?>
                     <div class="modal-dialog" role="document">
                        <div class="modal-content" style="width: 1000px;">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Xem danh sách khách đăng kí</h4>
                           </div>
                           <div class="modal-body">
                            <table  class="table table-bordered dskh"  style="font-size: 13px">
                            <thead>
                               <tr>
                                  <th>STT</th>
                                  <th>Tên</th>
                                  <th>Phone</th>
                                  <th>Email</th>
                                  <th>Số lượng</th>
                                  <th>Điểm đón</th>
                                  <th>Xác nhận</th>
                               </tr>
                            </thead>
                            <tfoot>
                               <tr>
                                  <th>STT</th>
                                  <th>Tên</th>
                                  <th>Phone</th>
                                  <th>Email</th>
                                  <th>Số lượng</th>
                                  <th>Điểm đón</th>
                                  <th>Xác nhận</th>
                               </tr>
                            </tfoot>
                            <tbody>   
                               <?php $t=0 ?>
                               @foreach($khach as $k)
                               <?php $t++ ?>
                               <tr>
                                  <td>{!!$t!!}</td>
                                  <td>
                                  <?php
                                  $user_id = $k->user_id;
                                  $name = "";
                                  foreach ($user as $key => $val) {
                                    if($val->id==$user_id){
                                      $name = $val->name;
                                    }
                                  }
                                  echo $name;
                                  ?>                        
                                  </td>
                                  <td>
                                     {{$k->phone}}
                                                             
                                  </td>
                                  <td>
                                    <?php
                                  $user_id = $k->user_id;
                                  $name = "";
                                  foreach ($user as $key => $val) {
                                    if($val->id==$user_id){
                                      $name = $val->email;
                                    }
                                  }
                                  echo $name;
                                  ?>
                                  </td>
                                  <td>{{$k->number}}</td>
                                  <td>
                                     <?php
                                  $pickup_id = $k->pickupcar_id;
                                  $name = "";
                                  foreach ($pick as $key => $val) {
                                    if($val->id==$pickup_id){
                                      $name = $val->name;
                                    }
                                  }
                                  echo $name;
                                  ?> 
                                  </td>
                                  <td> <div class="checkbox">
                                    <label>
                                      <input type="checkbox" value="{{$k->id}}">
                                      
                                    </label>
                                  </div></td>
                               </tr>
                             
                            </tbody>
                     @endforeach

                         </table>  
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Xác nhận</button>
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

@endsection