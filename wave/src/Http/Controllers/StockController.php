<?php

namespace Wave\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends \App\Http\Controllers\Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $stocks = Stock::where('user_id', '=', $user->id)->get();
        //dump($stocks);exit;

        $data['stocks'] = $stocks;
        return view('theme::stocks.index', ['data' => $data ]);
    }
}
