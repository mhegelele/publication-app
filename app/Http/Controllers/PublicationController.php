<?php


namespace NimrPublication\Http\Controllers;
//namespace NimrPublication\Http\Controllers;


//use Illuminate\Http\Request;
//use NimrPublications\Http\Controllers\Controller;
//use NimrPublication\Item;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use NimrPublication\Publication;
use DB;


class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

               if(Auth::check()){
            $text = DB::table('publication')->where('status','approved')
                                            ->orderBy('approvedDate','asc')
                                            ->limit(10)
                                            ->select('p_id','citation')
                                            // ->paginate(10)
                                            ->get();
            $pubs = DB::table('publication')->where('status','pending')
                                            ->orderBy('uploadedDate','asc')
                                            ->select('title','p_id','journal','pub_year')
                                            ->paginate(10);
                                            
                                          

                                            // ->get();
            return view('manage')->with(['pubs'=>$pubs,'text'=>$text])
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            return redirect()->back();
        }
        // $publications = Publication::latest()->paginate(10);

        // return view('publications.index',compact('publication'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        return view('publications.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'fname' => 'required',
            'email' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }



public function show($id){
    if(Auth::check()){
 $d = $id;
    $pubs = DB::table('publication')
    ->join('authors', 'publication.p_id', '=', 'authors.p_id')
    ->join('users', 'publication.uploader', '=', 'users.id')
     ->join('research_area', 'publication.researchArea', '=', 'research_area.id')
          ->join('publication_types', 'publication.pub_type', '=', 'publication_types.id')

    ->where('publication.p_id', '=', $id)
    ->first();

return view('approve')->with(['pub'=>$pubs]);

    }
    else{
            return redirect()->back();
        }
    }




public function viewpub($id){
   

    $pubs = DB::table('publication')
    ->join('authors', 'publication.p_id', '=', 'authors.p_id')
    ->join('users', 'publication.uploader', '=', 'users.id')
    ->where('publication.p_id', '=', $id)
    ->first();


return view('viewpub')->with(array('pubs'=>$pubs));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     if(Auth::check()){
    //     $user = User::find($id);
    //     return view('users.show',compact('user'));
    // }else{
    //         return redirect()->back();
    //     }
    // }

    function approveone(Request $request){
        $id = $request->id;
        $user = Auth::id();
        $date = date("Y-m-d");
        $pub_year = $request->pub_year;
        $abstract = $request->abstract;
        $title = $request->title;
        $citation = $request->citation;
        DB::table('publication')->where('p_id',$id)->update(['pub_year'=>$pub_year, 'title'=>$title, 'abstract'=>$abstract, 'citation'=>$citation]);
        return redirect()->back()->with('success','Publication successfully Updated');
    }

function approve(Request $request){
        $id = $request->id;
        $user = Auth::id();
        $date = date("Y-m-d");
        $pub_year = $request->pub_year;
        $abstract = $request->abstract;
        $title = $request->title;
        $citation = $request->citation;
        DB::table('publication')->where('p_id',$id)->update(['status' => 'approved','approvedBy'=>$user,'approvedDate'=>$date, 'pub_year'=>$pub_year, 'title'=>$title, 'abstract'=>$abstract, 'citation'=>$citation]);
        return redirect()->back()->with('success','Publication successfully Approved');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request, User $user)
    {
         


        //  request()->validate([
        //     'fname' => 'required',
        //     'email' => 'required',
        // ]);
        $this->validate($request, [
    'email' => 'required|email',
]);


        $user->update($request->all());


        return redirect()->route('users.index')
                        ->with('success','Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }



 public function approvedpub()
    {

               if(Auth::check()){
            $text = DB::table('publication')->where('status','approved')
                                            ->orderBy('approvedDate','asc')
                                            ->limit(10)
                                            ->select('p_id','citation')
                                            // ->paginate(10)
                                            ->get();
            $pubs = DB::table('publication')->where('status','approved')
                                            ->orderBy('uploadedDate','asc')
                                            ->select('title','p_id','journal','pub_year')
                                            ->paginate(10);
                                            // ->get();
            return view('approved')->with(['pubs'=>$pubs,'text'=>$text])->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            return redirect()->back();
        }
       
    }


 function addPublication(Request $request){
        $data = Input::except(array('_token','submit','fname','mname','sname','authShip','autInst','otherResearchArea','researchArea'));
        $fname = $request->fname;
        $mname = $request->mname;
        $sname = $request->sname;
        $inst = $request->autInst;
        $authship = $request->authShip;
        $otherRA = $request->otherResearchArea;
        $rArea = $request->researchArea;
        $data = array_merge($data,array("researchArea"=>$rArea));
        if($rArea == 'other' && !empty($otherRA)){
            DB::table('research_area')->insert(['area' => $otherRA]);
            $rArea = DB::getPdo()->lastInsertId();
        }
        
        $data = array_merge($data,array("researchArea"=>$rArea));
        $rule = array(
            'title'=>'required',
            'researchArea'=>'required',
            'pub_year'=>'required',
            );

        $validator = Validator::make($data,$rule);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            DB::table('publication')->insert($data); 
            $id = DB::getPdo()->lastInsertId();
            for($x = 0; $x<sizeof($sname);$x++){
                if($sname[$x] != ""){
                DB::table('authors')->insert([
                    'p_id'=>$id,
                    'firstname'=>$fname[$x],
                    'middlename'=>$mname[$x],
                    'surname'=>$sname[$x]
                                       
                    ]);
                }else{
                    echo "Error Occured";
                }
            }
            return redirect()->back()->with('success','Publication successfully Uploaded');   
        }
    }



     public function researcharea()
    {

               if(Auth::check()){
            $text = DB::table('research_area')->orderBy('area','asc')
                                            ->limit(10)
                                            ->select('area')
                                            // ->paginate(10)
                                            ->get();
           
            return view('research')->with(['researchs'=>$pubs]);
        }else{
            return redirect()->back();
        }
  
    }
    
}