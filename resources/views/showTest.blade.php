@extends('layouts.app')
@section('content')
<div id="wrapper">
<style>
#wrapper #content-wrapper {
    background-color: transparent !important;
}
.py-4{
  padding: 0 !important;
}
#app{
  padding: 0 !important;
}
</style>
<style type="text/css">
body{
	background: #50C9C3;
	background: -webkit-linear-gradient(to right, #96DEDA, #50C9C3);
	background: linear-gradient(to right, #96DEDA, #50C9C3);
}

.exam_status{
	font-weight:600 !important;
	/* margin-top: 70px; */
  margin-bottom: 40px;
	background: #056ea7;
	-webkit-box-shadow: -1px 2px 24px 0px rgb(167, 255, 206);
	-moz-box-shadow: -1px 2px 24px 0px rgb(167, 255, 206);
	box-shadow: -1px 2px 24px 0px rgb(167, 255, 206);
	/* border:2px solid #fff; */
}

.welcome{
	font-size: 20px;
	color:#fff;

}
.examHeading{
	font-size: 26px;
	text-align: center;
	/*background: #056ea7;*/
	color:#fff;
}
.clsAndSub-container{
	font-size: 22px;
	/*background: #056ea7;*/
	color:#fff;
}
.container.test-container {
	font-size: 20px;
	/* width:75%; */
	margin: auto;
	box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12) !important;
	border: 2px solid #fff;
	background: #A1FFCE;
	background: -webkit-linear-gradient(to right, #FAFFD1, #A1FFCE);
	background: linear-gradient(to right, #FAFFD1, #A1FFCE);
	border-radius:10px;
	margin-top: 10px;

}
.quesNo{
	width:10%;
	height:100%;
	float: left;
	font-weight: bold;

}
.question_style{
	font-weight: bold;
	width:90%;
	/*display:inline;*/
	float: left;
}
.question_style2{
	font-weight: bold;
	margin-left: 10%;
}
.custom-control{
	padding-left: 10%;
}
.custom-control-label {
	position: relative;
	margin-top: 13px;
	padding-left: 45px;
	padding-top: 4px;
	font-size: 20px;
	font-weight: normal;

}
.custom-control-label::before {
  	top:0.7rem;
  }
.custom-control-label::after{
  	top:0.7rem;
}
.custom-control-label::before{
  	background: #f2b322;
  	width:1.5rem;
  	height:1.5rem;
}
.custom-control-label::after{
	width:1.5rem;
	height:1.5rem;
}
.custom-control-label:hover::before{
  	background: #050441;
}
#submitBtn{
	float: right;
	margin-right: 50px;
	margin-top: 10px;
  	font-size: 24px;
}
p{
	margin:0px;
	padding: 0px;
}
@media only screen and (max-width: 1100px){

	.quesNo{
		width:15%;
	}
	.question_style{
		width:85%;
	}
	.question_style2{
		font-weight: bold;
		margin-left: 15%;
	}
	.custom-control{
		padding-left: 15%;
	}
}
@media only screen and (max-width: 992px){
	.exam_status{
		font-weight:550 !important;
	}

	.welcome{
		font-size: 18px;
	}
	.examHeading{
		font-size: 24px;
	}
	.clsAndSub-container{
		font-size: 20px;
	}
	.container.test-container{
		font-size: 18px;

	}

	.custom-control-label {
  		font-size: 18px;
	}
	#submitBtn{
  		font-size: 22px;
	}
}

@media only screen and (max-width: 768px){
	.exam_status{
		font-weight:500 !important;
	}
	.welcome{
		font-size: 16px;
	}
	.examHeading{
		font-size: 20px;
	}
	.clsAndSub-container{
		font-size: 18px;
	}
	.container.test-container{
		font-size: 18px;
		width:100%;
	}
	.pagination{
		font-size: 15px;
	}
	.custom-control-label {
  		font-size: 18px;
	}
	.quesNo{
		width:20%;
	}
	.question_style{
	 	width:80%;
	}
	.question_style2{
		margin-left: 20%;
	}
	.custom-control{
		padding-left: 20%;
	}
	#submitBtn{
  		font-size: 18px;
	}
	.page-link{
		padding: 0.25rem 0.50rem;
	}

}

