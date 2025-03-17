@include('layouts.app')

@section('content')

	<a href="{{route('indexRoute')}}">Grįžti</a>
	<form method="post" action="{{route('storeOwnerRoute')}}">
		@csrf
		<div>
			<label>Vardas</label>
			<input type="text" name="name" required />
		</div>
		<div>
			<label>Pavardė</label>
			<input type="text" name="surname" required /> 
		</div>
		<div>
			<label>El. paštas</label>
			<input type="text" name="email" required /> 
		</div>
		<div>
			<label>Tel. numeris</label>
			<input type="text" name="phone" required />
		</div>
		<div>
			<label>Adresas</label>
			<input type="text" name="address" required /> 
		</div>
	
			<br><input type="submit" value="Išsaugoti savininką" />
	</form>
