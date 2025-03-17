<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Draudimas extends Controller
{
    public function index(){
		$owners = owner::all();
		return view('draudimas.index', ['owners' => $owners]);
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
}
?>