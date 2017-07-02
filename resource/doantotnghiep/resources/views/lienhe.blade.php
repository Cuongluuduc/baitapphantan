@extends('trangchinh')
@section('ndc')
 <div  class="panel panel-primary">
               <div class="panel-heading"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Giới thiệu Công ty vận chuyển hành khách LIMOUSIN</div>
                 <div class="panel-body">
<table class="table table-hover">
	<thead>
		<tr>
			<!-- <th>Công ty vận chuyển hành khách LIMOUSIN</th> -->
			
		</tr>
	</thead>
	<tbody>
	<tr>
			<td>Địa chỉ :</td>
			<td>Số 02 Ngõ 59 Phố Hoàng Cầu, Quận Đống Đa, Hà Nội. (Đối diện siêu thị Hoàng Cầu)</td>
		</tr>
		<tr>
			<td>Email :</td>
			<td>limousin@gmail.com</td>
		</tr>
		<tr>
			<td>Phone :</td>
			<td>(04)29001096</td>
		</tr>
		<tr>
			<td>Hotline :</td>
			<td>19001096</td>
		</tr>
		<tr>
			<td>Website:</td>
			<td>www.vexelimousin.com</td>
		</tr>
	</tbody>
</table>
                  </div>
                  </div>
	 <div  class="panel panel-primary">
	               <div class="panel-heading"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Bản đồ</div>
	                 <div class="panel-body">
	<div id="map" style="height: 400px;width: 100%; margin-top: 5px; float:center; "></div>
	<script type="text/javascript" src="bootstrap/bootstrap/js/jquery-1.12.3.min.js"></script>
	<script type="text/javascript" src="bootstrap/bootstrap/js/jquery-2.2.4.min.js"></script>
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcO21U5xSELaySwxzVCn_xYg3Z0tPKzQM"
	    defer></script>
	<script type="text/javascript" src="bootstrap/bootstrap/js/gmap.js"></script>
                  </div>
                  </div>
@endsection