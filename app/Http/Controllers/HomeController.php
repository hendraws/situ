<?php

namespace App\Http\Controllers;

use App\Master;
use App\MasterItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

    	if($request->ajax()) {
    		// if($request->has('detail')){

    		// }
    		// if(!empty($request->no_ctn)){
    		// 	$data = MasterItem::where('modul','scanin')
    		// 	->where('no_ctn', request()->no_ctn)
    		// 	->get();
    		// 	return view('backend.dashboard.table_item', compact( 'data'));
    		// }    			
    		// $data = Master::with('masterItemsOnWarehouse')
    		// ->whereHas('masterItemsOnWarehouse', function ($q){
    		// 	$q->where('modul','scanin')
    		// 	->Where('no_ctn', request()->no_ctn);
    		// })
    		// ->orWhere('po_no', $request->po)
    		// ->orWhere('article', $request->article)
    					// ->orWhere('article', $request->tracking)
    		// ->get();
			$data = Master::join('master_items','master_items.master_id', 'masters.id')
			->where('modul','scanin')
			->when(!empty($request->no_ctn), function($q){
				$q->where('no_ctn', request()->no_ctn);
			})
			->when(!empty($request->po), function($q){
				$q->where('po_no', request()->po);
			})
			->when(!empty($request->article), function($q){
				$q->where('article', request()->article);
			})
			->when(!empty($request->article), function($q){
				$q->where('article', request()->article);
			})
			->when(empty($request->detail), function($q){
				$q->selectRaw('po_no, order_no, count(no_ctn) as qty_ctn, item, article, lokasi')
				->groupBy('po_no')
				->groupBy('article')
				->groupBy('lokasi');
			})
			->when(!empty($request->detail), function($q){
				$q->where('lokasi', request()->lokasi);
			})
			->get();
			if($request->has('detail')){
				return view('backend.dashboard.table_detail', compact( 'data'));
			}

			return view('backend.dashboard.table', compact( 'data'));

		}
    	return view('backend.dashboard.index');
    }

    public function underContraction()
    {
    	return view('under_contraction');
    }
}
