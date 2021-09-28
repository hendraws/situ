<?php

namespace App\Http\Controllers;

use App\Master;
use App\MasterItem;
use App\ScanIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ScanInController extends Controller
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
    			$data = MasterItem::where('barcode_ctn', $request->barcode_ctn)->first();
    			return view('backend.scan_in.table', compact('data'));
    		}

    		$data = ScanIn::with('Master')->get();
    		return Datatables::of($data)
    		->addIndexColumn()
    		->addColumn('po_no', function ($row) {
    			$po_no = optional($row->Master)->po_no;
    			return $po_no;
    		})
    		->addColumn('article', function ($row) {
    			$article = optional($row->Master)->article;
    			return $article;
    		})        		
    		->addColumn('barcode_ctn', function ($row) {
    			$barcode_ctn = $row->barcode_ctn;
    			return $barcode_ctn;
    		})    
    		->addColumn('no_ctn', function ($row) {
    			$no_ctn = $row->no_ctn;
    			return $no_ctn;
    		})     			
    		->addColumn('qty', function ($row) {
    			$qty = $row->pairs;
    			return $qty;
    		})     
    		// ->rawColumns(['action'])
    		->make(true);
    	}

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
    	DB::beginTransaction();
    	try {
    		foreach ($request->master_item_id as $key => $value) {
    			$masterItem = MasterItem::where('id',$value)->first();
    			ScanIn::create([
    				'master_id' => $masterItem->master_id,
    				'barcode_ctn'=> $masterItem->barcode_ctn,
    				'no_ctn' => $masterItem->no_ctn,
    				'pairs'=> $masterItem->pairs,
    				'size'=> $masterItem->size,
    				'keterangan' => 'warehouse',
    				'created_by' => auth()->user()->id,
    			]);

    			$master = Master::where('id', $masterItem->master_id)->first();
    			$master->update([
    				'total_qty' => $master->total_qty - $masterItem->pairs
    			]);

    			$masterItem->delete();    			
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
     * @param  \App\ScanIn  $scanIn
     * @return \Illuminate\Http\Response
     */
    public function show(ScanIn $scanIn)
    {

    	DB::beginTransaction();
    	try {
    		foreach ($request->master_item_id as $key => $value) {
    			$masterItem = MasterItem::where('id',$value)->first();
    			dd($masterItem);
    			
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
