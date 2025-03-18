@include('layouts.app')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center">
	
	<a class="btn btn-success mb-5" href="{{route('indexRoute')}}">Grįžti</a>
	
	<form method="post" action="{{route('storeOwnerRoute')}}">
		@csrf
		<div>
			<label>Vardas</label></br>
			<input type="text" name="name" required />
		</div>
		<div>
			<label>Pavardė</label></br>
			<input type="text" name="surname" required /> 
		</div>
		<div >
			<label>El. paštas</label></br>
			<input type="text" name="email" required /> 
		</div>
		<div>
			<label>Tel. numeris</label></br>
			<input type="text" name="phone" required />
		</div>
		<div>
			<label>Adresas</label></br>
			<input type="text" name="address" required /> 
		</div>
	
			<br><input type="submit" class="btn btn-primary" value="Išsaugoti savininką" />
	</form>
</div>