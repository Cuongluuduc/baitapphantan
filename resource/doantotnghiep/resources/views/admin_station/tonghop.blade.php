@extends('admin_station.master')
@section('ndc')
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tổng hợp</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Lái xe đón khách</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Lái xe tuyến</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
<div class="panel panel-default">
  	<div class="panel-body" style="background: #cc0000;width: 120%; height: 150px;color: #FFFFFF;font-size: 20px;font-weight: bold;  text-align: center;">
  		<h4>LÁI XE ĐÓN</h4>
  		<?php
      $user_id = Auth::user()->id;
      $station_id = "";
      $car_id = array();
      foreach ($ad as $key => $value) {
        if($value->user_id==$user_id){
          $station_id = $value->station_id;
        }
      }
      foreach ($carstation as $key => $value) {
        if($value->station_id==$station_id){
          $car_id[]=$value;
        }
      }
  		$count =0;
  		foreach ($drcar as $key => $value) {
        foreach ($car_id as $key => $val) {
          if($value->car_id==$val->car_id){
            $count++;
          }
        }
  			
  		}
  		echo $count;
  		?>
  	</div>
  </div>	
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	<div class="panel panel-default">
  	<div class="panel-body" style="background: #1a1aff; width: 120%;  height: 150px;color: #FFFFFF;font-size: 20px;font-weight: bold;  text-align: center;">
  		<h4>XE ĐÓN</h4>
  		<?php
      $user_id = Auth::user()->id;
      $station_id = "";
      foreach ($ad as $key => $value) {
        if($value->user_id==$user_id){
          $station_id = $value->station_id;
        }
      }
  		$count =0;
  		foreach ($carstation as $key => $value) {
        if($value->station_id==$station_id){
          $count++;
        }
  			
  		}
  		echo $count;
  		?>
  	</div>
  </div>
</div>
 
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	<div class="panel panel-default">
  	<div class="panel-body" style="background: #00e600;width: 120%;  height: 150px;color: #FFFFFF;font-size: 20px;font-weight: bold;  text-align: center;">
  		<h4>TUYẾN</h4>
  		<?php
      $user_id = Auth::user()->id;
      $station_id = "";
      foreach ($ad as $key => $value) {
        if($value->user_id==$user_id){
          $station_id = $value->station_id;
        }
      }
  		$count =0;
  		foreach ($rou as $key => $value) {
        if($value->station_id==$station_id){
          $count++;
        }
  			
  		}
  		echo $count;
  		?>
  	</div>
  </div>
</div> 	
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
  <div class="panel panel-default">
    <div class="panel-body" style="background: #00e600;width: 120%;  height: 150px;color: #FFFFFF;font-size: 20px;font-weight: bold;  text-align: center;">
      <h4>SỐ CHUYẾN</h4>
      <?php
      $user_id = Auth::user()->id;
      $station_id = "";
      $tuyen = array();
      foreach ($ad as $key => $value) {
        if($value->user_id==$user_id){
          $station_id = $value->station_id;
        }
      }
      $count =0;
      foreach ($rou as $key => $value) {
        if($value->station_id==$station_id){
          $tuyen[]=$value;
        }
        
      }
      foreach ($rou_car as $key => $value) {
        foreach ($tuyen as $key => $val) {
          if($value->router_id==$val->id){
            $count++;
          }
        }
        
      }
      echo $count;
      ?>
    </div>
  </div>
</div>  
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
      <div class="table-responsive">
      <?php
      $user_id = Auth::user()->id;
      $admin = App\AdminStation::where('user_id','=',$user_id)->get();
      $car = App\CarStation::all();
      $carstation_id = array();
      foreach ($admin as $key => $value) {
        foreach ($car as $key => $val) {
          if($value->station_id==$val->station_id){
            $carstation_id[] = $val; 
          }
        }
      }
      $drivercar = App\DriverCar::all();
      $drivercar_id = array();
      foreach ($drivercar as $key => $value) {
        foreach ($carstation_id as $key => $val) {
          if($val->car_id==$value->car_id){
            $drivercar_id[] = $value;
          }
        }
      }
      $driver = App\Driver::all();
      $driver_id = array();
      foreach ($driver as $key => $value) {
        foreach ($drivercar_id as $key => $val) {
          if($value->id==$val->driver_id){
            $driver_id[] = $value;
          }
        }
      }
      $ng = App\User::all();
      $ngtim = array();
      foreach ($ng as $key => $value) {
        foreach ($driver_id as $key => $val) {
          if($value->id==$val->user_id){
            $ngtim[] = $value;
          }
        }
      }
      ?>
        <table id="laixe" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size: 13px;">
          <thead>
            <tr>
              <th>STT</th>
              <th>Họ tên</th>
              <th>Số điện thoại</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 0;?>
          @foreach($ngtim as $value)
          <?php $i++;?>
            <tr>
              <td>{!!$i!!}</td>
              <td>{!!$value->name!!}</td>
              <td>
                <?php
                $nguoidung_id = $value->id;
                $phone = "";
                $laice = App\Driver::where('user_id','=',$nguoidung_id)->get();
                foreach ($laice as $key => $v) {
                  $phone = $v->phone;
                }
                echo $phone;
                ?>
              </td>
              <td>{!!$value->email!!}</td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
       <div class="table-responsive">
      <?php
      $user_id = Auth::user()->id;
      $admin = App\AdminStation::where('user_id','=',$user_id)->get();
      $rou = App\Router::all();
      $rou_id = array();
      foreach ($admin as $key => $value) {
        foreach ($rou as $key => $val) {
          if($value->station_id==$val->station_id){
            $rou_id[] = $val; 
          }
        }
      }
      $car = App\CarRoute::all();
      $carrou_id = array();
      foreach ($rou_id as $key => $value) {
        foreach ($car as $key => $val) {
          if($value->id==$val->router_id){
            $carrou_id[] = $val;
          }
        }
      }
      $drivercar = App\DriverCar::all();
      $drivercar_id = array();
      foreach ($drivercar as $key => $value) {
        foreach ($carrou_id as $key => $val) {
          if($val->car_id==$value->car_id){
            $drivercar_id[] = $value;
          }
        }
      }
      $driver = App\Driver::all();
      $driver_id = array();
      foreach ($driver as $key => $value) {
        foreach ($drivercar_id as $key => $val) {
          if($value->id==$val->driver_id){
            $driver_id[] = $value;
          }
        }
      }
      $ng = App\User::all();
      $ngtim = array();
      foreach ($ng as $key => $value) {
        foreach ($driver_id as $key => $val) {
          if($value->id==$val->user_id){
            $ngtim[] = $value;
          }
        }
      }
      ?>
        <table id="laixehai" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size: 13px;">
          <thead>
            <tr>
              <th>STT</th>
              <th>Họ tên</th>
              <th>Số điện thoại</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 0;?>
          @foreach($ngtim as $value)
          <?php $i++;?>
            <tr>
              <td>{!!$i!!}</td>
              <td>{!!$value->name!!}</td>
              <td>
                <?php
                $nguoidung_id = $value->id;
                $phone = "";
                $laice = App\Driver::where('user_id','=',$nguoidung_id)->get();
                foreach ($laice as $key => $v) {
                  $phone = $v->phone;
                }
                echo $phone;
                ?>
              </td>
              <td>{!!$value->email!!}</td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
    </div>
    </div>


@endsection
