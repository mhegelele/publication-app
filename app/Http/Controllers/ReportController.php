<?php

namespace NimrPublication\Http\Controllers;


use Nimr_Publications\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use PDF;


class ReportController extends Controller
{

function overallreport(Request $request)
    {

        $c = DB::table('centres')
                ->leftJoin('publication','publication.centre', '=','centres.id')
                ->select(DB::raw('count(publication.centre) AS idadi, centres.id, centres.c_name'))
                ->where('publication.status','=','approved')
                 ->where('publication.level', '!=',  1)
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
                ->select(DB::raw('count(t2.p_id) AS years1, t1.pub_year, t1.level, t1.p_id'))
                ->where('t2.status','=','pending')
                ->where('t1.level', '!=',  1)
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
                ->where('publication.level', '!=',  1)
                // ->groupBy('pub_year')
                ->get();

           $ap1 = DB::table('publication')->where('status','approved')
                                           ->where('publication.level', '!=',  1)
                                            ->select('p_id','title')
                                           ->paginate(10);

             $pubs = DB::table('publication')->where('status','approved')
                                             ->where('publication.level', '!=',  1)
                                            ->select('p_id','title')
                                            ->get();
             $app = DB::table('publication')
                ->select(DB::raw('count(*) as publications2'),'title')
                ->where('publication.status','=','pending')
                ->where('publication.level', '!=',  1)
                // ->groupBy('pub_year')
                ->get();
            $app1 = DB::table('publication')->where('status','pending')
                                             ->where('publication.level', '!=',  1)
                                            ->select('p_id','title')
                                          ->paginate(10);
            $pc = DB::table('centres')
                ->select(DB::raw('count(*) as centre'))
                ->get();

             $cents = DB::table('centres')->get();

             $year = DB::table('publication')
                    ->where('publication.level', '!=',  1) 
                    ->groupBy('pub_year')
                   ->paginate(10);

 view()->share('pubs',$pubs);         

  if($request->has('download')){
            $pdf = PDF::loadView('pdf');
            return $pdf->download('reportview.pdf');
        }

    return view('reportview')->with('roles',$r)->with(['centres'=>$c])->with(['years'=>$y])
        ->with(['pubs'=>$p])->with(['users'=>$u])->with(['users0'=>$u0])->with(['users1'=>$u1])->
        with(['pubs1'=>$ap])->with(['pubs2'=>$app])->with(['centers'=>$pc])->with(['cents'=>$cents])->
        with(['year'=>$year])->with(['pubs10'=>$ap1])->with(['pubs20'=>$app1])
        ->with('i', (request()->input('page', 1) - 1) * 5);
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportview(Request $request)
    {
        if(Auth::check()){
       
        $reports = DB::table("users")->get();

        view()->share('reports',$reports);


        if($request->has('download')){
            $pdf = PDF::loadView('reportview');
            return $pdf->download('reportview.pdf');
        }


        return view('reportview');
    }
    else{
            return redirect("home2");
}
}

function Try(){
       
        $c = DB::table('centres')->get();
        $year = DB::table('publication')
             ->groupBy('pub_year')
             ->get();  
      
        $text = DB::table('publication')
                ->orderBy('pub_year','desc')
                ->limit(6)
                ->select('title','pub_year')->get();
        return view('my-search')->with(['text'=>$text,'cents'=>$c, 'year'=>$year]);
        } 


function Searchreport($id){


             $pubs = DB::table('publication')
                ->select(DB::raw('count(*) as publications1'))
                ->where('publication.centre','=',$id)
                ->where('publication.status','=','approved')
                ->where('publication.level', '!=',  1)
                ->get();

            $pubs = DB::table('publication')
                ->select(DB::raw('count(*) as publications1'))
                ->where('publication.centre','=',$id)
                ->where('publication.status','=','approved')
                ->where('publication.level', '!=',  1)
                ->get();


           $viewpub = DB::table('publication')
                ->where('publication.centre','=',$id)
                 ->where('publication.status','=','approved')
                 ->where('publication.level', '!=',  1)
                ->get(); 


                 $pub = DB::table('publication')
                ->select(DB::raw('count(*) as publications1'))
                ->where('publication.centre','=',$id)
                ->where('publication.status','=','pending')
                ->where('publication.level', '!=',  1)
                ->get();

                $c = DB::table('centres')
                ->where('centres.id','=',$id)
                ->get();

             $cents = DB::table('centres')->get();

             $year = DB::table('publication')
             ->where('publication.level', '!=',  1)
                    ->groupBy('pub_year')
                    ->get();

                 return view('report')->with(['pubs'=>$pubs, 'c'=>$c])->with(['cents'=>$cents])
                 ->with(['year'=>$year])->with(['pub'=>$pub])->with(['viewpub'=>$viewpub])->with('i', (request()->input('page', 1) - 1) * 5);

        }
   // Report by year 
 function Yearreport(Request $request,$pub_year){


             $pubs = DB::table('publication')
                ->select(DB::raw('count(*) as publications1'))
                ->where('publication.pub_year','=',$pub_year)
                ->where('publication.status','=','approved')
                ->where('publication.level', '!=',  1)
                ->get();

              $c = DB::table('publication')
                ->where('publication.pub_year','=',$pub_year)
                ->where('publication.level', '!=',  1)
                ->groupBy('pub_year')
                ->get(); 

                 $pub = DB::table('publication')
                ->select(DB::raw('count(*) as publications1'))
                ->where('publication.pub_year','=',$pub_year)
                ->where('publication.level', '!=',  1)
                ->where('publication.status','=','pending')
                ->get(); 


             $viewpub = DB::table('publication')
                ->where('publication.pub_year','=',$pub_year)
                ->where('publication.status','=','approved')
                ->where('publication.level', '!=',  1)
                ->get(); 

            
  
                     return view('year')->with(['pubs'=>$pubs, 'c'=>$c])->with(['pub'=>$pub])->
                     with(['viewpub'=>$viewpub])->with('i', (request()->input('page', 1) - 1) * 5)
                ;

        }

public function yearPDF(Request $request,$pub_year)
{        

         $pubs = DB::table('publication')
                ->where('publication.pub_year','=',$pub_year)
                ->where('publication.level', '!=',  1)
                           ->get() ;

                            view()->share('pubs',$pubs, compact('pub_year'));
                            $pdf = PDF::loadView('yearpdf', compact('pub_year'));
            return $pdf->download('yearreport.pdf', compact('pub_year'));
           return view('yearpdf', compact('pub_year'))->with(['pubs'=> $pubs]);
    }


public function centrePDF(Request $request,$centre)
{        

         $pubs = DB::table('publication')
                  //->join('centres', 'publication.centre', '=', 'centres.c_name')
                  ->where('publication.centre','=',$centre)
                  ->where('publication.level', '!=',  1)
                  ->get() ;

                            view()->share('pubs',$pubs);
                            $pdf = PDF::loadView('centrepdf');
            return $pdf->download('centrereport.pdf');
           return view('centrepdf')->with(['pubs'=> $pubs]);
    }

  public function generatePDF()
    {
         $data = [DB::table('publication')
                           ->get() ];
   
        $pdf = PDF::loadView('pdf', $data);
  
        return $pdf->download('itsolutionstuff.pdf');
    }



function index()
    {
     return view('date_range');
    }

function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->from_date != '' && $request->to_date != '')
      {
       $data = DB::table('publication')
          ->where('publication.status','=','approved')
          ->where('publication.level', '!=',  1)
         ->whereBetween('uploadedDate', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = DB::table('publication')
                ->where('publication.status','=','approved')
                ->where('publication.level', '!=',  1)
                ->orderBy('uploadedDate', 'desc')->get();
      }
      echo json_encode($data);
     }
    }




      public function pdfview(Request $request )
    {
        $publications = DB::table("publication")->get();
        view()->share('publications',$publications);


         if($request->has('download')){
            $pdf = PDF::loadView('pdfreport');
            return $pdf->download('reportview.pdf');
        }


        return view('pdfview');
    }



      public function pdfyear(Request $request, $year)
    {
        $pubs = DB::table('publication')
                ->select(DB::raw('count(*) as publications1'))
                ->where('publication.pub_year','=',$year)
                ->where('publication.status','=','approved')
                ->get();

        view()->share('pubs',$pubs);


        if($request->has('download')){
            $pdf = PDF::loadView('pdfyear');
            return $pdf->download('pdfview.pdf');
        }


        return view('pdfyear');
    }


    public function pdfgenerate(Request $request)
    {
        $pubs = DB::table("publication")
         ->select('title')
      
                 ->where('publication.status','=','approved')
              
                 ->get();
        
view()->share('pubs',$pubs);
        if($request->has('download')){
            $pdf = PDF::loadView('pdf');
            return $pdf->download('reportview.pdf');
        }


        return view('pdf');
    }

}