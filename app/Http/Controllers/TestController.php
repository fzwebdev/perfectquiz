<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Subject;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function showSubjectTest($subjectId)
    {
      // get user data
      $profiles = DB::table('profiles')
        ->join('users', 'users.id', '=', 'profiles.user_id')
        ->where('users.id', '=', Auth::user()->id)
        ->get();

        // get subject chapters
      $chapters = DB::table('mstchapter')
        ->join('subjects', 'subjects.id', '=', 'mstchapter.subjectID')
        ->where('mstchapter.classID', '=', $profiles[0]->classID)
        ->where('mstchapter.subjectID', '=', $subjectId)
        ->get();
        // return $chapters;
      // get subject for user class
      $subjects = Subject::where('classID', 'like',  '%' . $profiles[0]->classID .'%')
                     ->get();

      return view('test',compact('subjects','profiles','chapters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createTestPage(Request $request)
    {
      // get random 20 questions using class subject and chapters

      $questions = DB::table('mstcompetitiveqb')
        ->select("mstcompetitiveqb.questionID")
        ->orderBy(DB::raw('RAND()'))
        ->take(20)
        ->whereIn('chapterID', $request->input('subjectChapter'))
        ->where('classID',  $request->input('classID'))
        ->where('subjectID', $request->input('subjectID'))
        ->get();

        foreach ($questions as $que) {
          $queArray[] =  $que->questionID;
        }
        //  echo implode(",",$queArray);
        //inserting data to tblquestionset afetr get random questions

        $queSetId = DB::table('tblquestionset')->insertGetId([
          "qSetCode" => Str::random(10),
          "classID" => $request->input('classID'),
          "subjectID" => $request->input('subjectID'),
          "qSetName" => 'p20_'.$request->input('subjectCode').'_'.$request->input('classID').'_'.time(),
          "qSetSelectedQuestion" => implode(",",$queArray),
          "userRefID" => Auth::user()->id,
          "attemptStatus" => 1,
          "status" => 1
        ]);

        if(!empty($queSetId)){
          $getQuestionSet = DB::table('tblquestionset')
            ->select("tblquestionset.*")
            ->where('qSetID',  $queSetId)
            ->get();
          $getQuestionForTest = DB::table('mstcompetitiveqb')
            ->select("mstcompetitiveqb.*")
            // ->orderBy(DB::raw('RAND()'))
            // ->take(20)
            ->whereIn('questionID', explode(",",$getQuestionSet[0]->qSetSelectedQuestion))
            ->where('classID',  $getQuestionSet[0]->classID)
            ->where('subjectID', $getQuestionSet[0]->subjectID)
            //->get()
            ->paginate(2);
            // if(count($getQuestionForTest) > 0){
            //   $i = 1;
            //   foreach ($getQuestionForTest as $questionForTest) {
            //
            //     //echo "<pre>";
            //     // print_r($questionForTest);
            //     echo "<b>Que</b>".$i."  ".$questionForTest->questionPart1."<br><br>";
            //     echo "<b>Option 1</b>   "." ".$questionForTest->optionText1."<br>";
            //     echo "<b>Option 2</b>   "." ".$questionForTest->optionText2."<br>";
            //     echo "<b>Option 3</b>   "." ".$questionForTest->optionText3."<br>";
            //     echo "<b>Option 4</b>   "." ".$questionForTest->optionText4."<br><br>";
            //     echo "<hr>";
            //     $i++;
            //   }
            // }else{
            //   echo "Not Found";
            // }
            return view('showTest',compact('getQuestionForTest'));
        }else{
          echo "Not insert";
        }
        //die();
    }

    // function fetch_data(Request $request)
    // {
    //  if($request->ajax())
    //  {
    //   $data = DB::table('posts')->paginate(5);
    //   return view('pagination_data', compact('data'))->render();
    //  }
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }
    public function FunctionName($value='')
    {
      // code...
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
