@extends('admin.ad')
@section('ndc')
<div>
   <!-- Nav tabs -->
   <ul class="nav nav-tabs" role="tablist" style="margin-top: 5px; background: #d1e0e0; width: 102%;">
      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tổng hợp</a></li>
      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Lái xe</a></li>
      <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Xe</a></li>
      <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Phân công</a></li>
   </ul>
   <!-- Tab panes -->
   <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
      @if(Session::has('d_message'))
            <div class="alert alert-success">
              {!! Session::get('d_message')!!}
            </div>
            @elseif(Session::has('a_message'))
            <div class="alert alert-danger">
              {!! Session::get('a_message')!!}
            </div>
            @elseif(Session::has('b_message'))
            <div class="alert alert-danger">
              {!! Session::get('b_message')!!}
            </div>
            @elseif(Session::has('c_message'))
            <div class="alert alert-info">
              {!! Session::get('c_message')!!}
            </div>
            @endif
         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="panel panel-default">
               <div class="panel-body" style="background: #cc0000;width: 120%; height: 150px;color: #FFFFFF;font-size: 20px;font-weight: bold;  text-align: center;">
                  <h4>LÁI XE</h4>
                  <?php
                     $count =0;
                     foreach ($driver as $key => $value) {
                      $count++;
                     }
                     echo $count;
                     ?>
               </div>
            </div>
         </div>
         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="panel panel-default">
               <div class="panel-body" style="background: #1a1aff; width: 120%;  height: 150px;color: #FFFFFF;font-size: 20px;font-weight: bold;  text-align: center;">
                  <h4>XE</h4>
                  <?php
                     $count =0;
                     foreach ($car as $key => $value) {
                      $count++;
                     }
                     echo $count;
                     ?>
               </div>
            </div>
         </div>
         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="panel panel-default" style="color: #FFFFFF;font-size: 20px;font-weight: bold;  text-align: center;">
               <div class="panel-body" style="background: #ff33ff; width: 120%;  height: 150px;color: #FFFFFF;font-size: 20px;font-weight: bold;  text-align: center;">
                  <h4>BẾN</h4>
                  <?php
                     $count =0;
                     foreach ($station as $key => $value) {
                      $count++;
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
                     $count =0;
                     foreach ($rou as $key => $value) {
                      $count++;
                     }
                     echo $count;
                     ?>
               </div>
            </div>
         </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="profile">...</div>
      <div role="tabpanel" class="tab-pane" id="messages">...</div>
      <div role="tabpanel" class="tab-pane" id="settings">
         <table  class="table table-bordered " id="bangpc" style="font-size: 13px">
            <thead>
               <tr>
                  <th>STT</th>
                  <th>Xe</th>
                  <th>Lái xe</th>
                  <th>Phân công</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Lái xe</th>
                  <th>Phân công</th>
               </tr>
            </tfoot>
            <tbody>
               <tr>
                  <td>1</td>
                  <td> Xe Lộ trình </td>
                  <td>Lái xe lộ trình</td>
                  <td>
                     <a href="pcxelotrinh">  <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Phân công </button></a>
                     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#xelt">
                     <span class="glyphicon glyphicon-open-eye" aria-hidden="true"></span>Kết quả phân công</button>
                     <!-- modal -->
                     <div class="modal fade" id="xelt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <?php
                        $dri = App\Driver::where('type','=',1)->where('status','=',1)->get();
                         ?>
                           
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Xem kết quả phân công</h4>
                                 </div>
                                 <div class="modal-body">
                                 <div class="table-responsive">
                                   <table class="table table-border" id="bangpclxlt">
                                     <thead>
                                       <tr>
                                         <th>STT</th>
                                         <th>Lái xe</th>
                                         <th>Xe</th>
                                         <th>Tuyến xe</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                     <?php $k= 0?>
                                     @foreach($dri as $value)
                                      <?php $k++?>
                                       <tr>
                                         <td>{!!$k!!}</td>
                                         <td>
                                          <?php
                                           $user_id = $value->user_id;
                                           $name = "";
                                           $user = App\User::where('id','=',$user_id)->get();
                                           foreach ($user as $key => $val) {
                                             $name = $val->name;
                                           }
                                           echo $name;
                                           ?> 
                                         </td>
                                         <td>
                                           <?php
                                           $driver_id = $value->id;
                                           $namecar = "";
                                           $car_id = "";
                                           $dcar = App\DriverCar::where('driver_id','=',$driver_id)->get();
                                           foreach ($dcar as $key => $val) {
                                             $car_id = $val->car_id;
                                           }
                                           $car = App\Car::where('id','=',$car_id)->get();
                                           foreach ($car as $key => $val) {
                                             $namecar = $val->name;
                                           }
                                           echo $namecar;
                                           ?>
                                         </td>
                                         <td>
                                          <?php
                                           $driver_id = $value->id;
                                           $station_name = "";
                                           $car_id = "";
                                           $station_id = "";
                                           $dcar = App\DriverCar::where('driver_id','=',$driver_id)->get();
                                           foreach ($dcar as $key => $val) {
                                             $car_id = $val->car_id;
                                           }
                                           $carstation = App\CarRoute::where('car_id','=',$car_id)->get();
                                           foreach ($carstation as $key => $val) {
                                             $station_id = $val->router_id;
                                           }
                                           $station = App\Router::where('id','=',$station_id)->get();
                                           foreach ($station as $key => $val) {
                                             $station_name = $val->name;
                                           }
                                           echo $station_name;
                                           ?> 
                                         </td>
                                       </tr>
                                     </tbody>
                                     @endforeach
                                   </table>
                                 </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                    
                                 </div>
                              </div>
                           </div>
                        
                     </div>
                  </td>
               </tr>
               <tr>
                  <td>2</td>
                  <td> Xe trạm đón </td>
                  <td>Lái xe trạm đón</td>
                  <td>
                     <a href="pcxetram"> <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Phân công </button> </a>
                     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#xedon">
                     <span class="glyphicon glyphicon-open-eye" aria-hidden="true"></span>Kết quả phân công</button>
                     <!-- modal -->
                     <div class="modal fade" id="xedon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <?php
                        $driver = App\Driver::where('type','=',2)->where('status','=',1)->get();
                         ?>
                           
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Xem kết quả phân công</h4>
                                 </div>
                                 <div class="modal-body">
                                 <div class="table-responsive">
                                   <table class="table table-border" id="bangpclxd">
                                     <thead>
                                       <tr>
                                         <th>STT</th>
                                         <th>Lái xe</th>
                                         <th>Xe</th>
                                         <th>Bến xe</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                     <?php $i= 0?>
                                     @foreach($driver as $value)
                                      <?php $i++?>
                                       <tr>
                                         <td>{!!$i!!}</td>
                                         <td>
                                           <?php
                                           $user_id = $value->user_id;
                                           $name = "";
                                           $user = App\User::where('id','=',$user_id)->get();
                                           foreach ($user as $key => $val) {
                                             $name = $val->name;
                                           }
                                           echo $name;
                                           ?>
                                         </td>
                                         <td>
                                           <?php
                                           $driver_id = $value->id;
                                           $namecar = "";
                                           $car_id = "";
                                           $dcar = App\DriverCar::where('driver_id','=',$driver_id)->get();
                                           foreach ($dcar as $key => $val) {
                                             $car_id = $val->car_id;
                                           }
                                           $car = App\Car::where('id','=',$car_id)->get();
                                           foreach ($car as $key => $val) {
                                             $namecar = $val->name;
                                           }
                                           echo $namecar;
                                           ?>
                                         </td>
                                         <td>
                                           <?php
                                           $driver_id = $value->id;
                                           $station_name = "";
                                           $car_id = "";
                                           $station_id = "";
                                           $dcar = App\DriverCar::where('driver_id','=',$driver_id)->get();
                                           foreach ($dcar as $key => $val) {
                                             $car_id = $val->car_id;
                                           }
                                           $carstation = App\CarStation::where('car_id','=',$car_id)->get();
                                           foreach ($carstation as $key => $val) {
                                             $station_id = $val->station_id;
                                           }
                                           $station = App\Station::where('id','=',$station_id)->get();
                                           foreach ($station as $key => $val) {
                                             $station_name = $val->name;
                                           }
                                           echo $station_name;
                                           ?>
                                         </td>
                                       </tr>
                                       @endforeach
                                     </tbody>
                                   </table>
                                 </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                    
                                 </div>
                              </div>
                           </div>
                        
                     </div>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>
<style>
   .name-summary {
   color: #FFFFFF;
   font-weight: bold;
   }
   .vote-padding
</style>
<div class="row well well-sm" style="margin-left: 0px;margin-right: 0px;margin-bottom: -1px">
   <div class="col-xs-8 col-sm-9 col-md-10 col-lg-11">
      <span class="company-register name-page-profile">Thống kê số lượng vé đặt tại các bến</span>
   </div>
</div>
<div class="panel panel-default">
   <div class="panel-body">
      <canvas id="myChart" min-width="500" style="background-color: #f5f5f5; height: 420px;"></canvas>
   </div>
</div>
<script>
   var nameCompany = new Array();
   var pointCompany = new Array();
   $.get('station', function (data) {
       $.each(data, function (index, sta) {
           nameCompany.push(sta.name);
           pointCompany.push(sta.number);
       });
       window.console.log(nameCompany.length);
       var ctx = document.getElementById('myChart').getContext('2d');
       var mylable = nameCompany;
       var myChart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: mylable,
               datasets: [{
                   label: 'Số vé đặt tại bến',
                   data: pointCompany,
                   backgroundColor: "#286091"
               }]
           },
           options: {
               scales: {
                   yAxes: [{
                       ticks: {
                           min: 0,
                           max: 100,
                           callback: function (value) {
                               return value
                           },
                           stacked: true
                       }
                   }]
               },
               animation: {
                   duration: 500,
                   easing: "easeOutQuart",
                   onComplete: function () {
                       var ctx = this.chart.ctx;
                       ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                       ctx.textAlign = 'center';
                       ctx.textBaseline = 'bottom';
   
                       this.data.datasets.forEach(function (dataset) {
                           for (var i = 0; i < dataset.data.length; i++) {
                               var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                       scale_max = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._yScale.maxHeight;
                               ctx.fillStyle = '#444';
                               var y_pos = model.y - 5;
                               // Make sure data value does not get overflown and hidden
                               // when the bar's value is too close to max value of scale
                               // Note: The y value is reverse, it counts from top down
                               if ((scale_max - model.y) / scale_max >= 0.93)
                                   y_pos = model.y + 20;
                               ctx.fillText(dataset.data[i], model.x, y_pos);
                           }
                       });
                   }
               }
           }
       });
   });
   $(function () {
       $('#statistic-vote').addClass('menu-menu');
       $('a#statistic-vote').css('color', '#000000');
   
   });
   
</script>
<script>
         $("div.alert").delay(3000).slideUp();
         
          </script>
@endsection