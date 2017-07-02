@extends('admin.ad')
@section('ndc')

<div class="panel panel-primary" style="margin-top: 5px;">
   <div class="panel panel-heading">Quản lí bến xe:</div>
   <div class="panel-body">
      <form action="{!!url('themben')!!}" method="POST" role="form">
         <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
         @if(Session::has('f_message'))
         <div class="alert alert-success">
            {!! Session::get('f_message')!!}
         </div>
          @elseif(Session::has('dsb_message'))
         <div class="alert alert-success">
         {!! Session::get('dsb_message')!!}
         </div>
         @elseif(Session::has('xoaben_message'))
            <div class="alert alert-success">
               {!! Session::get('xoaben_message')!!}
            </div>
         @elseif(Session::has('fl_message'))
         <div class="alert alert-danger">
            {!! Session::get('fl_message')!!}
         </div>
         @endif
         <div class="form-group">
            <label for="">Tên bến:</label>
            <input type="text" name="textname" class="form-control" id="" placeholder="Input field" required="required">
         </div>
         <button type="submit" class="btn btn-primary">Thêm</button>
         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalsuaben">
         <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Sửa </button>
         <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
         <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Xóa </button>
         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModall">
         <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Xem </button>
      </form>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Xóa bến khỏi hệ thống</h4>
               </div>
               <div class="modal-body">
                  <form action="{!!url('xoaben')!!}" method="POST" role="form">
                     <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                     <div class="form-group">
                        <label for="">Chọn bến xe xóa:</label>
                        <select name="cate1" id="cate1" class="form-control" required="required">
                           <option value="">--Chọn bến xe:--</option>
                           @foreach($categories as $category)
                           <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                        </select>
                     </div>
                     <button type="submit" class="btn btn-danger">Xóa</button>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="myModalsuaben" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Sửa bến</h4>
               </div>
               <div class="modal-body">
                  <form action="{!!url('suaben')!!}" method="POST" role="form">
                     <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                     <div class="form-group">
                        <label for="">Điểm xuất phát</label>
                        <select name="ben" id="ben" class="form-control" required="required">
                           <option value="">--Chọn bến--</option>
                           @foreach($categories as $category)
                           <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                        </select>
                        <label for="">Sửa bến</label>
                        <input type="text" name="textben" class="form-control" id="" placeholder="Input field" required="required">
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
      <div class="modal fade" id="myModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Xem bến xe</h4>
               </div>
               <div class="modal-body">
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th>STT</th>
                           <th>Bến</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>STT</th>
                           <th>Bến</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        @foreach($categories as $item)
                        <tr>
                           <td>{!!$item["id"]!!}</td>
                           <td>{!!$item["name"]!!}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="panel panel-primary" style="">
   <div class="panel panel-heading"> Quản lí tuyến xe</div>
   <div class="panel-body">
      <form action="{!!url('themtuyenlt')!!}" method="POST" role="form">
         <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
         <div class="form-group">
            @if(Session::has('t_message'))
            <div class="alert alert-success">
               {!! Session::get('t_message')!!}
            </div>
            @elseif(Session::has('suatuyen_message'))
            <div class="alert alert-success">
               {!! Session::get('suatuyen_message')!!}
            </div>
            @elseif(Session::has('xoatuyen_message'))
            <div class="alert alert-success">
               {!! Session::get('xoatuyen_message')!!}
            </div>
            @elseif(Session::has('th_message'))
            <div class="alert alert-danger">
               {!! Session::get('th_message')!!}
            </div>
            @elseif(Session::has('tr_message'))
            <div class="alert alert-danger">
               {!! Session::get('tr_message')!!}
            </div>
            @endif
            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
               <label for="">Điểm xuất phát</label>
               <select name="category" id="category" class="form-control" required="required">
                  <option value="">--Chọn điểm xuất phát--</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
               </select>
               <label class="name-label">Tổng thời gian xe chạy:</label>
               <div class='input-group date' id='timePic'>
                  <input type='text' name="timeStart" id="timeStart" required="required" class="form-control" style="" >
                  <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                  </span>
               </div>
               <button type="submit" class="btn btn-primary" style=" ">Thêm</button>
               <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalsuatuyen" >
               <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Sửa </button>
               <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalxoatuyen">
               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Xóa </button>
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalxemtuyen">
               <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Xem </button>
            </div>
            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
               <label for="">Điểm đích</label>
               <select name="cate" id="cate" class="form-control" required="required">
                  <option value="">--Chọn điểm xuất phát--</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
               </select>
            </div>
         </div>
      </form>
      <div class="modal fade" id="myModalxemtuyen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Xem tuyến xe</h4>
               </div>
               <div class="modal-body">
                 <table id="examtuyen" class="table table-bordered" style="font-size: 13px">
            <thead>
               <tr>
                  <th>STT</th>
                  <th>Bến</th>
                  <th>Tuyến</th>
                  <th>Tổng thời gian</th>
                  
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <th>STT</th>
                  <th>Bến</th>
                  <th>Tuyến</th>
                  <th>Tổng thời gian</th>
                  
               </tr>
            </tfoot>
            <tbody>
               <?php $i=0 ?>
               @foreach($tuyen as $item)
               <?php $i++ ?>
               <tr>
                  <td>{!!$i!!}</td>
                  <td>
                     <?php
                        $station_id = $item["station_id"];
                        $name="";
                        foreach ($categories as $key => $value) {
                           if($value->id==$station_id){
                              $name = $value->name;
                           }
                        }
                        echo $name;
                      ?>
                  </td>
                  <td>{!!$item["name"]!!} </td>
                  <td>
                     <?php
                        $name = $item["total_time"];
                        $timeh = date('H',strtotime($name));
                        $timep = date('i',strtotime($name));
                        $time = $timeh." tiếng ".$timep." phút";
                        echo $time;
                        ?>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table> 
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="myModalxoatuyen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Xóa tuyến xe</h4>
               </div>
               <div class="modal-body">
                 <form action="{!!url('xoatuyen')!!}" method="POST" role="form">
                     <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                     <div class="form-group">
                        
                        <select name="tuyen" id="tuyen" class="form-control" required="required">
                           <option value="">--Chọn tuyến:--</option>
                           @foreach($tuyen as $category)
                           <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                        </select>
                     </div>
                     <button type="submit" class="btn btn-danger">Xóa</button>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="myModalsuatuyen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Sửa tuyến</h4>
               </div>
               <div class="modal-body">
                  <form action="{!!url('suatuyen')!!}" method="POST" role="form">
                     <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                     <div class="form-group">
                        <label for="">Chọn tuyến xe:</label>
                        <select name="tuyen" id="tuyen" class="form-control" required="required">
                           <option value="">--Chọn tuyến xe:--</option>
                           @foreach($tuyen as $category)
                           <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                        </select>
                        <label class="name-label">Tổng thời gian xe chạy:</label>
                     <div class='input-group date' id='timePictuyenxe'>
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
   </div>
