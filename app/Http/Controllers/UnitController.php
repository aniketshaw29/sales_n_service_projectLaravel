<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::get();
        return $units;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUnitById($id)
    {
        $units = Unit::findOrFail($id);
        return $units;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveUnits(Request $request)
    {
        $rules = array(
            'unitName' => 'required|unique:units,unit_name|max:20',
            'formalName' => 'required|unique:units,formal_name|max:20'
        );
        $messages = array(
            'unitName.required' => 'Please enter the unit name',
            'formalName.required' => 'Please enter the units formal name'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return $validator->$messages;
        }
        $unit = new Unit();
        $unit->unit_name = $request->unitName;
        $unit->formal_name = $request->formalName;
        $unit->save();
        return $unit;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function updateUnit(Request $request)
    {
        $units = Unit::findOrFail( $request->input('id'));
        $units->unit_name=$request->input('unitName');
        $units->formal_name=$request->input('formalName');
        $units->save();
        return $units;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function deleteUnitById($id)
    {
        $temp = Product::whereUnitId($id)->count();
        if($temp > 0){
            return "The unit is in use, so you can't delete it";
        }
        $units = Unit::findOrFail($id);
        $units->delete();
        return "Deleted";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
