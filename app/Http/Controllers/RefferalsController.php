<?php

namespace App\Http\Controllers;

use App\Refferals;
use Illuminate\Http\Request;

class RefferalsController extends Controller
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
            'patient_id' => 'required',
            'patient_name' => 'required',
            'department_to' => 'required',
            'department_from' => 'required',
        ]);
        $patient_id = $request->input('patient_id');
        $patient_name = $request->input('patient_name');
        $department_to = $request->input('department_to');
        $department_from = $request->input('department_from');
        if($department_from == "doctor" && $department_to == ("nursing"|| "reception"))
        {
            return redirect()->back()->with("You are Not Allowed");
        }
        else {
            $check = new Refferals();
            //On left field name in DB and on right field name in Form/view
            $check->patient_id = $patient_id;
            $check->patient_name = $patient_name;
            $check->department_to = $department_to;
            $check->department_from = $department_from;
            $check->save();
            return response()->json('successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Refferals  $refferals
     * @return \Illuminate\Http\Response
     */
    public function show(Refferals $refferals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Refferals  $refferals
     * @return \Illuminate\Http\Response
     */
    public function edit(Refferals $refferals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Refferals  $refferals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refferals $refferals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Refferals  $refferals
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refferals $refferals)
    {
        //
    }
}
