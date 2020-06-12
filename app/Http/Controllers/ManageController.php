<?php

namespace NimrPublication\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use NimrPublication\Publication;
use NimrPublication\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
class ManageController extends Controller
{

    function loadHome(){
        $c = DB::table('centres')
                ->leftJoin('publication','publication.centre', '=','centres.id')
                ->select(DB::raw('count(publication.centre) AS idadi, centres.id, centres.c_name'))
                ->where('publication.status','=','pending')
                ->groupBy('id')
                ->orderBy('c_name')
                ->get();
    	$text = DB::table('publication')
                    ->where('status','=','pending')
                    ->paginate(15);
    	return view('home2')->with('text',$text)->with(['centres'=>$c]);
    }
    function loadLogin(){
    	return view('login');
    }
    function loadRegister(){
    	return view('register');
    }
    function uploadPublication(){
        if(Auth::check()){
        $c = DB::table('centres')->get();
        $pTypes = DB::table('publication_types')->get();
        $area = DB::table('research_area')->get();
        $text = DB::table('publication')
                ->orderBy('pub_year','desc')
                ->limit(6)
                ->select('title','pub_year')->get();
        return view('addpub')->with(['text'=>$text,'cents'=>$c, 'pubTypes'=>$pTypes,'area'=>$area]);
        } else{
            return redirect()->back();
        }
    }
    function management(){
        if(Auth::check()){
            $text = DB::table('publication')->where('status','approved')
                                            ->orderBy('approvedDate','asc')
                                            ->limit(10)
                                            ->select('p_id','citation')
                                            ->get();
            $pubs = DB::table('publication')->where('status','pending')
                                            ->orderBy('uploadedDate','asc')
                                            ->select('title','p_id','journal','pub_year')
                                            ->get();
            return view('management')->with(['pubs'=>$pubs,'text'=>$text]);
        }else{
            return redirect()->back();
        }
    }
      function approve($id){
        $uploader = DB::table('users')
                        ->join('publication','publication.uploader', '=', 'users.id')
                        
                        ->first();
        $pubs =  DB::table('publication')
                   ->where('publication.p_id',$id)
                   ->join('publication_types', 'publication.pub_type', '=', 'publication_types.id')
                   ->leftjoin('research_area', 'publication.researchArea', '=', 'research_area.id')
                   ->first();
        $nauthors = DB::table('authors')
                            ->where('authors.p_id', $id)
                           
                            
                            ->get();

        return view('approve')
                ->with(['pubs'=>$pubs,'nauthors'=>$nauthors,'uploader'=>$uploader]);

    }
    function reports(){
        return view('reports');
    }
    function search(Request $request){
        $search = $request->search;
        $search = explode(" ", $search);
        $pita = False;
        $sql = "SELECT * FROM publication WHERE ";
        foreach ($search as $key) {
            if(ctype_alnum($key)){
                $sql .= "citation LIKE '%".$key."%' AND ";
                $pita = True;
            }
        }
        if($pita){
        $sql = rtrim($sql,'AND ');
        $text = DB::select($sql);   
        return view('search',compact('text','search'));
        } else{
            return redirect()->back();
        }
    }
    function viewPublication($id){
        $authors = DB::table('authors')
                            ->where('authors.p_id',$id)
                            ->join('publication', 'authors.p_id', "=",'publication.p_id')
                            ->select('authors.*')->get();
        $first="";
        $co="";
        $last="";
        foreach($authors as $au){
            if($au->role == "First"){
                $first .= $this->getInitials($au->firstname,$au->middlename).$au->surname.",  ";
            }else if($au->role == "Co Author"){
                $co .= $this->getInitials($au->firstname,$au->middlename).$au->surname.",  ";
            }else{
                $last .= $this->getInitials($au->firstname,$au->middlename).$au->surname.",  ";
            }
        }
        $authors = rtrim($first.$co.$last,", ").".";

        $pubs = DB::table('publication')
                    ->where('p_id',$id)
                    ->first();
        return view('view-publication')->with(['pub'=>$pubs])->with('authors',$authors);
    }
    function getInitials($first,$middle){
        $initials ="";
        $f= strtoupper(substr($first, 0,1));
        $m = strtoupper( substr($middle, 0,1));
        if($m != ""){
            $initials .=$f.". ".$m.". ";
        }else{
            $initials .=$f;
        }
        return $initials;
    }
    function viewFile(){
        return "mimi";
    }
    function viewPublicationByCenter($id){
        $d = $id;
        $cname = DB::table("centres")
                 ->where('centres.id', '=',$id)
                 ->select('centres.c_name')->first();
        $c = DB::table('centres')
                ->leftJoin('publication','publication.centre', '=','centres.id')
                ->select(DB::raw('count(publication.centre) AS idadi, centres.id, centres.c_name'))
                ->where('publication.status','=','pending')
                ->groupBy('id')
                ->orderBy('c_name')
                ->get();
        $text = DB::table('publication')
                    ->where([
                        ['status','=','pending'],
                        ['centre','=',$id]
                        ])
                    ->paginate(10);
        return view('by-center')->with('text',$text)->with(['centres'=>$c])->with("name",$cname)->with("navId",$d);
    }

    function dataTableList(Request $request){
        $search = $request->search_value;
        $length = $request->length;
        $draw = $request->draw;
        $publications =  Publication::where('status','=','approved');
        if(!empty($search) && !is_null($search)){
            $publications->where('citation','like',"%{$search}%");
        }
        $totalRecords = $publications;
        $text = $publications->offset($request->start)->limit($request->length)->orderBy("pub_year","DESC")->get();
        $data = array();
      
        foreach($text as $d){
            $req = array("id"=>$d->p_id,"citation"=>$d->citation,"year"=>$d->pub_year);
            array_push($data,$req);
        }
     
        $data_table = array(
            "draw"=>$request->draw,
            "recordsTotal"=>Publication::where('status','=','approved')->count(),
            "recordsFiltered" =>  $totalRecords->count(),
            "data"=>$data
        );
        return json_encode($data_table);

    }

    // public function myPagination()
    // {
    //     $pubs = pub::paginate(5);
    //     return view('myPagination',compact('pubs'));
    // }
}
