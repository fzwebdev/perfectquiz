
@if($getQuestionForTest->count() > 0)
  <!-- {{$selected}} -->
  @foreach ($getQuestionForTest as $questionForTest)

  <input type="hidden" name="questionID" id="questionID" value="{{$questionForTest->questionID}}">
  <input type="hidden" name="marks" id="marks" value="1">
  <input type="hidden" name="selectedId" value="{{$selected}}" id="selectedId">
    <span>
      <p class="question_style p-2 h5" style="">
        <input type="hidden" name="questionID" value="{{$questionForTest->questionID}}">
        <b class="text-danger p-2" style="">Question.&nbsp;&nbsp;{{ $getQuestionForTest->currentPage() }} </b>&nbsp;&nbsp; <span>{!!$questionForTest->questionPart1 !!}</span></p>

    </span>
    <div class="question_style2"></div>
    <div class="question_style2"></div>
    <input type="hidden" value="{{$questionForTest->answerID}}" id="answer">
    @if($questionForTest->subActivityName === 'MCQ')
    <div class="col-md-6 custom-control custom-radio float-left">
      <input type="radio" name="Competitive" value="1" id="opt1" class="custom-control-input">
        <label class="custom-control-label" for="opt1">
          {!!$questionForTest->optionText1 !!}
        </label>
    </div>
    <div class="col-md-6 custom-control custom-radio float-left">
      <input type="radio" name="Competitive" value="2" id="opt2" class="custom-control-input">
        <label class="custom-control-label" for="opt2">
          {!!$questionForTest->optionText2 !!}
        </label>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6 custom-control custom-radio float-left">
      <input type="radio" name="Competitive" value="3" id="opt3" class="custom-control-input">
        <label class="custom-control-label" for="opt3">
          {!!$questionForTest->optionText3 !!}
        </label>
    </div>
    <div class="col-md-6 custom-control custom-radio float-left">
      <input type="radio" name="Competitive" value="4" id="opt4" class="custom-control-input">
        <label class="custom-control-label" for="opt4">
          {!!$questionForTest->optionText4 !!}
        </label>
    </div>
    <div class="clearfix"></div>
    @elseif ($questionForTest->subActivityName === 'FILLUP')
    <div class="clearfix"></div>
    <div class="col-md-12 mb-4" id="fillup">
      @php
      $inputfield = "<input type='text' name='fill[]'  class='form-control' >";
       echo str_replace('~__~', $inputfield , $questionForTest->optionText1)  @endphp
    </div>

    @else
      I don't have any records!
    @endif
  @endforeach
@endif
<div align="left" id="pagination_link" style="margin:50px 0px;">
  {{ $getQuestionForTest->links() }}
</div>
