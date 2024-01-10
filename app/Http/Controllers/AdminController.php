<?php

namespace App\Http\Controllers;

use App\Models\PromptMaker;
use Illuminate\Http\Request;

 use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{

     

    public function dashboard()
    {
        return view("admin.dashboard");
    }


    public function logout()
    {
       Auth::logout();
       return view("auth.login");
    }

   public function show(){
    $data=PromptMaker::all();
    return view("adminContent.show",compact("data"));
   }
}