<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use App\Customer;
use App\Dvd;
use App\Http\Resources\HistoryCollection;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

        $total = History::
        join('customers', 'histories.customer_id', '=', 'customers.national_id')->
        join('dvds', 'histories.dvd_id', '=', 'dvds.id')->
        get();

       
        return new HistoryCollection($total);
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
            'national_id' => 'required',
            'dvd_title' => 'required',
            'borrowing_date' => 'required',
            'deadline_date' => 'required',
            
           
        ]);
        $query=$request->input('dvd_title');
    
        $dvd= Dvd::where('catalog','like','%'.$query.'%')->first();
        
        $history = new History();
        //On left field name in DB and on right field name in Form/view
        //$check->patient_id= $request->input('patient_id');
        $history->customer_id = $request->input('national_id');
        $history->dvd_id = $dvd->id;
        $history->borrowing_date= $request->input('borrowing_date');
        $history->deadline_date = $request->input('deadline_date');
        $history->save();

      return response()->json('successfully added');
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
 
       $item = History::find($id);
       $item->return_date=date("Y-m-d h:i:s a", time());
       $item->save();

       return redirect()->back()->with('success', 'History updated!');
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
        $req=$request->all();
        dd($req);
        $history = App\History::where('id', $id)->first();

        $history->return_date=date("Y-m-d h:i:s a", time());

        $history->refresh();

       return $history->return_date; // "FR 900"
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
