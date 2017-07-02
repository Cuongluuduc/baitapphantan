@extends('driver.master')
@section('ndc')
<div class="panel panel-primary" style="margin-top: 5px;">
<div class="panel panel-heading">Lịch đón khách hàng</div>
	<div class="panel-body">
	<?php
	$user_id = Auth::user()->id;
	$driver = App\Driver::where('user_id','=',$user_id)->get();
	$drivercar = App\DriverCar::all();
	$drivercarct = array();
	foreach ($driver as $key => $value) {
		foreach ($drivercar as $key => $val) {
			if($value->id==$val->driver_id){
				$drivercarct[] = $val;
			}
		}
	}
	$today = date('Y-m-d');
	$mai = strtotime($today)+60*60*24;
	$ngaymai = date('Y-m-d',$mai);
	$tic = App\Tickit::where('date','=',$ngaymai)->get();
	$work = App\Work::all();
	$lich = array();
	
	foreach ($work as $key => $value) {
		foreach ($tic as $key => $val) {
			foreach ($drivercarct as $key => $v) {
				if($value->tickit_id==$val->id&&$value->drivercar_id==$v->id){
					$lich[] = $value;
				}
			}
		}
	}
	?>
		<div class="table-responsive">
			<table id="lichlv" class="table table-striped table-bordered " cellspacing="0" width="100%" style="font-size: 13px;">
				<thead>
					<tr>
						<th>STT</th>
						<th>Khách hàng</th>
						<th>Số điện thoại</th>
						<th>Địa điểm đón</th>
						<th>Chuyến đi của khách</th>
					</tr>
				</thead>
				<tbody>
				<?php $i = 0;?>
				@foreach($lich as $value)
				<?php $i++;?>
					<tr>
						<td>{{$i}}</td>
						<td>
							<?php
							$guest_id = $value->guest_id;
							$guest = App\Guest::where('id','=',$guest_id)->get();
							$user_id = "";
							$name ="";
							foreach ($guest as $key => $val) {
								$user_id = $val->user_id;
							}
							$user = App\User::where('id','=',$user_id)->get();
							foreach ($user as $key => $val) {
								$name = $val->name;
							}
							echo $name;
							?>
						</td>
						<td>
							<?php
							$guest_id = $value->guest_id;
							$guest = App\Guest::where('id','=',$guest_id)->get();
							$user_id = "";
							$phone ="";
							foreach ($guest as $key => $val) {
								$phone = $val->phone;
							}
							
							echo $phone;
							?>
						</td>
						<td>
                            <?php
							$guest_id = $value->guest_id;
							$guest = App\Guest::where('id','=',$guest_id)->get();
							$pickup_id = "";
							$name ="";
							foreach ($guest as $key => $val) {
								$pickup_id = $val->pickupcar_id;
							}
							$pic = App\Pickup_point::where('id','=',$pickup_id)->get();
							foreach ($pic as $key => $val) {
								$name = $val->name;
							}
							echo $name;
							?>
						</td>
						<td>
							<?php
							$tickit_id = $value->tickit_id;
							$roucar_id = "";
							$time = "";
							$chuyen = App\Tickit::where('id','=',$tickit_id)->get();
							foreach ($chuyen as $key => $val) {
								$roucar_id = $val->routercar_id;
							}
							$roucar = App\Route_car::where('id','=',$roucar_id)->get();
							foreach ($roucar as $key => $val) {
							    $time = $val->time;
							}
							echo $time;
							?>
						</td>
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection