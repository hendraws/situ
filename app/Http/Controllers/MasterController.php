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
    		$data = Master::with('masterItems')->get();
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
    		->addColumn('action', function ($row) {
    			$action =  '<a class="btn  btn-success btn-sm m" href="'. action('MasterController@show', $row->id) .'">Detail</a>';
    			$action = $action .  '<a class="btn btn-sm btn-warning m-1" href="'. action('MasterController@edit', $row->id) .'" >Edit</a>';
    			$action = $action .  '<a class="btn btn-sm btn-danger modal-button" href="Javascript:void(0)"  data-target="ModalForm" data-url="'.action('MasterController@delete',$row->id).'"  data-toggle="tooltip" data-placement="top" title="Edit" >Hapus</a>';
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

    		// for ($i=0; $i < count($request->size) ; $i++) { 
    		//  	MasterItem::create([
    		//  		'master_id' => $masterData->id,
    		//  		'size' => $request->size[$i],
    		//  		'pairs' => $request->pairs[$i],
    		//  		'no_ctn' => $request->no_ctn[$i],
    		//  		'barcode_ctn' => $request->barcode_ctn[$i],
    		//  	]);
    		//  } 
    		
    		foreach ($request->size as $key => $value) {
    			foreach ($request->no_ctn[$value] as $k => $v) {
    				// dd($v, $request->barcode_ctn[$value][$k]);
    				MasterItem::create([
    					'master_id' => $masterData->id,
    					'size' => $value,
    					'pairs' => $request->qty_ctn[$value][$k],
    					'no_ctn' => $request->no_ctn[$value][$k],
    					'barcode_ctn' => $request->barcode_ctn[$value][$k],
    					'modul' => 'master',
    					'keterangan' => 'master',
    		 		// 'status' => 
    				]);
    			}
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
    	return redirect( action('MasterController@index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$master = Master::find($id);
    	return view('backend.master.show', compact('master'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$master = Master::find($id);
    	return view('backend.master.edit', compact('master'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

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
    		$master['updated_by'] = auth()->user()->id;
    		$masterData = Master::where('id',$id)->update($master);

    		foreach ($request->masterItem as $key => $value) {
    			MasterItem::where('id', $key)->update([
    				'size' => $value['size'],
    				'pairs' => $value['pairs'],
    				'no_ctn' => $value['no_ctn'],
    				'barcode_ctn' => $value['barcode_ctn'],
    			]);
    		}

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
    	toastr()->success('Data telah diupdate', 'Berhasil');
    	return redirect( action('MasterController@index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	DB::beginTransaction();
    	try {
    		$master = Master::find($id);
    		$master->masterItems()->delete();
	        $master->delete();

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
    	toastr()->success('Data telah terhapus', 'Berhasil');
    	return redirect( action('MasterController@index'));
    }

    public function delete($id)
    {
    	$master = Master::find($id);
    	return view('backend.master.delete', compact('master'));
    }
}
