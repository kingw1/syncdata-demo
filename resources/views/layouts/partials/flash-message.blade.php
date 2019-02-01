@if (session()->has('message-error'))
<div class="alert alert-danger alert-dismissable">
	<div>{!! session('message-error') !!}</div>
</div>
@endif

@if (session()->has('message-success'))
<div class="alert alert-success alert-dismissable">
	<div>{!! session('message-success') !!}</div>
</div>
@endif