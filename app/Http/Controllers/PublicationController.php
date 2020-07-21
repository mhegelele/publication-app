<?php


namespace NimrPublication\Http\Controllers;
use Mail;
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
                                            ->where('level', '!=',  1)
                                            ->orderBy('approvedDate','asc')
                                            ->limit(10)
                                            ->select('p_id','citation')
                                            ->paginate(10);
                                            //->get();
            $pubs = DB::table('publication')->where('status','pending')
                                             ->where('level', '!=',  1)
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
        if($request->submit == "Delete")
{
        $id = $request->id;
        $date = date("Y-m-d");
        DB::table('publication')->where('p_id',$id)->update(['level' => 1, 'level_date'=>$date]);
        return redirect()->back()->with('success','Publication successfully Delete');
}
else if($request->submit == "Update")
{
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

       
    }

function approve(Request $request){


    if($request->submit == "Delete")
{
        $id = $request->id;
        $date = date("Y-m-d");
        DB::table('publication')->where('p_id',$id)->update(['level' => 1, 'level_date'=>$date]);
        return redirect()->back()->with('success','Publication successfully Delete');
}
else if($request->submit == "Approve")
{
  $id = $request->id;
        $user = Auth::id();
        $date = date("Y-m-d");
        $pub_year = $request->pub_year;
        $abstract = $request->abstract;
        $title = $request->title;
        $citation = $request->citation;
        $doi = $request->doi;
        DB::table('publication')->where('p_id',$id)->update(['status' => 'approved','approvedBy'=>$user,'approvedDate'=>$date, 'pub_year'=>$pub_year, 'title'=>$title,
         'abstract'=>$abstract, 'citation'=>$citation, 'doi'=>$doi]);
        return redirect()->back()->with('success','Publication successfully Approved');

}

       
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


    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }



 public function approvedpub()
    {

               if(Auth::check()){
         
            $pubs = DB::table('publication')->where('status','approved')
                                            ->where('level', '!=',  1)
                                            ->orderBy('uploadedDate','asc')
                                            ->select('title','p_id','journal','pub_year')
                                            ->paginate(10);
                                            // ->get();
            return view('approved')->with(['pubs'=>$pubs])->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            return redirect()->back();
        }
       
    }


 function addPublication(Request $request){
        $data = Input::except(array('_token','submit','fname','mname','sname','authShip', 
                'inst', 'otherResearchArea','researchArea'));
        $fname = $request->fname;
        $mname = $request->mname;
        $sname = $request->sname;
        $authShip = $request->authShip;
        $centre=$request->centre;
        $institution=$request->institution;
        $otherRA = $request->otherResearchArea;
        $rArea = $request->researchArea;
        $inst = $request->inst;
        $data['myform'] = $request->all();
        // $data = array_merge($data,array("researchArea"=>$rArea));
               
      
        $rule = array(
            'title'=>'required',
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
                    'surname'=>$sname[$x],
                    'role'=>$authShip[$x],
                    'institution'=>$inst[$x]
                                       
                    ]);

                }else{
                    echo "Error Occured";
                }

                $data = array('name'=>"Nimr Publication");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('ndekya@yahoo.com', 'Nimr Publication')->subject
            ('New Publication have been uploaded');
         $message->from('nimrpublication@gmail.com','Nimr Publication');
      });
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


    public function testPublication(){
        return view('testpub');
    }
    public function createPublication(Request $request){

       $title = $request->input('title');
       $citation = $request->input('citation');
       DB::table('publication')->insert(
                ['title'=>$title, 'citation'=>$citation]
                );  

         return redirect()->back()->with('success','Publication successfully Uploaded');   
    }


