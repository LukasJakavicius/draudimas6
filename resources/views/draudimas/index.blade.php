<!DOCTYPE html>

@include('layouts.app')

@section('content')
	<div>
		<div class="d-flex flex-column justify-content-center align-items-center mb-5">
			@if (Auth::user()->type < 2)
				<a class="btn btn-success" href={{route('createOwnerRoute')}}>{{Lang::get('messages.Pridėti savininką')}}</a>
			@endif
			<a class="btn btn-success mt-2" href={{route('indexCarRoute')}}>{{Lang::get('messages.Automobilių sąrašas')}}</a>
		</div>
		
		<table class="table">
		
			<tr>
				<td>ID</td>
				<td>{{Lang::get('messages.Vardas')}}</td>
				<td>{{Lang::get('messages.Pavardė')}}</td>
				<td>{{Lang::get('messages.Tel. nr.')}}</td>
				<td>{{Lang::get('messages.El. paštas')}}</td>
				<td>{{Lang::get('messages.Adresas')}}</td>
				<td>{{Lang::get('messages.Automobiliai')}}</td>
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
					@if (Auth::user()->type < 2)
						<a href="{{route('createCarRoute', ['owner' => $owner])}}">{{Lang::get('messages.Pridėti naują automobilį')}}</a>
					@endif
					</td>

					@if (Auth::user()->type < 2)
						<td><a class="btn btn-warning" href="{{route('editOwnerRoute', ['owner' => $owner])}}">{{Lang::get('messages.Atnaujinti informaciją')}}</a></td>
						
						
						<td>
							<form method="post" action="{{route('deleteOwnerRoute', ['owner' => $owner])}}">
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