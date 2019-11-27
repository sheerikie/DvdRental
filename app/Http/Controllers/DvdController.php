<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dvd;
use App\Http\Resources\DvdCollection;

class DvdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dvd=Dvd::all();
       
        return new DvdCollection($dvd);
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
            'name' => 'required',
            'copies' => 'required',
            'genre' => 'required',
           
        ]);
   
        $dvd = new Dvd();
        //On left field name in DB and on right field name in Form/view
        //$check->patient_id= $request->input('patient_id');
        $dvd->catalog = $request->input('name');
        $dvd->copies = $request->input('copies');
        $dvd->availability = $request->input('copies');
        $dvd->genres = $request->input('genre');
        $dvd->save();

      return response()->json('successfully added');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompleteSearch(Request $request)
    {
       
        $query = $request->get('query');
        $data = Dvd::where('catalog','like','%'.$query.'%')->get();
      
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
