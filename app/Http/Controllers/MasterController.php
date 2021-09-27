<?php

namespace App\Http\Controllers;

use App\Master;
use App\MasterItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	if ($request->ajax()) {
    		$data = Master::with('masterItem')->get();
    		return Datatables::of($data)
    		->addIndexColumn()
    		->addColumn('po_no', function ($row) {
    			$po_no = $row->po_no;
    			return $po_no;
    		})
    		->addColumn('customer', function ($row) {
    			$customer = $row->customer;
    			return $customer;
    		})     
    		->addColumn('customer_no', function ($row) {
    			$customer_no = $row->customer_no;
    			return $customer_no;
    		})     
    		->addColumn('item', function ($row) {
    			$item = $row->item;
    			return $item;
    		})     
    		->addColumn('article', function ($row) {
    			$article = $row->article;
    			return $article;
    		})     
    		->addColumn('colour', function ($row) {
    			$colour = $row->colour;
    			return $colour;
    		})     
    		->addColumn('total_qty', function ($row) {
    			$total_qty = $row->total_qty;
    			return $total_qty;
    		})     
    		// ->addColumn('created_by', function ($row) {
    		// 	$created_by = $row->dibuatOleh->name;
    		// 	return $created_by;
    		// })     
    		// ->addColumn('updated_by', function ($row) {
    		// 	$updated_by = $row->dieditOleh->name;
    		// 	return $updated_by;
    		// })     
    		->addColumn('action', function ($row) {
    			$action =  '<a class="btn btn-sm btn-warning modal-button" href="Javascript:void(0)"  data-target="ModalForm" data-url=""  data-toggle="tooltip" data-placement="top" title="Edit" >Edit</a>';
    			$action = $action .  '<a class="btn btn-sm btn-danger modal-button ml-2" href="Javascript:void(0)"  data-target="ModalForm" data-url=""  data-toggle="tooltip" data-placement="top" title="Edit" >Hapus</a>';

    			return $action;
    		})
    		->rawColumns(['action'])
    		->make(true);
    	}
        return view('backend.master.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.master.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $master = $request->validate([
			"po_no" => 'required',
			"order_no" => 'required',
			"customer" => 'required',
			"customer_no" => 'required',
			"item" => 'required',
			"article" => 'required',
			"colour" => 'required',
			"total_qty" => 'required',
    	]);

    	DB::beginTransaction();
    	try {
    		$master['created_by'] = auth()->user()->id;
    		$masterData = Master::create($master);

    		for ($i=0; $i < count($request->barcode_ctn) ; $i++) { 
    		 	MasterItem::create([
    		 		'master_id' => $masterData->id,
    		 		'size' => $request->size[$i],
    		 		'pairs' => $request->pairs[$i],
    		 		'no_ctn' => $request->no_ctn[$i],
    		 		'barcode_ctn' => $request->barcode_ctn[$i],
    		 	]);
    		 } 
    		
    	} catch (\Exception $e) {
    		DB::rollback();
    		dd($e->getMessage());
    		toastr()->error($e->getMessage(), 'Error');
    		return back();
    	}catch (\Throwable $e) {
    		DB::rollback();
    		dd($e->getMessage());
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
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit(Master $master)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        //
    }
}
