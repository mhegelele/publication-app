<?php

namespace NimrPublication\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use NimrPublication\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Redirect;
class DataCommunication extends Controller
{
    function addPublications(Request $request){
        $fname = $request->author;
        $mname = $request->author;
        $sname = $request->author;
         // $issue = $request->issue;
        $initials = $request->autInitials;
        $autship = $request->autShip;
        $inst = $request->autInst;
        for($x = 0; $x<sizeof($snames);$x++){
            echo $snames[$x]." - ".$initials[$x]." - ".$autship[$x]." - ".$inst[$x]."<br>";
        }
    }
    function addPublication(Request $request){
   		$data = Input::except(array('_token','submit','fname','mname','sname','authShip','autInst','otherResearchArea','researchArea'));
        $fname = $request->fname;
        $mname = $request->mname;
        $sname = $request->sname;
        $inst = $request->autInst;
        // $abstract = nl2br($request->abstract);
        $authship = $request->authShip;
        // $issue = $request->$issue;
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
      //       'citation'=>'required',
    		// 'pub_year'=>'required',
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
                    'role'=>$authship[$x],
                    'institution'=>$inst[$x]
                   
                    ]);
                }else{
                    echo "Error Occured";
                }

               $data = array('name'=>"Nimr Publication Administrator");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('ndekya@yahoo.com','nimrpublication@gmail.com', 'Nimr Publication')->subject
            ('New Publication have been uploaded');
         $message->from('nimrpublication@gmail.com','Nimr Publication');
      });
   
            }
    		return redirect()->back()->with('success','you have succesful uploaded publication');	
    	}
    }
    function approve(Request $request){
        $id = $request->id;
        $user = Auth::id();
        $date = date("Y-m-d");
        DB::table('publication')->where('p_id',$id)->update(['status' => 'approved','approvedBy'=>$user,'approvedDate'=>$date]);
        return redirect()->back()->with('success','Publication is now Approved');
    }
}
