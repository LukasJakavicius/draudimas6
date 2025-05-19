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
				<td>{{Lang::get('messages.Numeris')}}</td>
				<td>{{Lang::get('messages.Markė')}}</td>
				<td>{{Lang::get('messages.Modelis')}}</td>
				
				<td>{{Lang::get('messages.Savininko ID')}}</td>
			</tr>
			@foreach ($cars as $car)
				<tr>
					<td>{{$car->id}}</td>
					<td>{{$car->reg_number}}</td>
					<td>{{$car->brand}}</td>
					<td>{{$car->model}}</td>
					<td>{{$car->owner_id}}</td>
					

					@if (Auth::user()->type < 2)
					<td><a class="btn btn-warning" href="{{route('editCarRoute', ['car' => $car])}}">{{Lang::get('messages.Atnaujinti informaciją')}}</a></td>
					
					
					<td>
						<form method="post" action="{{route('deleteCarRoute', ['car' => $car])}}">
							@csrf
							@method('delete')
							<input class="btn btn-danger" type="submit" value="{{Lang::get('messages.Ištrinti')}}" />
						</form>
					</td>
					@endif
					
				</tr>
			@endforeach
			
		</table>
	
	</div>	