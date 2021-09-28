<?php

namespace App\Http\Controllers;

use App\Master;
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
    		if($request->has('tracking')){    			
    			$dataMaster = Master::with('masterItems')
    					->whereHas('masterItems', function ($q){
    						$q->Where('lokasi', request()->tracking);
    					})
    					->orWhere('po_no', $request->tracking)
    					->orWhere('article', $request->tracking)
    					->first();
    			return view('backend.dashboard.table', compact( 'dataMaster'));
    		}
    	}
        return view('backend.dashboard.index');
    }

    public function underContraction()
	{
		return view('under_contraction');
	}
}
