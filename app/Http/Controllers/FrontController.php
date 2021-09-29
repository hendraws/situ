<?php

namespace App\Http\Controllers;

use App\Master;
use App\MasterItem;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax()) {
    		if(!empty($request->no_ctn)){
    			$data = MasterItem::where('modul','scanin')
    			->where('no_ctn', request()->no_ctn)
    			->get();
    			return view('backend.dashboard.table_item', compact( 'data'));
    		}    			
    		$data = Master::with('masterItemsOnWarehouse')
    		// ->whereHas('masterItemsOnWarehouse', function ($q){
    		// 	$q->where('modul','scanin')
    		// 	->Where('no_ctn', request()->no_ctn);
    		// })
    		->orWhere('po_no', $request->po)
    		->orWhere('article', $request->article)
    					// ->orWhere('article', $request->tracking)
    		->get();

    		return view('backend.dashboard.table', compact( 'data'));
    		
    	}
    	return view('backend.dashboard.tracking');
    }
}
