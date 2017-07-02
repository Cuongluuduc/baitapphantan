@extends('guest.master')
@section('ndc')
                
               <div class="panel panel-primary" style="margin-top: 5px;">
               <div class="panel panel-heading"> Thông tin đặt vé</div>
               @if(Session::has('xacnhan_message'))
                <div class="alert alert-success">
                {!! Session::get('xacnhan_message')!!}
                </div>
                @elseif(Session::has('vote_message'))
                <div class="alert alert-success">
                {!! Session::get('vote_message')!!}
                </div>
                @elseif(Session::has('kxacnhan_message'))
                <div class="alert alert-danger">
                  {!! Session::get('kxacnhan_message')!!}
                </div>
                @elseif(Session::has('kvote_message'))
                <div class="alert alert-danger">
                  {!! Session::get('kvote_message')!!}
                </div>
                @elseif(Session::has('chuaxacnhan_message'))
                <div class="alert alert-info">
                  {!! Session::get('chuaxacnhan_message')!!}
                </div>
               @endif
                 <div class="panel-body">
                 <?php 
                 $user_id = Auth::user()->id;
                 $arrayguest = array();
                 foreach ($guest as $key => $value) {
                  if($value->user_id==$user_id){
                    $arrayguest[] = $value->tickit_id;
                  } 
                 }
                 $arraytickit = array();
                 foreach ($tickit as $key => $val) {
                  for ($i=0; $i <count($arrayguest) ; $i++) { 
                    if($val->id==$arrayguest[$i]){
                      $arraytickit[] = $val;
                    }
                  }
                  

                 }
                 
                 ?>
                 <p>Hello: {!!Auth::user()->name!!}</p>
                   <table  class="table table-bordered" id="ttkh" style="font-size: 13px">
                            <thead>
                               <tr>
                                  <th>STT</th>
                                  <th>Phone</th>
                                  <th>Số lượng</th>
                                  <th>Điểm đón</th>
                                  <th>Ngày đi</th>
                                  <th>Thời gian</th>
                                  <th>Tuyến</th>
                                  <th>Vote</th>
                               </tr>
                            </thead>
                            <tfoot>
                               <tr>
                                  <th>STT</th>
                                  <th>Phone</th>
                                  <th>Số lượng</th>
                                  <th>Điểm đón</th>
                                  <th>Ngày đi</th>
                                  <th>Thời gian</th>
                                  <th>Tuyến</th>
                                  <th>Vote</th>
                               </tr>
                            </tfoot>
                            <tbody>   
                               <?php $t=0 ?>
                               @foreach($arraytickit as $k)
                               <?php $t++ ?>
                               <tr>
                                  <td>{!!$t!!}</td>
                                  <td>
                                  <?php
                                   $tickit_id = $k->id;
                                   $phone = "";
                                   foreach ($guest as $key => $v) {
                                       if($v->tickit_id==$tickit_id){
                                        $phone = $v->phone;
                                       }
                                     }  
                                     echo $phone;
                                   ?>         
                                  </td>
                                  <td>
                                    <?php
                                   $tickit_id = $k->id;
                                   $phone = "";
                                   foreach ($guest as $key => $v) {
                                       if($v->tickit_id==$tickit_id){
                                        $phone = $v->number;
                                       }
                                     }  
                                     echo $phone;
                                   ?>          
                                                             
                                  </td>
                                  <td>
                                    <?php
                                  $tickit_id = $k->id;
                                   $guest_id = "";
                                   $point_id = "";
                                   foreach ($guest as $key => $v) {
                                       if($v->tickit_id==$tickit_id){
                                        $guest_id = $v->pickupcar_id;
                                       }
                                     } 
                                     foreach ($point as $key => $value) {
                                        if($value->id==$guest_id){
                                          $point_id = $value->name;
                                        }
                                      } 
                                     echo $point_id;
                                  ?>
                                  </td>
                                  <td>
                                  <?php
                                  $day = $k->date;
                                  echo date('d-m-Y',strtotime($day));
                                  ?>
                                  </td>
                                  <td>
                                     <?php
                                  $tg = "";
                                  $tic_id = $k->routercar_id;
                                  foreach ($roucar as $key => $value) {
                                    if($value->id==$tic_id){
                                      $tg = $value->time; 
                                    }
                                  }
                                  echo $tg;
                                  ?> 
                                  </td>
                                  <td>
                                   <?php
                                  $tg = "";
                                  $name = "";
                                  $tic_id = $k->routercar_id;
                                  foreach ($roucar as $key => $value) {
                                    if($value->id==$tic_id){
                                      $tg = $value->router_id; 
                                    }
                                  }
                                  foreach ($rou as $key => $value) {
                                    if($value->id==$tg){
                                         $name = $value->name;
                                    }
                                  }
                                  echo $name;
                                  ?> </td>
                                  <td> 
                                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#{{$k->id}}">
                                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span></button>
                                  <!-- modal -->
                                  <div class="modal fade" id="{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                     <form action="vote" method="POST" role="form">
                                      <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                                      <input type="hidden" name="chuyendi" value="{!!$k->id!!}"/>
                                      <input type="hidden" name="user_id" value="{!!Auth::user()->id!!}"/>
                                      
                                       <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Đánh giá lái xe</h4>
                                             </div>
                                             <div class="modal-body">
                                              <p><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Đánh giá lái xe đón: 
                                         <div class="stars">
                                          
                                            <input class="star star-5{{$k->id}}" id="star-5{{$k->id}}" type="radio" name="star" value="10" />
                                            <label class="star star-5{{$k->id}}" for="star-5{{$k->id}}"></label>
                                            <input class="star star-4{{$k->id}}" id="star-4{{$k->id}}" type="radio" name="star" value="8" />
                                            <label class="star star-4{{$k->id}}" for="star-4{{$k->id}}"></label>
                                            <input class="star star-3{{$k->id}}" id="star-3{{$k->id}}" type="radio" name="star" value="6" />
                                            <label class="star star-3{{$k->id}}" for="star-3{{$k->id}}"></label>
                                            <input class="star star-2{{$k->id}}" id="star-2{{$k->id}}" type="radio" name="star" value="4" />
                                            <label class="star star-2{{$k->id}}" for="star-2"></label>
                                            <input class="star star-1{{$k->id}}" id="star-1{{$k->id}}" type="radio" name="star" checked="checked" value="2" />
                                            <label class="star star-1{{$k->id}}" for="star-1{{$k->id}}"></label>
                                          
                                        </div>
                                         </p>
                                         <p><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Đánh giá lái xe khách: 
                                        <div class="stars2">
                                          
                                            <input class="star star5{{$k->id}}" id="star5{{$k->id}}" type="radio" name="star2" value="10" />
                                            <label class="star star5{{$k->id}}" for="star5{{$k->id}}"></label>
                                            <input class="star star4{{$k->id}}" id="star4{{$k->id}}" type="radio" name="star2" value="8" />
                                            <label class="star star4{{$k->id}}" for="star4{{$k->id}}"></label>
                                            <input class="star star3{{$k->id}}" id="star3{{$k->id}}" type="radio" name="star2" value="6" />
                                            <label class="star star3{{$k->id}}" for="star3{{$k->id}}"></label>
                                            <input class="star star2{{$k->id}}" id="star2{{$k->id}}" type="radio" name="star2" value="4" />
                                            <label class="star star2{{$k->id}}" for="star2{{$k->id}}"></label>
                                            <input class="star star1{{$k->id}}" id="star1{{$k->id}}" type="radio" name="star2" checked="checked" value="2" />
                                            <label class="star star1{{$k->id}}" for="star1{{$k->id}}"></label>
                                          </div>
                                        
                                         </p>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-primary">Đánh giá</button>
                                             </div>
                                          </div>
                                       </div>
                                       </form>
                                    </div>
                                  </td>
                               </tr>
                             
                            </tbody>
                     @endforeach

                         </table>  
                 </div>
               </div>
               
               
               <a href="{!! url('logout') !!}"><button type="button" class="btn btn-primary">Log out</button></a>
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#{{$k->id}}{{'mk'}}">
               Đổi mật khẩu</button>
                                  <!-- modal -->
                                  <div class="modal fade" id="{{$k->id}}{{'mk'}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                     <form action="guest_doimatkhau" method="POST" role="form">
                                      <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
                                      <input type="hidden" name="email" value="{!!Auth::user()->email!!}"/>
                                      <input type="hidden" name="user_id" value="{!!Auth::user()->id!!}"/>
                                      <input type="hidden" name="level" value="{!!Auth::user()->level!!}"/>
                                       <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Đổi mật khẩu</h4>
                                             </div>
                                             <div class="modal-body">
                                              <div class="form-group">
                                              <label for="">Mật khẩu cũ:</label>
                                              <input type="password" name="pold" class="form-control" id="" placeholder="Input your phone" required="required">
                                              <label for="">Mật khẩu mới:</label>
                                              <input type="password" name="pnew1" class="form-control" id="" placeholder="Input your password" required="required">
                                              <label for="">Xác nhận mật khẩu:</label>
                                              <input type="password" name="pnew2" class="form-control" id="" placeholder="Input your password" required="required">
                                            </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                                             </div>
                                          </div>
                                       </div>
                                       </form>
                                    </div>
@endsection
