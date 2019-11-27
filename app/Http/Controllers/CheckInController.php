<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Treatment;
use DB;
use Illuminate\Http\Request;
use App\Http\Resources\CheckInCollection;

class CheckInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient=CheckIn::all();
        $treatment = Treatment::all();

        $total = $patient->merge($treatment);
        return new CheckInCollection($total);
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
            $this->validate($request, [
                'patient_name' => 'required',
                'entry_time' => 'required',
                'exit_time' => 'required'
            ]);
       
            $check = new CheckIn();
            //On left field name in DB and on right field name in Form/view
            //$check->patient_id= $request->input('patient_id');
            $check->patient_name = $request->input('patient_name');
            $check->entry_time = $request->input('entry_time');
            $check->exit_time = $request->input('exit_time');
            $check->save();
    
          return response()->json('successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function show(CheckIn $checkIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckIn $checkIn)
    {
        $check_in = CheckIn::find($checkIn);
        return response()->json($check_in);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckIn $checkIn)
    {
        $check_in = CheckIn::find($checkIn);

        $check_in->update($request->all());
  
        return response()->json('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckIn $checkIn)
    {
        $check_in = CheckIn::find($checkIn);

        $check_in->delete();

      return response()->json('successfully deleted');
    }
}
