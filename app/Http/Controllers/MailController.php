<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
   public function basic_email() {
      $data = array('name'=>"Nimr Publication");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('alicejonathan8@gmail.com', 'Nimr Publication')->subject
            ('New Publication have been uploaded');
         $message->from('nimrpublication@gmail.com','Nimr Publication');
      });

       $pubs = DB::table('publication')
                ->select(DB::raw('count(*) as publications1'))
              
                ->where('publication.status','=','approved')
                ->get();

            $c = DB::table('publication')
                
                ->get();
      return view('add')->with(['pubs'=>$pubs, 'c'=>$c]);
   }
   public function html_email() {
      $data = array('name'=>"Nimr Publication");
      Mail::send('mail', $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email() {
      $data = array('name'=>"Nimr Publication");
      Mail::send('mail', $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}