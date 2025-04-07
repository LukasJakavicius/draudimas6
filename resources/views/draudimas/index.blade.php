<!DOCTYPE html>

@include('layouts.app')

@section('content')
	<div>
		<div class="d-flex flex-column justify-content-center align-items-center mb-5">
			<a class="btn btn-success" href={{route('createOwnerRoute')}}>Prideti savininką</a>
			<a class="btn btn-success mt-2" href={{route('indexCarRoute')}}>Automobilių sąrašas</a>
		</div>
		
		<table class="table">
		
			<tr>
				<td>ID</td>
				<td>Vardas</td>
				<td>Pavardė</td>
				<td>Tel. nr.</td>
				<td>El. paštas</td>
				<td>Adresas</td>
				<td>Automobiliai</td>
			</tr>
			@foreach ($owners as $owner)
				<tr>
					<td>{{$owner->id}}</td>
					<td>{{$owner->name}}</td>
					<td>{{$owner->surname}}</td>
					<td>{{$owner->phone}}</td>
					<td>{{$owner->email}}</td>
					<td>{{$owner->address}}</td>
					
					<td>
					@foreach ($cars as $car)
					@if ($car->owner_id === $owner->id) 
					{{$car->reg_number}}
					{{$car->brand}}
					{{$car->model}}</br>
					@endif
					@endforeach
					<a href="{{route('createCarRoute', ['owner' => $owner])}}">Pridėti naują automobilį</a>
					</td>

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