</div>
<div class="panel panel-primary">
   <div class="panel panel-heading">Quản lí điểm đón khách</div>
   <div class="panel-body">
      <form action="themddon" method="POST" role="form">
         <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>  
         <div class="form-group">
            @if(Session::has('dd_message'))
            <div class="alert alert-success">
               {!! Session::get('dd_message')!!}
            </div>
            @elseif(Session::has('dtr_message'))
            <div class="alert alert-danger">
               {!! Session::get('dtr_message')!!}
            </div>
            @elseif(Session::has('ds_message'))
            <div class="alert alert-success">
               {!! Session::get('ds_message')!!}
            </div>
            @elseif(Session::has('dx_message'))
            <div class="alert alert-success">
               {!! Session::get('dx_message')!!}
            </div>
            @endif
            <label for="">Điểm xuất phát</label>
            <select name="category" id="category" class="form-control" required="required">
               <option value="">--Chọn điểm xuất phát--</option>
               @foreach($categories as $category)
               <option value="{{$category->id}}">{{$category->name}}</option>
               @endforeach
            </select>
            <label for="">Khu vực đón:</label>
            <input type="text"  name="textkv" class="form-control" id="" placeholder="Input field" required="required">
         </div>
         <button type="submit" class="btn btn-primary">Thêm</button>
         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalsuaddon">
         <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Sửa </button>
         <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#my">
         <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa </button>    
         <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalddon">
         <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Xem </button>
         <!-- Modal -->
      </form>
      <div class="modal fade" id="my" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Xóa điểm đón khỏi hệ thống</h4>
               </div>
               <div class="modal-body">
                  <form action="{!!url('xoaddon')!!}" method="POST" role="form">
                     <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                     <div class="form-group">
                        @if(Session::has('dx_message'))
                        <div class="alert alert-success">
                           {!! Session::get('dx_message')!!}
                        </div>
                        @endif
                        <label for="">Điểm xuất phát</label>
                        <select name="catek" id="catek" class="form-control" required="required">
                           <option value="">--Chọn điểm xuất phát--</option>
                           @foreach($categories as $category)
                           <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                        </select>
                        <label for="">Địa điểm đón</label>
                        <select name="pick" id="pick" class="form-control" required="required">
                           <option value="">--Chọn điểm đón--</option>
                        </select>
                     </div>
                     <button type="submit" class="btn btn-danger">Xóa</button>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="myModalsuaddon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Sửa điểm đón</h4>
               </div>
               <div class="modal-body">
                  <form action="{!!url('suaddon')!!}" method="POST" role="form">
                     <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                     <div class="form-group">
                        @if(Session::has('ds_message'))
                        <div class="alert alert-success">
                           {!! Session::get('ds_message')!!}
                        </div>
                        @endif
                        <label for="">Điểm xuất phát</label>
                        <select name="catekk" id="catekk" class="form-control" required="required">
                           <option value="">--Chọn điểm xuất phát--</option>
                           @foreach($categories as $category)
                           <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                        </select>
                        <label for="">Địa điểm đón</label>
                        <select name="pickk" id="pickk" class="form-control" required="required">
                           <option value="">--Chọn điểm đón--</option>
                        </select>
                        <label for="">Sửa địa điểm đón</label>
                        <input type="text" name="textsuaddon" class="form-control" id="" placeholder="Input field" required="required">
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
      <div class="modal fade" id="myModalddon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Xem điểm đón bến xe</h4>
               </div>
               <div class="modal-body">
                  <table id="exampled" class="table table-striped table-bordered" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th>STT</th>
                           <th>Bến</th>
                           <th>Điểm đón</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>STT</th>
                           <th>Bến</th>
                           <th>Điểm đón</th>
                        </tr>
                     </tfoot>
                     <tbody>
                     <?php $i=0 ?>
                        @foreach($pick as $item)
                        <?php $i++ ?>
                        <tr>
                           <td>{!!$i!!}</td>
                           <td>
                              <?php
                                 $station_id = $item["station_id"];
                                 $name="";
                                 foreach ($categories as $key => $value) {
                                  if($value->id==$station_id){
                                    $name = $value->name;
                                  }
                                 }
                                 echo $name;
                          ?>
                           </td>
                           <td>{!!$item["name"]!!}</td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $("div.alert").delay(3000).slideUp();
   
    
</script>
<script>
   $('#catek').on('change', function(e){
     console.log(e);
     var cat_id =e.target.value;
     $.get('pick_up?cat_id=' + cat_id, function(data){
       $('#pick').empty();
       $('#pick').append('<option value="">--Chọn điểm đón--</option>');
       $.each(data, function(index, subcatObj){
                 $('#pick').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>');
       });  
     });       
   }); 
   $('#catekk').on('change', function(e){
     console.log(e);
     var cat_id =e.target.value;
     $.get('pick_up?cat_id=' + cat_id, function(data){
       $('#pickk').empty();
       $('#pickk').append('<option value="">--Chọn điểm đón--</option>');
       $.each(data, function(index, subcatObj){
                 $('#pickk').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>');
       });  
     });       
   }); 
   $(function () {
   $('#timePictuyenxe').datetimepicker({
   format : 'LT',
   });
   });
   $(function () {
   $('#timePic').datetimepicker({
   format : 'LT',
   });
   });
</script> 
@endsection