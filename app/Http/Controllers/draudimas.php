<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Car;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;


class Draudimas extends Controller
{
    public function index(){
		$owners = owner::all();
		$cars = car::all();
		return view('draudimas.index', ['owners' => $owners, 'cars' => $cars]);
	}
    public function indexCars(){
		$owners = owner::all();
		$cars = car::all();
		return view('draudimas.indexCars', ['owners' => $owners, 'cars' => $cars]);
	}
	
	public function switchLang($lang, Request $request){
        $request->session()->put('lang', $lang);
		//dd($request);
		return redirect()->back();
    }
	
	public function createOwner(){
		return view('draudimas.draudimasCreate');
	}
	public function storeOwner(Request $request){
		$data = $request->validate([
			Auth::user(),
			"name"=>"required",
			"surname"=>"required",
			"email"=>"required|email:rfc",
			"phone"=>"required|numeric",
			"address"=>"required",
		]);
		
		//dd($request);
		$newOwner = Owner::create($data);
		return redirect(route("indexRoute"));
	}
	public function updateOwner(owner $owner){
		return view('draudimas.draudimasUpdate', ['owner' => $owner]);
	}
	public function updateOwnerPost(owner $owner,Request $request){
		$data = $request->validate([
			Auth::user(),
			"name"=>"required",
			"surname"=>"required",
			"email"=>"required|email:rfc",
			"phone"=>"required|numeric",
			"address"=>"required",
		]);
		
		//dd($request);
		$owner->update($data);
		return redirect(route("indexRoute"));
	}
	public function deleteOwner(owner $owner){
		$owner->delete();
		return redirect(route("indexRoute"));		
	}

		public function createCar(owner $owner){
		return view('draudimas.carCreate', ['owner' => $owner]);
	}
	public function storeCar(Request $request, owner $owner){
		$data = $request->validate([
			Auth::user(),
			"model"=>"required",
			"brand"=>"required",
			"reg_number"=>"required|integer"
		]);
		$data['owner_id'] = $owner->id;
		
		//dd($request);
		$newCar = car::create($data);
		return redirect(route("indexRoute"));
	}
	public function deleteCar(car $car){
		$car->delete();
		return redirect(route("indexCarRoute"));		
	}
	public function updateCar(car $car){
		$photo = photo::all();
		return view('draudimas.carUpdate', ['car' => $car, 'photo' => $photo]);
	}
	public function updateCarPost(car $car,Request $request){
		$data = $request->validate([
			Auth::user(),
			"model"=>"required",
			"brand"=>"required",
			"reg_number"=>"required|integer",
			"owner_id"=>"required|integer",
		]);
	    //dd($request);
		$owner = owner::all();
		
		if(owner::where('id', $data['owner_id'])->exists()){
			$car->update($data);
			return redirect(route("indexCarRoute"));
		}
		else 
			return view('draudimas.carUpdate', ['car' => $car]);
	
	}

public function postImg(Request $request, car $car)
{
    $request->validate([
        "photo" => "required|image|mimes:jpeg,png,jpg,gif"
    ]);

    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $imagePath = $request->file('photo')->storeAs('public/photos', $request->file('photo')->hashName());

        $newPhoto = photo::create([
            'image' => 'photos/' . $request->file('photo')->hashName(),
            'car_id' => $car->id
        ]);

        $newPhoto->save();
    } else {
        return redirect(route('indexCarRoute'));
    }

    return redirect(route('indexCarRoute'));
}

public function deleteImg(car $car, photo $photo)
{
    $photo->delete();  
    return redirect(route('indexCarRoute'));
}
}
?>