@media only screen and (max-width: 576px){
	.container.test-container{
		width:100%;
		margin: auto;
		box-shadow: none;
		border: none;
		background: #A1FFCE;
		background: -webkit-linear-gradient(to right, #FAFFD1, #A1FFCE);
		background: linear-gradient(to right, #FAFFD1, #A1FFCE);
		border-radius:0;
		margin-top: 0px;
	}
	#submitBtn{
		margin-right: 20px;
	}
	#pagination_link{
		margin-left:20px;
	}
}

@media only screen and (max-width: 420px){

}
#fillup .form-control{
  width: 200px;
  display: inline;
  margin-left: 10px;
  margin-right: 10px;
}
</style>
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
      @include('layouts.navbar')
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="fluid-container">
        <div id="quesTimer" style="display:none;"></div>
    	<input type="hidden" name="userID" id="userID" value="{{$getQuestionSet[0]->userRefID}}">
    	<input type="hidden" name="qSet" value="{{$getQuestionSet[0]->qSetCode}}" id="qSet">
    	<input type="hidden" name="qSetId" value="{{$getQuestionSet[0]->qSetID}}" id="qSetId">
    	<input type="hidden" name="question_ids" id="question_ids" value="{{$getQuestionSet[0]->qSetSelectedQuestion}}">
    	<input type="hidden" name="correctAnswer_ids" id="correctAnswer_ids" value="{{$getQuestionSet[0]->qSetSelectedQuestion}}">
    	<div class="exam_status">
        <div class="clsAndSub-container">
    			<div class="float-left ml-5">Welcome: <span id="studentName">{{ $profiles[0]->name }}</span></div>
    			<div class="float-right mr-5"><span id="time"></span></div>
    			<div class="clearfix"></div>
    		</div>
    		<div class="clsAndSub-container">
    			<div class="float-left ml-5">Class: <span id="class">{{ $profiles[0]->classID }}</span></div>
    			<div class="float-right mr-5">Subject: <span id="subject">{{ $getQuestionForTest[0]->subjectName }}</span></div>
    			<div class="clearfix"></div>
    		</div>
    	</div>
    	<div class="container test-container pt-4 pb-4">

    		<div id="quesWindow" class="">
    		  <div class="" id="question">
            @include('fetchQuestion')
          </div>
    		</div>
    	</div>
    	<input type="button" name="submit" value="Submit" class="btn btn-primary btn-sm" id="submitBtn" onclick="if(confirm('Are you sure, you want to submit the test ?')) { saveAttemptedQuestionsInDatabase();}">
    	<div class="clearfix"></div>
    </div>

      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    @include('layouts.footer')


    <!-- End of Footer -->
  </div>
  <!-- End of Content Wrapper -->
</div>
<style>
.swal2-popup {
  background: #6f16869e !important;
  width: 50em !important;
}
#show_Subject_child{
  cursor: pointer;
}

</style>
<script>

  $(document).ready(function(){
    individualQuestionTimer();
      $(document).on('click','.pagination a', function(event) {
      //  alert(event);
          event.preventDefault();
          var questId;
          questId = document.getElementById('questionID').value;
  	        saveAnswer(questId);
            clearInterval(timer);
            individualQuestionTimer();
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page);
      });
      function fetch_data(page) {
          $('#question').html("<img src='{{asset('images/loading.gif')}}' class='img-thumbnail' style='background-color:transparent;border:none; margin:auto auto'>");
          $.ajax({
              url:"?page="+page,
              success:function(data) {
                  $('#question').html(data);
              },
              error:function(err) {
                  console.log(err.responseText);
              }
          });
      }
  });


  examTimer('20:00');

  function examTimer(q){
  	totime=q.split(":");
  	var m =	parseInt(totime[0]);
  	var s =	parseInt(totime[1]);
  	var t = (m*60)+s;
  	//alert(m+" "+s+" = "+t);
  	var clock =	setInterval(function(){
  		if(s===0){
  			s = 59;
  			if(m===0){
  				m=59;

  			}else{
  				m = m-1;
  			}
  		}else{
  			s=s-1;
  		}
  	var st= (s<10)? '0'+s : s;
  	var mt= (m<10)? '0'+m : m;

  	document.getElementById('time').innerHTML = mt+':'+st;

  	  	if (t===1)
  	  	{
  		  clearInterval(clock);
  		  saveAttemptedQuestionsInDatabase();
  	  	}
  	  	t--;
  	}, 1000);

  }

  class Question{
  	constructor(qSetID,questionID,qSequence,questionMarks,getMarks,correctAnswerID,selectedAnswerID,totalTimeTaken,attemptStatus,isCorrect,userRefID,status){
  		this.qSetID         	= qSetID;
  		this.questionID     	= questionID;
  		this.qSequence          = qSequence;
  		this.questionMarks  	= questionMarks;
  		this.getMarks       	= getMarks;
  		this.correctAnswerID  	= correctAnswerID;
  		this.selectedAnswerID 	= selectedAnswerID;
  		this.totalTimeTaken 	= totalTimeTaken;
  		this.attemptStatus  	= attemptStatus;
  		this.isCorrect      	= isCorrect;
  		this.userRefID      	= userRefID;
  		this.status         	= status;

  	}
  }

