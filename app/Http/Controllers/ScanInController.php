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
    			$data = MasterItem::where('barcode_ctn', $request->barcode_ctn)
    					->where('modul','master')
    					->first();
    			return view('backend.scan_in.table', compact('data'));
    		}
    		// po, art, total qty dan balance
    		$data = Master::with('masterItemsOnWarehouse')->get();

    		return Datatables::of($data)
    		->addIndexColumn()
    		->addColumn('po_no', function ($row) {
    			$po_no = $row->po_no;
    			return $po_no;
    		})
    		->addColumn('article', function ($row) {
    			$article = $row->article;
    			return $article;
    		})        		
    		->addColumn('qty', function ($row) {
    			$qty = (optional($row->masterItemsOnWarehouse)->sum('pairs') ?? 0) ;
    			return $qty;
    		})     
    		->addColumn('balance', function ($row) {
				$balance = (optional($row->masterItemsOnWarehouse)->sum('pairs') ?? 0) - ($row->total_qty ?? 0) + (optional($row->masterItemsOnContainer)->sum('pairs') ?? 0); 
				$bg = $balance == 0 ? 'bg-success' : 'bg-warning';
    			return '<div class="'. $bg .'">'.$balance.'</div>';
    		})     
    		->addColumn('action', function ($row) {
				$action =  '<a class="btn btn-sm btn-success" href="'. action('ScanInController@show', $row->id) .'">Detail</a>';
    			return $action;
    		})     
    		->rawColumns(['balance','action'])
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
    			$masterItem = MasterItem::where('id',$value)->update([
    				'modul' => 'scanin',
    				'keterangan' => 'warehouse',
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
     * @param  \App\ScanIn  $scanIn
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    	$master = Master::find($id);
		return view('backend.scan_in.show', compact('master'));

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
