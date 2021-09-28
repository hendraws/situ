<?php

namespace App\Http\Controllers;

use App\ScanIn;
use Illuminate\Http\Request;

class ScanInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('backend.scan_in.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ScanIn  $scanIn
     * @return \Illuminate\Http\Response
     */
    public function show(ScanIn $scanIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ScanIn  $scanIn
     * @return \Illuminate\Http\Response
     */
    public function edit(ScanIn $scanIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ScanIn  $scanIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScanIn $scanIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ScanIn  $scanIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScanIn $scanIn)
    {
        //
    }
}
