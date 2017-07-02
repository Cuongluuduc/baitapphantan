@extends('admin.ad')
@section('ndc')
<div class="panel panel-primary" style="margin-top: 5px;">
   <div class="panel panel-heading"> Quản lí các chuyến đi </div>
   <div class="panel-body">
      <form action="{!!url('taolt')!!}" method="POST" role="form">
         <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
         <div class="form-group">
            @if(Session::has('tlt_message'))
            <div class="alert alert-success">
               {!! Session::get('tlt_message')!!}
            </div>
            @elseif(Session::has('ktlt_message'))
            <div class="alert alert-danger">
               {!! Session::get('ktlt_message')!!}
            </div>
            @endif
            <label for="">Bến xe</label>
            <select name="ben" id="ben" class="form-control" required="required">
               <option value="">--Chọn điểm xuất phát--</option>
               @foreach($categories as $category)
               <option value="{{$category->id}}">{{$category->name}}</option>
               @endforeach
            </select>
            <label for=""> Tuyến xe</label>
            <select name="tuyen" id="tuyen" class="form-control" required="required">
               <option value="">--Chọn tuyến xe--</option>
            </select>
            <label class="name-label">Thời gian xe chạy:</label>
            <div class='input-group date' id='timePickerr'>
               <input type='text' name="timeStart" id="timeStart" required="required" class="form-control" style="" >
               <span class="input-group-addon">
               <span class="glyphicon glyphicon-calendar"></span>
               </span>
            </div>
            <label for=""> Xe </label>
                   <select name="xe" id="xe" class="form-control" required="required">
                  <option value="">--Chọn xe--</option>
                  </select>
         </div>
         <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
   </div>
</div>
<div class="panel panel-primary">
   <div class="panel panel-heading">Danh sách chuyến đi</div>
   <div class="panel-body">
      <div class="table-responsive">
         @if(Session::has('xlt_message'))
         <div class="alert alert-success">
            {!! Session::get('xlt_message')!!}
         </div>
         @elseif(Session::has('slt_message'))
         <div class="alert alert-success">
            {!! Session::get('slt_message')!!}
         </div>
         @endif
         <table id="exam" class="table table-bordered" style="font-size: 13px">
            <thead>
               <tr>
                  <th>STT</th>
                  <th>Bến</th>
                  <th>Tuyến</th>
                  <th>Xuất phát</th>
                  <th>Xe lộ trình</th>
                  <th>Quản lí</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <th>STT</th>
                  <th>Bến</th>
                  <th>Tuyến</th>
                  <th>Xuất phát</th>
                  <th>Xe lộ trình</th>
                  <th>Quản lí</th>
               </tr>
            </tfoot>
            <tbody>
               <?php $i=0 ?>
               @foreach($lt as $item)
               <?php $i++ ?>
               <tr>
                  <td>{!!$i!!}</td>
                  <td>
                     <?php
                        $router_id = $item["router_id"];
                        $id="";
                        $name="";
                        foreach ($rou as $key => $value) {
                        	if($value->id==$router_id){
                        		$id = $value->station_id;
                        	}
                        }
                        foreach ($categories as $key => $value) {
                        	if($value->id==$id){
                        		$name = $value->name;
                        	}
                        }
                        echo $name;
                                             ?>
                  </td>
                  <td>
                     <?php
                        $router_id = $item["router_id"];
                        $name="";
                        foreach ($rou as $key => $value) {
                        	if($value->id==$router_id){
                        		$name = $value->name;
                        	}
                        }
                        echo $name;
                                             ?>
                  </td>
                  <td>{!!$item["time"]!!}</td>
                  <td>
                     <?php
                     $r = $item["car_route_id"];
                     $car_id = "";
                     $name ="";
                     foreach ($carrou as $key => $value) {
                        if($value->id==$r){
                           $car_id = $value->car_id;
                        }
                     }
                     foreach ($car as $key => $value) {
                        if($value->id==$car_id){
                           $name = $value->name;
                        }
                     }
                     echo $name;
                     ?>

                  </td>
                  <td>
                     <a href="{!! route('getdeletelt',['id'=>$item["id"]]) !!}"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
                     <a href="#"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{$item->id}}">
                     <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button></a>
                     <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                     <div class="modal fade" id="{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title" id="myModalLabel">Sửa thời gian lộ trình</h4>
                              </div>
                              <div class="modal-body">
                                 <form action="{!!url('edittime')!!}" method="POST" role="form" id="{{$item->id}}">
                                    <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <div class="form-group">
                                       <label class="name-label">Thời gian xe chạy:</label>
                                       <div class='input-gro
                                       up date' class="timeSua{{$item->id}}" onClick="startChange({{$item->id}})">
                                          <input type='text' name="timeStart" id="timeStart" required="required" class="form-control" style="" >
                                          <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                          </span>
                                       </div>
                                    </div>
                                    <button type="submit" class="btn btn-success"> Sửa </button>
                                 </form>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Save changes</button>
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
<script>
   $('#ben').on('change', function(e){
     console.log(e);
     var cat_id =e.target.value;
     $.get('cat?cat_id=' + cat_id, function(data){
       $('#tuyen').empty();
       $('#tuyen').append('<option value="">--Chọn tuyến xe--</option>');
       $.each(data, function(index, subcatObj){
                 $('#tuyen').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>');
       });  
     });       
   }); 
   $('#tuyen').on('change', function(e){
     // console.log(e);
     var rou_id =e.target.value;
     $.get('car?rou_id=' + rou_id, function(data){
       $('#xe').empty();
       $('#xe').append('<option value="">--Chọn xe--</option>');
       $.each(data, function(index, subcatObj){
         console.log(subcatObj);
                 $('#xe').append('<option value="'+subcatObj.id+'">'
                  +subcatObj.name+'</option>');
       });  
     });       
   }); 
   function startChange(id){
		$("." + "timeSua" + id, "#" + id).datetimepicker({
   		format : 'LT',
   });
   }
   $(function () {
   $('#timePickerr').datetimepicker({
   format : 'LT',
   });
   });
   // $(function () {
   // $('#timesua').datetimepicker({
   // format : 'LT',
   // });
   // });
    $("div.alert").delay(3000).slideUp();
</script> 
@endsection