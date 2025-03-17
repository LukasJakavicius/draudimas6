
@include('layouts.app')

@section('content')

	<a href="{{route('indexRoute')}}">Grįžti</a>
	<form method="post" action="{{route('editOwnerPost', ['owner' => $owner])}}">
		@csrf
		@method('put')
		<div>
			<label>Vardas</label>
			<input type="text" name="name" value="{{$owner->name}}" required />
		</div>
		<div>
			<label>Pavardė</label>
			<input type="text" name="surname" value="{{$owner->surname}}" required /> 
		</div>
		<div>
			<label>El. paštas</label>
			<input type="text" name="email" value="{{$owner->email}}" required /> 
		</div>
		<div>
			<label>Tel. numeris</label>
			<input type="text" name="phone" value="{{$owner->phone}}" required />
		</div>
		<div>
			<label>Adresas</label>
			<input type="text" name="address" value="{{$owner->address}}" required /> 
		</div>
	
			<br><input type="submit" value="Išsaugoti savininką" />
	</form>
