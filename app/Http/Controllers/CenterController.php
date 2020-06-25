<?php

namespace NimrPublication\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class CenterController extends Controller
{
    function index(Request $request)
    {

    	$c = DB::table('centres')
                ->leftJoin('publication','publication.centre', '=','centres.id')
                ->select(DB::raw('count(publication.centre) AS idadi, centres.id, centres.c_name'))
                ->where('publication.status','=','approved')
                ->groupBy('id')
                ->orderBy('c_name')
                ->get();
            $r = DB::table('role')
                ->leftJoin('users','users.level', '=','role.id')
                ->select(DB::raw('count(users.level) AS levels, role.id, role.role_name'))
                ->groupBy('id')
                ->orderBy('role_name')
                ->get();
            
            $y = DB::table('publication as t1')
                ->join('publication as t2','t1.pub_year', '=','t2.pub_year')
                ->select(DB::raw('count(t2.p_id) AS years1, t1.pub_year, t1.p_id'))
                ->where('t2.status','=','pending')
                ->groupBy('pub_year')
                ->orderBy('pub_year')
                ->get();
            $u = DB::table('users')
                    ->select(DB::raw('count(*) as count1'))
                    // ->where('users.level', '=', 1)
                    ->get();
              $u0 = DB::table('users')
                    ->select(DB::raw('count(*) as count0'))
                    ->where('users.level', '=', 1)
                    ->get();
              $u1 = DB::table('users')
                    ->select(DB::raw('count(*) as count1'))
                    ->where('users.level', '=', 0)
                    ->get();

            $p = DB::table('publication')
                ->select(DB::raw('count(*) as publications'))
                // ->where('publication.status','=','approved')
                // ->groupBy('pub_year')
                ->get();
            $ap = DB::table('publication')
                ->select(DB::raw('count(*) as publications1'),'title')
                ->where('publication.status','=','approved')
                // ->groupBy('pub_year')
                ->get();

           $ap1 = DB::table('publication')->where('status','approved')
                                            ->select('p_id','title')
                                            ->get();

             $pubs = DB::table('publication')->where('status','approved')
                                            ->select('p_id','title')
                                            ->get();
             $app = DB::table('publication')
                ->select(DB::raw('count(*) as publications2'),'title')
                ->where('publication.status','=','pending')
                // ->groupBy('pub_year')
                ->get();
            $app1 = DB::table('publication')->where('status','pending')
                                            ->select('p_id','title')
                                            ->get();
            $pc = DB::table('centres')
                ->select(DB::raw('count(*) as centre'))
                ->get();

             $cents = DB::table('centres')->get();

             $year = DB::table('publication')
                    ->groupBy('pub_year')
                    ->get();
       

  if($request->has('download')){
            $pdf = PDF::loadView('pdf');
            return $pdf->download('reportview.pdf');
        }

   	return view('reportview')->with('roles',$r)->with(['centres'=>$c])->with(['years'=>$y])
        ->with(['pubs'=>$p])->with(['users'=>$u])->with(['users0'=>$u0])->with(['users1'=>$u1])->
        with(['pubs1'=>$ap])->with(['pubs2'=>$app])->with(['centers'=>$pc])->with(['cents'=>$cents])->
        with(['year'=>$year])->with(['pubs10'=>$ap1])->with(['pubs20'=>$app1]);
    
    }
  }
?>