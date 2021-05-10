@if(Auth::check())
	@if(Auth::user()->hasRole('user'))
	{{ 'im user'}}
	@endif

	@if(Auth::user()->hasRole('staff'))
	@endif
@else
@endif