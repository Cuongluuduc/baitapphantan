@if(count($errors)>0)
<div class="alert alert-info">
	<ul>
		@foreach ($errors->all() as $errors)
		<li style=""> {{$errors}}</li>
		@endforeach
	</ul>
</div>
@endif