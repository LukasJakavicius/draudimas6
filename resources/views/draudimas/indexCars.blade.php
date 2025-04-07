<!DOCTYPE html>

@include('layouts.app')

@section('content')
	<div>
		<div class="d-flex flex-column justify-content-center align-items-center mb-5">
			<a class="btn btn-success mb-5" href="{{route('indexRoute')}}">Savininkai</a>
		</div>
		
		<table class="table">
		
			<tr>
				<td>ID</td>
				<td>Numeris</td>
				<td>Markė</td>
				<td>Numeris</td>
				<td>Savininko ID</td>
			</tr>
			@foreach ($cars as $car)
				<tr>
					<td>{{$car->id}}</td>
					<td>{{$car->reg_number}}</td>
					<td>{{$car->brand}}</td>
					<td>{{$car->model}}</td>
					<td>{{$car->owner_id}}</td>
					

					<td><a class="btn btn-warning" href="{{route('editCarRoute', ['car' => $car])}}">Atnaujinti informaciją</a></td>
					
					
					<td>
						<form method="post" action="{{route('deleteCarRoute', ['car' => $car])}}">
							@csrf
							@method('delete')
							<input class="btn btn-danger" type="submit" value="Ištrinti" />
						</form>
					</td>

					
				</tr>
			@endforeach
			
		</table>
	
	</div>	