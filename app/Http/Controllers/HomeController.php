<?php

namespace NimrPublication\Http\Controllers;
use DB;

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
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

         $c = DB::table('centres')
                ->leftJoin('publication','publication.centre', '=','centres.id')
                ->select(DB::raw('count(publication.centre) AS idadi, centres.id, centres.c_name'))
                ->where('publication.status','=','approved')
                ->groupBy('id')
                ->orderBy('c_name')
                ->get();
        $text = DB::table('publication')
                    ->where('status','=','approved')
                    ->paginate(15);
        return view('home')->with('text',$text)->with(['centres'=>$c]);
        // return view('home2');
        //return view('home');
    }
}
