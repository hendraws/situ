<?php

namespace App\Http\Controllers;

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

			$data = MasterItem::with('Master')->where('modul','scanout')->get();
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
}
