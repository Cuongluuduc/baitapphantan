@extends('driver.master')
@section('ndc')
<div class="panel panel-primary" style="margin-top: 5px;">
<div class="panel panel-heading"> Lịch làm việc </div>
	<div class="panel-body">
	<?php
	$dir = "";
	foreach ($user as $key => $ng) {
		if($ng->user_id==Auth::user()->id){
			$dir = $ng->id;
		}
	}
	$car_id= "";
	foreach ($drivercar as $key => $value) {
		if($value->driver_id==$dir){
			$car_id = $value->car_id;
		}
	}
	 $idcarrou = array();
	 foreach ($carrou as $key => $val) {
	 	if($val->car_id==$car_id){
     $idcarrou[] = $val->id;
	 	}
	 }
	 $idroucar = array();
	 foreach ($roucar as $key => $va) {
	 	for ($i=0; $i<count($idcarrou); $i++) {
	 		if($va->car_route_id==$idcarrou[$i]){
	 			$idroucar[] = $va->id;
	 		}
	 	}
	 	
	 }
	 $ve = array();
	 foreach ($tickit as $key => $v) {
	 	for ($t=0; $t<count($idroucar); $t++) {
	 		if($v->routercar_id==$idroucar[$t]){
                $ve[] = $v;

	 		}
	 	}
	 }
	 $vehn = array();
     foreach ($ve as $key => $vl) {
        
            if($vl->date==date('Y-m-d')){
                $vehn[] = $vl;

            }
        
     }
	 ?>
     <div class="table-responsive">
		<table id="lichlamviec" class="table table-bordered" style="font-size: 13px;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ngày</th>
                <th>Thời gian</th>
                <th>Bến</th>
                <th>Tuyến</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>STT</th>
                <th>Ngày</th>
                <th>Thời gian</th>
                <th>Bến</th>
                <th>Tuyến</th>
            </tr>
        </tfoot>
        <tbody>
        <?php $k=0 ?>
        @foreach($vehn as $item)
        <?php $k++ ?>
            <tr>
                <td>{!!$k!!}</td>
                <td>
                <?php
                $time =$item->date;
                $time = date('d-m-Y',strtotime($time));
                echo $time;
                ?>
                </td>
                <td>
                <?php
                $roucar_id = $item->routercar_id;
                $time = "";
                foreach ($roucar as $key => $value) {
                	if($value->id==$roucar_id){
                		$time = $value->time;
                	}
                }
                echo $time;
                ?>
                </td>
                <td>
                	<?php
                $roucar_id = $item->routercar_id;
                $time = "";
                $name ="";
                $ben = "";
                foreach ($roucar as $key => $value) {
                	if($value->id==$roucar_id){
                		$time = $value->router_id;
                	}
                }
                foreach ($rou as $key => $value) {
                	if($value->id==$time){
                		$name = $value->station_id;
                	}
                }
                foreach ($station as $key => $value) {
                	if($value->id==$name){
                		$ben = $value->name;
                	}
                }
                echo $ben;
                ?>
                </td>
                <td>
                	<?php
                $roucar_id = $item->routercar_id;
                $time = "";
                $name ="";
                foreach ($roucar as $key => $value) {
                	if($value->id==$roucar_id){
                		$time = $value->router_id;
                	}
                }
                foreach ($rou as $key => $value) {
                	if($value->id==$time){
                		$name = $value->name;
                	}
                }
                echo $name;
                ?>
                </td>
                
            </tr>
          @endforeach
          </tbody>
</table>
</div>
	</div>
</div>
@endsection