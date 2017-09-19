<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $restaurants = Restaurant::all();
        return response()
        ->json(['restaurants' => $restaurants, 'status' => 'Success']);
   }

    public function store(Request $request){
        $rest = new Restaurant();
        $rest->name = $request->name;
        $rest->address = $request->address;
        $rest->description = $request->description;
        $rest->image = 'https://lorempixel.com/640/480/?80862';
        $rest->save();
        return response()->json(['status' => 'Success']);
    }

    public function show($id){
        $restaurant = Restaurant::findOrFail($id);
        if(isset($restaurant)){
            return response()->json(['restaurant' => $restaurant, 'status' => 'Success']);
        }
    }

    public function edit($id){
        $restaurant = Restaurant::find($id);
        if(isset($restaurant)){
            return response()->json(['restaurant' => $restaurant, 'status' => 'Success']);
        }
    }

    public function update(Request $request, $id){
        $rest = Restaurant::find($id);
        if(isset($rest)){
            $rest->name = $request->name;
            $rest->address = $request->address;
            $rest->description = $request->description;
            $rest->image = 'https://lorempixel.com/640/480/?80862';
            $rest->save();
            return response()->json(['status' => 'Success']);
        }   
    }

    public function destroy($id){
        $rest = Restaurant::find($id);
        if(isset($rest)){
            Restaurant::destroy($id);
            return response()->json(['status' => 'Success']);
        }
    }
}
