<?php

namespace App\Http\Controllers;

use App\Models\detailsModel;
use Illuminate\Http\Request;

class detailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AllDetails = detailsModel::all();
        return view('showAllDetails')->with('AllDetails',$AllDetails);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $details = detailsModel::find($id);

        if($request->PaidTo !== ''){
            $details->PaidTo = $request->PaidTo;
            $details->PaidAt = $request->PaidAt;
            $details->save();
        }else{
            $details->PaidTo = '';
            $details->PaidAt = '';
            $details->save();
        }
        return redirect('details');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
