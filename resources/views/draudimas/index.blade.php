<!DOCTYPE html>

@include('layouts.app')

@section('content')
	<div>
		<div class="d-flex flex-column justify-content-center align-items-center mb-5">
			<a class="btn btn-success" href={{route('createOwnerRoute')}}>Prideti savininką</a>
		</div>
		
		<table class="table">
		
			<tr>
				<td>ID</td>
				<td>Vardas</td>
				<td>Pavardė</td>
				<td>Tel. nr.</td>
				<td>El. paštas</td>
				<td>Adresas</td>
			</tr>
			@foreach ($owners as $owner)
				<tr>
					<td>{{$owner->id}}</td>
					<td>{{$owner->name}}</td>
					<td>{{$owner->surname}}</td>
					<td>{{$owner->phone}}</td>
					<td>{{$owner->email}}</td>
					<td>{{$owner->address}}</td>
					
					<td><a class="btn btn-warning" href="{{route('editOwnerRoute', ['owner' => $owner])}}">Atnaujinti informaciją</a></td>
					
					<td>
						<form method="post" action="{{route('deleteOwnerRoute', ['owner' => $owner])}}">
							@csrf
							@method('delete')
							<input class="btn btn-danger" type="submit" value="Ištrinti" />
						</form>
					</td>

					
				</tr>
			@endforeach
			
		</table>
	
	</div>