// Setting starts..................................
    public function settingPublication()
    {

               if(Auth::check()){
            $text = DB::table('centres')   ->orderBy('c_name','asc')
                                           //->paginate(10);
                                            ->get();
            $pubs = DB::table('research_area')
                                            ->orderBy('area','asc')
                                            //->paginate(10);
                                            ->get();
            $pub = DB::table('publication_types')
                                            ->orderBy('type','asc')
                                            ->paginate(10);
                                            
                                          

                                            // ->get();
            return view('setting')->with(['pubs'=>$pubs,'text'=>$text, 'pub'=>$pub])
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            return redirect()->back();
        }
    }




    function EditSetting($id){
        $uploader = DB::table('users')
                         ->where('publication.p_id',$id)
                        ->join('publication', 'users.id', '=', 'publication.uploader' )
                        
                        ->first();
        $pubs =  DB::table('centres')
                   ->where('centres.id',$id)
                   ->first();
        $nauthors = DB::table('publication_types')
                            ->where('publication_types.id', $id)                         
                            ->first();

          $authors = DB::table('authors')
                                                
                            ->get();

        return view('edit-setting')
                ->with(['pubs'=>$pubs,'nauthors'=>$nauthors,'uploader'=>$uploader, 'authors'=>$authors]);

    }
 function EditType($id){
      
        $pubs = DB::table('publication_types')
                            ->where('publication_types.id', $id)                         
                            ->first();


        return view('edit-type')
                ->with(['pubs'=>$pubs]);

    }

     function EditArea($id){
      
        $pubs = DB::table('research_area')
                            ->where('research_area.id', $id)                         
                            ->first();


        return view('edit-area')
                ->with(['pubs'=>$pubs]);

    }

    function editcentre(Request $request){


         $id = $request->id;
        $c_name = $request->c_name;
        DB::table('centres')->where('centres.id',$id)->update(['c_name' => $c_name]);
        return redirect()->back()->with('success','Centre successfully Updated');
       
    }

 function editTypes(Request $request){


         $id = $request->id;
        $type = $request->type;
        DB::table('publication_types')
        ->where('publication_types.id',$id)
        ->update(['type' => $type]);
        return redirect()->back()->with('success','Publication Type successfully Updated');
       
    }
 function editAreas(Request $request){


         $id = $request->id;
        $area = $request->area;
        DB::table('research_area')
        ->where('research_area.id',$id)
        ->update(['area' => $area]);
        return redirect()->back()->with('success','Research Area successfully Updated');
       
    }


     public function AddCentre(Request $request){

       $c_name = $request->input('c_name');
       DB::table('centres')->insert(
                ['c_name'=>$c_name]
                );  

         return redirect()->back()->with('success','Centre successfully Added');   
    }
  public function AddArea(Request $request){

       $area = $request->input('area');
       DB::table('research_area')->insert(
                ['area'=>$area]
                );  

         return redirect()->back()->with('success','Research Area successfully Added');   
    }

    public function AddType(Request $request){

       $type = $request->input('type');
       DB::table('publication_types')->insert(
                ['type'=>$type]
                );  

         return redirect()->back()->with('success','Publication Type successfully Added');   
    }


     public function AddAuthor(Request $request){
 if(Auth::check()){
  
       $p_id = $request->p_id;
       $firstname = $request->firstname;
        $middlename = $request->middlename;
        $surname = $request->surname;
        $role = $request->role;
        $institution = $request->institution;
        DB::table('authors')
        ->insert(['p_id'=>$p_id,'firstname'=>$firstname,
          'middlename'=>$middlename,'surname'=>$surname,
          'role'=>$role,'institution'=>$institution
                                       
                    ]); 
 
         return redirect()->back()->with('success','Author successfully Added'); 
          }else{
            return redirect()->back();
        }  
    }

     public function AuthorAdd($p_id)
    {

               if(Auth::check()){
            $c = DB::table('centres')->get();
           
            return view('addauthor',  compact('p_id'))->with(['c'=>$c]);
        }else{
            return redirect()->back();
        }
  
    }
    public function AuthorAdmin($p_id)
    {

               if(Auth::check()){
            $c = DB::table('centres')->get();
           
            return view('addadminauthor',  compact('p_id'))->with(['c'=>$c]);
        }else{
            return redirect()->back();
        }
  
    }
    // Setting ends..............................................


    //Trash.....................................

public function ShowTrash()
    {

               if(Auth::check()){
            $text = DB::table('publication')->where('status','approved')
                                            ->where('level', '!=',  0)
                                            ->orderBy('approvedDate','asc')
                                            ->limit(10)
                                            ->select('p_id','citation')
                                            ->paginate(10);
                                        
            $pubs = DB::table('publication')->where('status','approved')
                                             ->where('level', '!=',  0)
                                            ->orderBy('uploadedDate','asc')
                                            ->select('title','p_id','journal','pub_year')
                                            ->paginate(10);
                                           
            return view('trash')->with(['pubs'=>$pubs,'text'=>$text])
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            return redirect()->back();
        }
       
    }
function ViewTrash($id){
        $uploader = DB::table('users')
                         ->where('publication.p_id',$id)
                        ->join('publication', 'users.id', '=', 'publication.uploader' )
                        
                        ->first();
        $pubs =  DB::table('publication')
                   ->where('publication.p_id',$id)
                   ->join('publication_types', 'publication.pub_type', '=', 'publication_types.id')
                   ->leftjoin('research_area', 'publication.researchArea', '=', 'research_area.id')
                   ->first();
        $nauthors = DB::table('authors')
                            ->where('authors.p_id', $id)                         
                            ->get();

          $authors = DB::table('authors')
                                                
                            ->get();

        return view('restore')
                ->with(['pubs'=>$pubs,'nauthors'=>$nauthors,'uploader'=>$uploader, 'authors'=>$authors]);

    }
//Edit trash
    function EditTrash(Request $request)
    {
        $id = $request->id;
        $pub_year = $request->pub_year;
        $abstract = $request->abstract;
        $title = $request->title;
        $citation = $request->citation;
        DB::table('publication')->where('p_id',$id)->update(['level' => 0,'pub_year'=>$pub_year, 'title'=>$title, 'abstract'=>$abstract, 'citation'=>$citation]);
        return redirect()->back()->with('success','Publication successfully Restored');
    }

    // End of 
// Show author
function showauthor($au_id){
     
        $nauthors = DB::table('authors')
                            ->where('authors.au_id', $au_id)                         
                            ->get();

          
        return view('author')
                ->with(['nauthors'=>$nauthors]);

    }  

function viewAuthor($au_id){
     $nauthors = DB::table('authors')
                            ->where('authors.au_id', $au_id)                         
                            ->get();

          
        return view('authors')
                ->with(['nauthors'=>$nauthors]);

}

    //Edit Author
    function Editauthor(Request $request)
    {
        $au_id = $request->au_id;
        $firstname = $request->firstname;
        $middlename = $request->middlename;
        $surname = $request->surname;
        $role = $request->role;
        DB::table('authors')->where('au_id',$au_id)->update(['firstname'=>$firstname, 'middlename'=>$middlename, 'surname'=>$surname, 'role'=>$role]);
        return redirect()->back()->with('success','Author successfully Updated');
    } 



    


       function uploadPubl(){
        if(Auth::check()){
        $c = DB::table('centres')->get();
        $pTypes = DB::table('publication_types')->get();
        $area = DB::table('research_area')->get();
        $text = DB::table('publication')
                ->orderBy('pub_year','desc')
                ->limit(6)
                ->select('title','pub_year')->get();
        return view('add')->with(['text'=>$text,'cents'=>$c, 'pubTypes'=>$pTypes,'area'=>$area]);
        } else{
            return redirect()->back();
        }
    }
}