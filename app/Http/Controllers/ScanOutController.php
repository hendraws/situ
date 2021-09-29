<?php

namespace App\Http\Controllers;

use App\Master;
use App\MasterItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
class ScanOutController extends Controller
{
	public function index(Request $request)
	{
		if($request->ajax()) {
			if($request->has('barcode_ctn')){    			
				$data = MasterItem::where('barcode_ctn', $request->barcode_ctn)
				->where('modul','scanin')
				->first();
				return view('backend.scan_in.table', compact('data'));
			}

			$data = Master::with('masterItemsOnContainer')->get();

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
				$qty = optional($row->masterItemsOnContainer)->sum('pairs') ?? 0;
				return $qty;
			})     
			->addColumn('balance', function ($row) {
				$balance = (optional($row->masterItemsOnContainer)->sum('pairs') ?? 0)  -  ($row->total_qty ?? 0)  ; 
				$bg = $balance == 0 ? 'bg-success' : 'bg-warning';
				return '<div class="'. $bg .'">'.$balance.'</div>';
			})     
			->addColumn('action', function ($row) {
				$action =  '<a class="btn btn-sm btn-success" href="'. action('ScanOutController@show', $row->id) .'">Detail</a>';
				return $action;
			})     
			->rawColumns(['balance','action'])
			->make(true);
		}

		return view('backend.scan_out.index');
	}

	public function store(Request $request)
	{
		DB::beginTransaction();
		try {
			foreach ($request->master_item_id as $key => $value) {
				$masterItem = MasterItem::where('id',$value)->update([
					'modul' => 'scanout',
					'keterangan' => 'container',
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

	public function show($id)
    {
    	$master = Master::find($id);
		return view('backend.scan_out.show', compact('master'));

    }
}
