@extends('admin.ad')
@section('ndc')

<div class="panel panel-primary" style="margin-top:5px;">
<div class="panel panel-heading">Xe hệ thống</div>
  <div class="panel-body">
    <form action="{!!url('qlixe')!!}" method="POST" role="form">
    <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
      <div class="form-group">
      @if(Session::has('txe_message'))
            <div class="alert alert-success">
              {!! Session::get('txe_message')!!}
            </div>
            @elseif(Session::has('ktxe_message'))
            <div class="alert alert-danger">
              {!! Session::get('ktxe_message')!!}
            </div>
            @elseif(Session::has('kxoaxe_message'))
            <div class="alert alert-danger">
              {!! Session::get('kxoaxe_message')!!}
            </div>
            @elseif(Session::has('xoaxe_message'))
            <div class="alert alert-info">
              {!! Session::get('xoaxe_message')!!}
            </div>
            @endif
        <label for="">Tên xe</label>
        <input type="text" name="textname" class="form-control" id="" placeholder="Input field" required="required">
        <label for="">Số ghế</label>
        <input type="text" name="textsl" class="form-control" id="" placeholder="Input field" required="required">
        <label for="">Loại xe</label>
        <select name="type" id="inputType" class="form-control" required="required">
          <option>--Phân loại xe--</option>
          <option value="1"> Xe lộ trình</option>
          <option value="2"> Xe đón khách</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Thêm</button>
      <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalsuaxe">
      <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Sửa </button>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalxoaxe">
      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Xóa </button> -->
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalxemxe">
      <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Xem </button>
    </form>
     <div class="modal fade" id="myModalxemxe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Xem xe trong hệ thống</h4>
               </div>
               <div class="modal-body">
                  <table id="xemxe" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size: 13px;">
                     <thead>
                        <tr>
                           <th>STT</th>
                           <th>Tên</th>
                           <th>Số ghế</th>
                           <th>Loại xe</th>
                           <th>Trạng thái</th>
                           <th>Quản lí</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>STT</th>
                           <th>Bến</th>
                           <th>Số ghế</th>
                           <th>Loại xe</th>
                           <th>Trạng thái</th>
                           <th>Quản lí</th>
                        </tr>
                     </tfoot>
                     <tbody>
                     <?php $i=0; ?>
                        @foreach($car as $item)
                      <?php $i++ ?>  
                        <tr>
                           <td>{!!$i!!}</td>
                           <td>{!!$item["name"]!!}</td>
                           <td>{!!$item["quantity_chair"]!!}</td>
                           <td>
                           <?php
                           $type = $item->type;
                           if($type==1){
                            echo "Xe lộ trình";
                           }else{
                            echo "Xe đón khách";
                           }
                           ?>
                           </td>
                           <td>
                           <?php
                           $status = $item->status;
                           if($status==0){
                            echo "Chưa được phân công";
                           } else{
                            echo "Đã được phân công";
                           }
                           ?>
                           </td>
                           <td>
                          <button type="button" class="btn btn-success">
                          <span class="" aria-hidden="true"></span>  Sửa </button>
                          <a href=" {!! route('xoaxe',['id'=>$item["id"]]) !!}"><button type="button" class="btn btn-danger">
                          <span class="" aria-hidden="true"></span>  Xóa </button></a>
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
  </div>
</div>
<div class="panel panel-primary">
<div class="panel panel-heading"> Phân xe vào tuyến</div>
  <div class="panel-body">
    <form action="{!!url('taoxetuyen')!!}" method="POST" role="form">
    <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
      <div class="form-group">
      @if(Session::has('txet_message'))
            <div class="alert alert-success">
              {!! Session::get('txet_message')!!}
            </div>
            @elseif(Session::has('ktxet_message'))
            <div class="alert alert-danger">
              {!! Session::get('ktxet_message')!!}
            </div>
            @endif
        <label for="">Chọn tuyến xe</label>
                 <select name="tuyen" id="tuyen" class="form-control" required="required">
                  <option value="">--Chọn tuyến--</option>
                   @foreach($rou as $value)
                   <option value="{{$value->id}}">
                   <?php
                   $name = $value->name;
                   echo $name;
                   ?>
                   </option>
                    @endforeach
                   </select>
                <label for="">Chọn xe</label>
                 <select name="car" id="car" class="form-control" required="required">
                   <option value="">--Chọn xe vào tuyến--</option>
                   @foreach($car1 as $value)
                   <option>
                   <?php
                   $status = $value->status;
                   $type = $value->type;
                   if($status==0&&$type==1){
                   $name = $value->name;
                   echo $name;
                   }
                   ?>
                   </option>
                    @endforeach
                   </select>
      </div>
    
      
    
      <button type="submit" class="btn btn-primary"> Thêm </button>
    </form>
  </div>
</div>
<div class="panel panel-primary">
<div class="panel panel-heading">Phân xe vào trạm đón</div>
  <div class="panel-body">
    <form action="{!!url('xetramdon')!!}" method="POST" role="form">
    <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
      <div class="form-group">
      @if(Session::has('txed_message'))
            <div class="alert alert-success">
              {!! Session::get('txed_message')!!}
            </div>
            @elseif(Session::has('ktxed_message'))
            <div class="alert alert-danger">
              {!! Session::get('ktxed_message')!!}
            </div>
            @endif
        <label for="">Chọn bến xe</label>
                 <select name="ben" id="ben" class="form-control" required="required">
                  <option value="">--Chọn bến xe--</option>
                   @foreach($station as $value)
                   <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                   </select>
                   <label for="">Chọn xe</label>
                 <select name="card" id="card" class="form-control" required="required">
                   <option value="">--Chọn xe vào bến--</option>
                   @foreach($car2 as $value)
                   <option>
                   <?php
                   $status = $value->status;
                   $type = $value->type;
                   if($status==0&&$type==2){
                   $name = $value->name;
                   echo $name;
                   }
                   ?>
                   </option>
                    @endforeach
                   </select>
      </div>
    
      
    
      <button type="submit" class="btn btn-primary"> Thêm </button>
    </form>
  </div>
</div>


<script>
	$("div.alert").delay(3000).slideUp();
</script>
@endsection