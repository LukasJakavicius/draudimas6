
@include('layouts.app')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center">
	
	<a class="btn btn-success mb-5" href="{{route('indexRoute')}}">Grįžti</a>
	
	<form method="post" action="{{route('editOwnerPost', ['owner' => $owner])}}">
		@csrf
		@method('put')
		<div>
			<label>Vardas</label></br>
			<input type="text" name="name" value="{{$owner->name}}" required />
		</div>
		<div>
			<label>Pavardė</label></br>
			<input type="text" name="surname" value="{{$owner->surname}}" required /> 
		</div>
		<div>
			<label>El. paštas</label></br>
			<input type="text" name="email" value="{{$owner->email}}" required /> 
		</div>
		<div>
			<label>Tel. numeris</label></br>
			<input type="text" name="phone" value="{{$owner->phone}}" required />
		</div>
		<div>
			<label>Adresas</label></br>
			<input type="text" name="address" value="{{$owner->address}}" required /> 
		</div>
	
			<br><input class="btn btn-primary" type="submit" value="Išsaugoti savininką" />
	</form>
</div>