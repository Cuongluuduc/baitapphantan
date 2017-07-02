@extends('admin.ad')
@section('ndc')
<div class="panel panel-primary">
<div class="panel panel-heading"> Thêm vé</div>
   <div class="panel-body">
      <form action="" method="POST" class="navbar-form pull-left" enctype="multipart/form-data">
   <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
   <table class="table table-hover">
      <thead>
         <tr>
            <th></th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td><img src="img/top_bg.png"></td>
            <td><input type="file" name="file">
   <button style="margin-top: 10px;" type="submit" class="btn btn-primary"> Thêm </button></td>
         </tr>

      </tbody>
   </table>
   </div>
</div>

   
	
@endsection