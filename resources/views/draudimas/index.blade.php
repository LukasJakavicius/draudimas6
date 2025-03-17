<!DOCTYPE html>

@include('layouts.app')

@section('content')
	<div>
	
		<a href={{route('createOwnerRoute')}}>Prideti savininką</a>
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
					
					<td><a href="{{route('editOwnerRoute', ['owner' => $owner])}}">Atnaujinti informaciją</a></td>
					
					<td>
						<form method="post" action="{{route('deleteOwnerRoute', ['owner' => $owner])}}">
							@csrf
							@method('delete')
							<input type="submit" value="Ištrinti" />
						</form>
					</td>

					
				</tr>
			@endforeach
			
		</table>
	
	</div>
<!--<html lang="en">
<head>
	<meta charset="UTF-8";
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<title>Draudimas</title>

	
</head>

<body>

<h1>aaaaaaaaaa</h1>

</body>-->