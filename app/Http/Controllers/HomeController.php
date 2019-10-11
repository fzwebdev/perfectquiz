<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\View;
use App\User;
use App\Profile;
use App\Subject;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $profiles = DB::table('profiles')
        ->join('users', 'users.id', '=', 'profiles.user_id')
        ->where('users.id', '=', Auth::user()->id)
        ->get();

        $subjects = Subject::where('classID', 'like',  '%' . $profiles[0]->classID .'%')
                       ->get();
       //              //dd($subjects);

        return view('home', compact('subjects','profiles'));
    }

    public function showChild(Request $request)
    {
      $subjectChild = DB::table('parent_subject')
        ->join('subjects', 'subjects.id', '=', 'parent_subject.subject_id')
        ->where('parent_subject.parent_id', '=', $request->name)
        ->get();
      return $subjectChild;
    }
}
