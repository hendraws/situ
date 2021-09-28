<?php

namespace App\Http\Controllers;

use App\ScanIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    	if($request->ajax()) {
    		if($request->has('barcode_ctn')){    			
    			$data = ScanIn::where('barcode_ctn', $request->barcode_ctn)->first();
    			return view('backend.setting_location.table', compact('data'));
    		}

    	}

        return view('backend.setting_location.index');
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

        $lokasi = $request->validate([
			"lokasi" => 'required',
    	]);
        DB::beginTransaction();
    	try {
    		foreach ($request->scan_in_id as $key => $value) {
    			$scanIn = ScanIn::where('id',$value)->first();
    			$scanIn->update([
    				'lokasi' => $request->lokasi,
    			]);    			
    		}
    		// dd('asdfa');
    	} catch (\Exception $e) {
    		DB::rollback();
    		toastr()->error($e->getMessage(), 'Error');
    		return back();
    	}catch (\Throwable $e) {
    		DB::rollback();
    		toastr()->error($e->getMessage(), 'Error');
    		throw $e;
    	}

    	DB::commit();
    	toastr()->success('Data telah ditambahkan', 'Berhasil');
    	return back();
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
