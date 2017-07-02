@extends('admin.ad')
@section('ndc')
<div class="panel panel-primary" style="margin-top: 5px;">
<div class="panel panel-heading"> Thống kê đặt vé từng tuyến</div>
    <?php
    $rou = App\Router::all();
    ?>
	<div class="panel-body">
	 <div class="row">
		<div class="container">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="">
        <div class="form-group">
            <div class='input-group date' id='datetimepicker10'>
                <input type='text' id="time" class="form-control" />
                <span class="input-group-addon" style="">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
              
	               <select name="category" id="category" class="form-control" required="required">
                  <option value="">---Chọn bến xe---</option>
		               @foreach($station as $category)
                   <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
              		 </select>
               </div>
     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
     <button type="button" name="timkiem" id="timkiem" class="btn btn-primary">Thống kê</button>

     </div>
     <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
    
     </div>
            </div>
     
     <div class="table-responsive">
      	 <table id="bangbaocao" class="table table-bordered  " style="font-size: 13px; ">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tuyến</th>
                <th>Số vé</th>
                <th>Số chuyến đi</th> 
                <th>Doanh thu</th>
            </tr>
        </thead>
        
        <tbody id="bang">
        
           </tbody>
           
    </table>
    </div>
    <div class="table-responsive">
    <table id="bangbaocaoben" class="table table-bordered  " style="font-size: 13px; ">
        <thead>
            <tr>
                <th>STT</th>
                <th>Bến</th>
                <th>Số vé</th>
                <th>Số chuyến đi</th> 
                <th>Doanh thu</th>
            </tr>
        </thead>
       
        <tbody id="banghai">
        
           </tbody>
           
    </table>

	</div>
    <div class="table-responsive">
    <table id="bangbaocaobenl" class="table table-bordered  " style="font-size: 13px; ">
        <thead>
            <tr>
                <th>STT</th>
                <th>Bến</th>
                <th>Lái xe</th>
                <th>Số chuyến đi đón</th> 
                
            </tr>
        </thead>
        
        <tbody id="bangba">
        
           </tbody>
           
    </table>

    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datetimepicker10').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
            $('#timkiem').click(function(){
                 var thoigian = $('#time').val();
                 var ben = $('#category').val();
                 $.ajax({
                     type: 'get',
                     url:"{!! url('laydulieu')!!}",
                     data:{thoigian:thoigian, ben:ben},
                     success:function(data)
                     {
                         $('#bang').empty().html(data);
                        
                     }
                 });
            });
            $('#timkiem').click(function(){
                 var thoigian = $('#time').val();
                 var ben = $('#category').val();
                 $.ajax({
                     type: 'get',
                     url:"{!! url('laydulieuhai')!!}",
                     data:{thoigian:thoigian, ben:ben},
                     success:function(data)
                     {
                         $('#banghai').empty().html(data);
                        
                     }
                 });
            });
            $('#timkiem').click(function(){
                 var thoigian = $('#time').val();
                 var ben = $('#category').val();
                 $.ajax({
                     type: 'get',
                     url:"{!! url('laydulieuba')!!}",
                     data:{thoigian:thoigian, ben:ben},
                     success:function(data)
                     {
                          $('#bangba').empty().html(data);
                        
                     }
                 });
            });
        });
    </script>
</div>
	</div>
</div>

@endsection