setTimeout(function(){
	initializeObject();
  alert('s');
  console.log(attemptedQuestions);
},1000);


function initializeObject(){
	var question_ids=document.getElementById('question_ids').value.split(',');
	var correctAnswer_ids=document.getElementById('correctAnswer_ids').value.split(',');
	//console.log(correctAnswer_ids);
	var userRefID = document.getElementById('userID').value;
	question_ids.forEach(function(questionID,i){
		attemptedQuestions[questionID] = new Question(qSetID,questionID,(i+1),1,0,correctAnswer_ids[i],0,0,0,0,userRefID,1);
	});
}

var correctAns=0;
var attemptedQuestions={};
var marks = 0;
var count =0;
var isCorrect=0;
var getMarks=0;
var attemptStatus=0;
var dataArr=[];
var qSequence =0;
var arrayNum;
var qSetID = document.getElementById('qSetId').value;

function saveAnswer(questionID){
	//alert(page);
  alert(questionID);
  var qSetId = document.getElementById('qSetId').value;
	var userRefID = document.getElementById('userID').value;
	var timeTaken = document.getElementById('quesTimer').innerHTML;
	var questionMarks = document.getElementById('marks').value;
	var correctOption = document.getElementById('answer').value;
	var selectedOption = $("input:radio[name=Competitive]:checked").val();
	 selectedOption = selectedOption?selectedOption:0;
  //alert(timeTaken);
	if(correctOption===selectedOption){
		getMarks=questionMarks;
		isCorrect=1;
		attemptStatus=1;
		dataArr =[qSetID,questionID,qSequence,questionMarks,getMarks,correctOption,selectedOption,timeTaken,attemptStatus,isCorrect,userRefID,1];
		arrayNum = 0
		for(var data in attemptedQuestions[questionID]){

			if(data==='qSequence'){

			} else {
				attemptedQuestions[questionID][data] = dataArr[arrayNum];

			}
			arrayNum++;
		}
		correctAns++;
		count++;


	}else{
// alert(selectedOption);
		if(selectedOption===0){
			attemptStatus=0;
		}else{
			attemptStatus=1;
		}
		getMarks=0;
		isCorrect=0;
		arrayNum = 0
		dataArr =[qSetID,questionID,qSequence,questionMarks,getMarks,correctOption,selectedOption,timeTaken,attemptStatus,isCorrect,userRefID,1];
    //console.log(dataArr);
    //alert(attemptedQuestions[questionID]);
		for(var data in attemptedQuestions[questionID]){
      //alert(attemptedQuestions[questionID]);
			if(data==='qSequence'){

			} else {

				attemptedQuestions[questionID][data] = dataArr[arrayNum];

        //console.log(dataArr[arrayNum]);
			}
			arrayNum++;
		}

	}
	count++;
	console.log(attemptedQuestions);
  $.ajaxSetup({
    headers: {
        'X-XSRF-TOKEN': decodeURIComponent(/XSRF-Token=([^;]*)/ig.exec(document.cookie)[1])
    }
  });
  $.ajax({
	   url:"{{route('test.saveAttemptedQuestionsInFile')}}",
	   method:"post",
	   data:{attemptedQuestions:attemptedQuestions,qSetId:qSetId},
     success:function(data) {
         console.log(data)
     },
     error:function(err) {
         console.log(err);
     }
	  });
}

var timer;
function individualQuestionTimer(){
	var seconds = 0;
	var minutes =0;

	timer=setInterval(function () {
		if(seconds===60){
			minutes++;
		  	seconds=0;
		  }else{
		  	seconds++;
		  }
	document.getElementById('quesTimer').innerHTML="0"+":"+minutes+":"+seconds;

	}, 1000);


}
</script>
@endsection
