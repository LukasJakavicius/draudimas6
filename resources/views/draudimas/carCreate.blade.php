@include('layouts.app')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center">
	
	<a class="btn btn-success mb-5" href="{{route('indexRoute')}}">{{Lang::get('messages.Grįžti')}}</a>
	
	<form method="post" action="{{route('storeCarRoute', ['owner' => $owner])}}">
		@csrf
		<div>
			<label>{{Lang::get('messages.Modelis')}}</label></br>
			<input type="text" name="model" required />
		</div>
		<div>
			<label>{{Lang::get('messages.Markė')}}</label></br>
			<input type="text" name="brand" required /> 
		</div>
		<div >
			<label>{{Lang::get('messages.Numeris')}}</label></br>
			<input type="text" name="reg_number" required /> 
		</div>
		
			<br><input type="submit" class="btn btn-primary" value="{{Lang::get('messages.Išsaugoti automobilį')}}" />
	</form>
</div>