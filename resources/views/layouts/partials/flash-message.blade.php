@if (Session::has('message-error'))
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<div>{!! session('message-error') !!}</div>
</div>
@endif

@if (Session::has('message-success'))
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<div>{!! session('message-success') !!}</div>
</div>
@endif