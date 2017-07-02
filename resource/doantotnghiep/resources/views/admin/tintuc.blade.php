@extends('admin.ad')
@section('ndc')
<div class="form-group">
<form action="new" method="POST" role="form">
<input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
	<legend>Quản lí tin tức</legend>
     <textarea name="title" id="" class="form-control" rows="3" required="required"></textarea>
	 <textarea name="fist" id="textarea" class="form-control" rows="3" required="required"></textarea>
	

	<button type="submit" class="btn btn-primary">Thêm tin tức</button>
</form>
		
</div>
<script type="text/javascript">
	$('#textarea').summernote();
</script>
@endsection