
@include('layouts.app')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center">
	
	<a class="btn btn-success mb-5" href="{{route('indexCarRoute')}}">{{Lang::get('messages.Grįžti')}}</a>
	
	<form method="post" action="{{route	('editCarPost', ['car' => $car])}}">
		@csrf
		@method('put')
		<div>
			<label>{{Lang::get('messages.Numeris')}}</label></br>
			<input type="text" name="reg_number" value="{{$car->reg_number}}" required />
		</div>
		<div>
			<label>{{Lang::get('messages.Markė')}}</label></br>
			<input type="text" name="brand" value="{{$car->brand}}" required /> 
		</div>
		<div>
			<label>{{Lang::get('messages.Modelis')}}</label></br>
			<input type="text" name="model" value="{{$car->model}}" required /> 
		</div>
		<div>
			<label>{{Lang::get('messages.Savininko ID')}}</label></br>
			<input type="text" name="owner_id" value="{{$car->owner_id}}" required />
		</div>

			<br><input class="btn btn-primary" type="submit" value="{{Lang::get('messages.Išsaugoti automobilį')}}" />
	</form>
	
	<form class="mt-5 mb-5" method="post" enctype="multipart/form-data" action="{{route('addCarImage', ['car' => $car])}}">
	@csrf
		<div>
			<label>{{Lang::get('messages.Automobilio nuotraukos')}}</label></br>
			<input type="file" name="photo" />
		</div>
	
			<br><input class="btn btn-primary" type="submit" value="{{Lang::get('messages.Įkelti nuotrauką')}}" />
	</form
	
	<table class="table">
		@foreach ($photo as $photos)
			<tr>
			@if ($car->id === $photos->car_id)
				<td><img src="{{asset($photos->image)}}"></td>
				<td>{{Lang::get('messages.Ištrinti')}}</td>
			@endif
			</tr>
		@endforeach
	</table>
</div>