@include('layouts.app')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center">
	
	<a class="btn btn-success mb-5" href="{{route('indexRoute')}}">Grįžti</a>
	
	<form method="post" action="{{route('storeCarRoute', ['owner' => $owner])}}">
		@csrf
		<div>
			<label>Modelis</label></br>
			<input type="text" name="model" required />
		</div>
		<div>
			<label>Markė</label></br>
			<input type="text" name="brand" required /> 
		</div>
		<div >
			<label>Numeris</label></br>
			<input type="text" name="reg_number" required /> 
		</div>
		
			<br><input type="submit" class="btn btn-primary" value="Išsaugoti automobilį" />
	</form>
</div>