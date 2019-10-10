<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

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
        ->select('mstchapter.*', 'subjects.subjectName')
        ->where('mstchapter.classID', '=', $profiles[0]->classID)
        ->where('mstchapter.subjectID', '=', $subjectId)
        ->get();
        // return $chapters;
      // get subject for user class
      $subjects = Subject::where('classID', 'like',  '%' . $profiles[0]->classID .'%')
                            ->where('id', '=', $subjectId)
                     ->get();
    // echo "<pre>";
    // print_r($subjects);
    // die();
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
        ->where('subActivityName','MCQ')
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
          //$getQuestionForTest = $this->attemptTest($queSetId);
          return redirect()->route('test.attemptTest',$queSetId);
          //return redirect()->view('test.attemptTest', $getQuestionForTest);
        }else{
          echo "Not insert";
        }
        //die();
    }

    public function attemptTest($queSetId)
    {
      $getQuestionSet = DB::table('tblquestionset')
        ->select("tblquestionset.*")
        ->where('qSetID',  $queSetId)
        ->get();
        $questionsIds = $getQuestionSet[0]->qSetSelectedQuestion;
        $questions_Ids = explode(",",$questionsIds);

      $getQuestionForTest = DB::table('mstcompetitiveqb')
        ->select("mstcompetitiveqb.*")
        ->whereIn('questionID', $questions_Ids)
        ->where('classID',  $getQuestionSet[0]->classID)
        ->where('subjectID', $getQuestionSet[0]->subjectID)
        ->orderByRaw(DB::raw("FIELD(questionID, $questionsIds)"))
        //->get()
        ->paginate(1);
        if (request()->ajax()) {
           $page = $_GET['page'];
          //die();
          $selected=0;
          $filename = Auth::user()->id.'_'.$getQuestionSet[0]->qSetID.'.json';
          if(Storage::disk('local')->exists($filename)){
             $contents = Storage::get($filename);
             $contents = json_decode($contents,true);
             // echo "<pre>";
             // print_r($contents[$questions_Ids[$page-1]]);
             // echo $contents[$questions_Ids[$page-1]]['selectedAnswerID'];
             // echo "</pre>";
            if(array_key_exists($questions_Ids[$page-1], $contents)){
             $selected = $contents[$questions_Ids[$page-1]]['selectedAnswerID'];
             }else{
              $selected = 0;
             }
           }
            return \View::make('fetchQuestion', array('getQuestionForTest' => $getQuestionForTest, 'getQuestionSet' => $getQuestionSet, 'selected' => $selected))->render();
        }


        return \View::make('showTest', array('getQuestionForTest' => $getQuestionForTest, 'getQuestionSet' => $getQuestionSet, 'selected' => 0 ));

    }

    public function saveAttemptedQuestionsInFile(Request $request){
      $attemptedQuestionTemp = json_encode($request->input('attemptedQuestions'));
      $filename = Auth::user()->id.'_'.$request->input('qSetId').'.json';
  		if ( !Storage::put( $filename, $attemptedQuestionTemp)){
  		    echo 'Unable to write the file';
  		}
  		else{
  		    echo 'File written!';
  		}
   	}



    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $filename = Auth::user()->id.'_'.$request->input('qSetId').'.json';
      if(Storage::disk('local')->exists($filename)){
         $contents = Storage::get($filename);
         $contents = json_decode($contents,true);
          if(DB::table('tblattemptquestion')->insert($contents)){
            Storage::delete($filename);
          return $request->input('qSetId');
          }
       }
    }

    public function showReport($queSetId)
    {
      $getReportOfTest = DB::table('tblattemptquestion')
        ->join('mstcompetitiveqb', 'tblattemptquestion.questionID', '=', 'mstcompetitiveqb.questionID')
        ->select('tblattemptquestion.*', 'mstcompetitiveqb.optionText1', 'mstcompetitiveqb.optionText2','mstcompetitiveqb.optionText3', 'mstcompetitiveqb.optionText4','mstcompetitiveqb.answerText')
        ->where('qSetID',  $queSetId)
        ->orderBy('qSequence', 'asc')
        ->get();
        // echo "<pre>";
        // print_r($getReportOfTest);
        // die();
        $reportStatus = DB::table('tblattemptquestion')
        ->select(DB::raw('sum(getMarks) as total_marks'), DB::raw("SEC_TO_TIME( SUM( TIME_TO_SEC( `totalTimeTaken` ) ) ) AS total_time "), DB::raw('count(attemptStatus) as total_attempts', [1]))
        ->where('qSetID',  $queSetId)
        //->groupBy(DB::raw('YEAR(date)') )
        ->get();
        // print_r($reportStatus);
        // die();
        return \View::make('showReport', array('getReportOfTest' => $getReportOfTest, 'reportStatus'=>$reportStatus));
    }

    public function getQuestion(Request $request)
    {
      $getQuestionForTest = DB::table('mstcompetitiveqb')
        ->select("mstcompetitiveqb.*")
        ->where('questionID', '=', $request->name)
        ->get();

        return $getQuestionForTest;
      // echo "Yes";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
