@include('layouts.app')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center">
	
	<a class="btn btn-success mb-5" href="{{route('indexRoute')}}">{{Lang::get('messages.Grįžti')}}</a>
	
	<form method="post" action="{{route('storeOwnerRoute')}}">
		@csrf
		<div>
			<label>{{Lang::get('messages.Vardas')}}</label></br>
			<input type="text" name="name" required />
		</div>
		<div>
			<label>{{Lang::get('messages.Pavardė')}}</label></br>
			<input type="text" name="surname" required /> 
		</div>
		<div >
			<label>{{Lang::get('messages.El. paštas')}}</label></br>
			<input type="text" name="email" required /> 
		</div>
		<div>
			<label>{{Lang::get('messages.Tel. nr.')}}</label></br>
			<input type="text" name="phone" required />
		</div>
		<div>
			<label>{{Lang::get('messages.Adresas')}}</label></br>
			<input type="text" name="address" required /> 
		</div>
	
			<br><input type="submit" class="btn btn-primary" value="{{Lang::get('messages.Išsaugoti savininką')}}" />
	</form>
</div>