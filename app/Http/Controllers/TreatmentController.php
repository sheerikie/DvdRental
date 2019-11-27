<?php

namespace App\Http\Controllers;

use App\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'patient_id' => 'required',
            'disease' => 'required',
            'symptoms' => 'required',
            'treatment' => 'required',
            'doctor' => 'required',//will fetch from Authenticated Doctor Profile
        ]);
   
        $check = new Treatment();
        //On left field name in DB and on right field name in Form/view
        $check->patient_name = $request->input('patient_name');
        $check->patient_id = $request->input('patient_id');
        $check->disease = $request->input('disease');
        $check->symptoms = $request->input('symptoms');
        $check->treatment = $request->input('treatment');
        $check->seen = $request->input('seen');
        $check->doctor = $request->input('doctor');
        $check->department = 'Treatment';
        $check->save();

      return response()->json('successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function show(Treatment $treatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function edit(Treatment $treatment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treatment $treatment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatment $treatment)
    {
        //
    }
}
