<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\states;
use App\countries;

class DataController extends Controller
{
    public function getCountries(){
        $countries = countries::pluck('name','id');
        return view('dropdown',compact('countries'));
    }
    public function getStates($id){
        $states = states::where("countries_id",$id)->pluck("name","id");
        return json_encode($states);
    }
    public function save(Request $request){
        $states = new states();
        $states->countries_id = $request->get('country');
        $states->name = $request->get('state');
        // $states->save();
        dd($states);
        // return redirect('dropdownlist');
    }
}
