<?php
 
namespace NimrPublication\Http\Controllers;
 
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Nimr_Publications\User;
 
class UsersController extends Controller
{
    public function index()
    {   
        $users = User::paginate(10);
        return view('users',$users);
    }
   
}