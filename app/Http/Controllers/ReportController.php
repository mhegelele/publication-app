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
                ->get();

            $pubs = DB::table('publication')
                ->select(DB::raw('count(*) as publications1'))
                ->where('publication.centre','=',$id)
                ->where('publication.status','=','approved')
                ->get();


           $viewpub = DB::table('publication')
                ->where('publication.centre','=',$id)
                 ->where('publication.status','=','approved')
                ->get(); 


                 $pub = DB::table('publication')
                ->select(DB::raw('count(*) as publications1'))
                ->where('publication.centre','=',$id)
                ->where('publication.status','=','pending')
                ->get();

                $c = DB::table('centres')
                ->where('centres.id','=',$id)
                ->get();

                 $cents = DB::table('centres')->get();

             $year = DB::table('publication')
                    ->groupBy('pub_year')
                    ->get();

                 return view('report')->with(['pubs'=>$pubs, 'c'=>$c])->with(['cents'=>$cents])
                 ->with(['year'=>$year])->with(['pub'=>$pub])->with(['viewpub'=>$viewpub])->with('i', (request()->input('page', 1) - 1) * 5);

        }
    
 function Yearreport($pub_year){


             $pubs = DB::table('publication')
                ->select(DB::raw('count(*) as publications1'))
                ->where('publication.pub_year','=',$pub_year)
                ->where('publication.status','=','approved')
                ->get();

              $c = DB::table('publication')
                ->where('publication.pub_year','=',$pub_year)
                ->groupBy('pub_year')
                ->get(); 

                 $pub = DB::table('publication')
                ->select(DB::raw('count(*) as publications1'))
                ->where('publication.pub_year','=',$pub_year)
                ->where('publication.status','=','pending')
                ->get(); 


             $viewpub = DB::table('publication')
                ->where('publication.pub_year','=',$pub_year)
                ->where('publication.status','=','approved')
                ->get(); 
                 return view('year')->with(['pubs'=>$pubs, 'c'=>$c])->with(['pub'=>$pub])->with(['viewpub'=>$viewpub])->with('i', (request()->input('page', 1) - 1) * 5);

        }




  public function generatePDF()
    {
        $data = ['title' => 'Welcome to HDTuto.com'];
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
         ->whereBetween('uploadedDate', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = DB::table('publication')->orderBy('uploadedDate', 'desc')->get();
      }
      echo json_encode($data);
     }
    }




      public function pdfview(Request $request )
    {
        $publications = DB::table("publication")->get();
        view()->share('publications',$publications);


        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
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


    public function pdfcenter(){


    }
}