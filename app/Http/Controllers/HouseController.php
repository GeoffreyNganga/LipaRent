<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;
use App\Property;
use App\HouseType;
use Auth;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $landlord= Auth::user()->landlord;
        $houses = House::all();
        //where('property_id', 3);
        //$houses=$landlord->property->house;
        $housetypes=HouseType::all();
        
        $properties= $landlord->property;   
        return view('house.index', [
            'housetypes' => $housetypes,
            'houses' => $houses,
            'properties' => $properties  
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    $house = new House;
    $house->name = $request->get('name');
    $house->property_id = $request->get('property');
    $house->house_type_id =$request->get('type');
    $house->price = $request->get('price');
    $house->save();

    return redirect()->back()->with('status', 'House Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property= Property::find($id);
        $houses=$property->house;
        $housetypes=HouseType::all();   
        return view('house.show', [
            'housetypes' => $housetypes,
            'houses' => $houses, 
            'property'=>$property 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
