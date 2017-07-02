@extends('admin_station.master')
@section('ndc')
<div class="panel panel-primary" style="width: 100%; margin-top: 5px;">
<div class="panel panel-heading">Xác nhận khách hàng</div>
     <?php
      $today = date('d-m-Y');
      $u = strtotime($today) + 60*60*24;
      $tomorow = date('d-m-Y',$u);
      echo "Xác nhận khách hàng ngày:".$tomorow;
     ?>
      @if(Session::has('xacnhanmai_message'))
            <div class="alert alert-success">
              {!! Session::get('xacnhanmai_message')!!}
            </div>
        @elseif(Session::has('doimai_message'))
            <div class="alert alert-success">
              {!! Session::get('doimai_message')!!}
            </div>
        @elseif(Session::has('pcmai_message'))
            <div class="alert alert-success">
              {!! Session::get('pcmai_message')!!}
            </div>
        @elseif(Session::has('kpcmai_message'))
            <div class="alert alert-danger">
              {!! Session::get('kpcmai_message')!!}
            </div>
      @endif
	<div class="panel-body">
      <?php
       
        $to = date('d-m-Y');
        $u = strtotime($to) + 60*60*24;
        $today = date('Y-m-d',$u);
        $user_id = Auth::user()->id;
        $station_id="";
        $arraytuyen = array();
        $arraylt = array();
        $tic= array();
        foreach ($ad as $key => $value) {
          if($value->user_id==$user_id){
            $station_id = $value->station_id;
          }
        }
        foreach ($rou as $key => $value) {
          if($value->station_id==$station_id){
            $arraytuyen[] = $value->id;
          }
        }
        foreach ($rou_car as $key => $value) {
          for ($m=0; $m <count($arraytuyen) ; $m++) { 
            if($value->router_id==$arraytuyen[$m]){
              $arraylt[] = $value->id;
            }
          }
        }
        foreach ($tickit as $key => $value) {
          for ($n=0; $n <count($arraylt) ; $n++) { 
            if($value->routercar_id==$arraylt[$n]&&$value->date==$today){
              $tic[] = $value; 
            }
          }
        }
      ?>
		<table id="bangvetram" class="table table-striped table-bordered " cellspacing="0" width="100%" style="font-size: 12px;">
        <thead>
            <tr>
                <th>STT</th> 
                <th>Vé trống</th>
                <th>Tuyến</th>
                <th>Thời gian</th>
                <th>Lái xe</th>
                <th>Trạng thái</th>
                <th style="min-width: 61px;">Quản lí</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>STT</th> 
                <th>Vé Trống</th> 
                <th>Tuyến</th>
                <th>Thời gian</th>
                <th>Lái xe</th>
                <th>Trạng thái</th>
                <th>Quản lí</th>
            </tr>
        </tfoot>
        <tbody>
        <?php $i=0;?>
        @foreach($tic as $item)
        <?php $i++?>
            <tr> 
                <td>{!!$i!!}</td>
                
                <td>{!!$item["empty_tickit"]!!}</td>
               
                <td>
                <?php
                 $idlt = $item["routercar_id"];
                 $idtuyen = "";
                 $name = "";
                 foreach ($rou_car as $key => $value) {
                     if($value->id==$idlt){
                        $idtuyen = $value->router_id;
                     }
                 }
                 $tuyen = App\Router::where('id','=',$idtuyen)->get();
                 foreach ($tuyen as $key => $value) {
                     
                        $name = $value->name;
                     
                 }
                  echo $name;
                ?>
                </td>
                <td>
                    <?php
                    $idlt = $item["routercar_id"];
                 $idtuyen = "";
                 $name = "";
                 foreach ($rou_car as $key => $value) {
                     if($value->id==$idlt){
                        $idtuyen = $value->time;
                     }
                 }
                 
                  echo $idtuyen;
                ?>
                </td>
                <td>
                  <?php
                  $routercar_id = $item["routercar_id"];
                  $car_rou_id = "";
                  $car_id ="";
                  $driver_id ="";
                  $user_id = "";
                  $name ="";
                  foreach ($rou_car as $key => $value) {
                    if($value->id==$routercar_id){
                      $car_rou_id = $value->car_route_id;
                    }
                  }
                  $car_route = App\CarRoute::where('id','=',$car_rou_id)->get();
                  foreach ($car_route as $key => $value) {
                      $car_id = $value->car_id;
                  }
                  $dcars = App\DriverCar::where('car_id','=',$car_id)->get();
                  foreach ($dcars as $key => $value) {
                      $driver_id = $value->driver_id;
                  }
                  foreach ($driver as $key => $value) {
                    if($value->id==$driver_id){
                      $user_id = $value->user_id;
                    }
                  }
                  foreach ($user as $key => $value) {
                    if($value->id==$user_id){
                      $name = $value->name;
                    }
                  }
                  echo $name;
                  
                   ?>
                </td>
                <td>
                  <?php
                   $status = $item["status"];
                   if($status==1){
                    echo "Đã xác nhân";
                   }elseif ($status==0) {
                     echo "Chưa xác nhận";
                   }
                  ?>
                </td>
                <td>
                     
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#{{$item->id}}" name="modal1">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </button>
                <a href="{!! route('adminsts_phancongmai',['id'=>$item["id"]]) !!}"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
                <button type="button" class="btn btn-danger"data-toggle="modal" data-target="#{{$item->id}}{{'doilaixe'}}">
                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                </button>
                <!-- modal -->
                <div class="modal fade" id="{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                  <form action="adminsts_xacnhanmai" method="POST" role="form">
                  <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                  <input type="hidden" name="ve" value="{!!$item->id!!}"/>

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
                            <table  class="table table-bordered dskht"  style="font-size: 13px">
                            <thead>
                               <tr>
                                  <th>STT</th>
                                  <th>Tên</th>
                                  <th>Phone</th>
                                  <th>Email</th>
                                  <th>Số lượng</th>
                                  <th>Điểm đón</th>
                                   <th>Lái xe đón</th>
                                  <th>Trạng thái</th>
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
                                  <th>Trạng thái</th>
                                   <th>Lái xe đón</th>
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
                                  <td>
                                    <?php 
                                    $guest_id = $k->id;
                                    $tickit_id = $item->id;
                                    $driver_car = App\Work::finddriver($guest_id,$tickit_id);
                                    $driver_id = App\DriverCar::laylaixe_id($driver_car);
                                    $user_id = App\Driver::timng($driver_id);
                                    $name = App\User::timten($user_id);
                                    echo $name;
                                    ?>
                                  </td>
                                  <td>
                                    <?php
                                    $trangthai = $k->status;
                                    if($trangthai==0){
                                      echo "Đang đặt vé";
                                    }
                                    elseif ($trangthai==-1) {
                                      echo "Đang chờ";
                                    }
                                    elseif($trangthai==1){
                                      echo "xác nhận";
                                    }else{
                                       echo "hủy";
                                    }
                                    ?>
                                  </td>

                                  <td> 
                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox" value="{{$k->id}}" name="check[]">
                                      
                                    </label>
                                  </div>
                                  </td>
                               </tr>
                             
                            </tbody>
                     @endforeach

                         </table>  
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Xác nhận</button>
                           </div>
                        </div>
                     </div>
                  </form>
                  </div>
                  <div class="modal fade" id="{{$item->id}}{{'doilaixe'}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                  <form action="adminsts_doilaixemai" method="POST" role="form">
                  <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                  <input type="hidden" name="lotrinh_id" value="{!!$item->routercar_id!!}"/>
                   <?php
                    $lotrinh_id = $item->routercar_id;
                    $lotrinh=App\Route_car::all();
                    $router=App\Router::all();
                    $carroute=App\CarRoute::all();
                    $driver_car=App\DriverCar::all();
                    $driver = App\Driver::all();
                    $user = App\User::all();
                    $rou = array();
                    $car_rou =array();
                    $driverr = array();
                    $dri = array();
                    $roucar = array();
                    $laixe = array();
                    foreach ($lotrinh as $key => $value) {
                      if($value->id==$lotrinh_id){
                        $roucar[] = $value;
                      }
                    }
                    foreach ($router as $key => $value) {
                      foreach ($roucar as $key => $val) {
                        if($value->id==$val->router_id){
                          $rou[]=$value;
                        }
                      }
                    }
                    foreach ($carroute as $key => $value) {
                      foreach ($rou as $key => $val) {
                        if($val->id==$value->router_id&&$value->status==0){
                          $car_rou[] = $value;
                        }
                      }
                    }
                    foreach ($car_rou as $key => $value) {
                      foreach ($driver_car as $key => $val) {
                        if($val->car_id==$value->car_id){
                          $driverr[] = $val;
                        }
                      }
                    }
                    foreach ($driver as $key => $value) {
                      foreach ($driverr as $key => $val) {
                        if($val->driver_id==$value->id){
                          $dri[] = $value;
                        }
                      }
                    }
                    foreach ($dri as $key => $value) {
                      foreach ($user as $key => $val) {
                        if($value->user_id==$val->id){
                          $laixe[] = $val;
                        }
                      }
                    }
                    ?>
                     <div class="modal-dialog" role="document">
                        <div class="modal-content" style="">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel">Đổi lái xe lái</h4>
                           </div>
                           <div class="modal-body">
                            <label for="">ĐỔI LÁI XE</label>
                             <select name="category" id="category" class="form-control" required="required">
                              <option value="">--Chọn lái xe đổi--</option>
                               @foreach($laixe as $category)
                               <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                               </select>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Đổi</button>
                           </div>
                        </div>
                     </div>
                  </form>
                  </div>
                </td>
            </tr>
          @endforeach
          
</tbody>
</table>
</div>
</div>

@endsection