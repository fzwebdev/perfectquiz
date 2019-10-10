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
.img-thumbnail{
  background-color: transparent;
  border: none;
  width: 50px;
}
.swal2-popup {
  background: #fff !important;
  width: 50em !important;
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
      <div class="container-fluid">

        <!-- Page Heading -->


        <!-- Content Row -->
        <div class="row d-flex justify-content-center" style="margin-bottom:40px;">
          <div class="container">
            <div class="card shadow mb-4" style="width:100%;padding:20px;">
              <div class="card-header py-3">
                <h4 class="mb-3 font-weight-bold text-primary text-center">Your test report</h6>
                <div class="row mt-3">
                  <div class="col-md-4 m-0 font-weight-bold text-danger">Your bbtained marks : <span class="text-primary">{{$reportStatus[0]->total_marks}}/20<span></div>
                  <div class="col-md-4 m-0 font-weight-bold text-danger">Total time taken : <span class="text-primary">{{$reportStatus[0]->total_time}}/00:20:00<span></div>
                  <div class="col-md-4 m-0 font-weight-bold text-danger">Attempted question : <span class="text-primary">{{$reportStatus[0]->total_attempts}}/20</span></div>
                </div>
              </div>
              <div class="card">
                <div class="table-responsive" style="" id="reportTable">
                  <table class="table table-bordered table-striped" id="dataTable" cellspacing="0" style="">
                    <thead>
                      <tr>
              					<th>Question No.</th>
              					<th>Correct Answer</th>
              					<th>Your Answer</th>
              					<th>Time Taken</th>
              					<th>Attempt Status</th>
                        <th>Status</th>
              				</tr>
                    </thead>
                    <tbody>
              				@php ($i=1) @endphp
              					@foreach ($getReportOfTest as $getReportData)
              				<tr>
              					<td><button type="button" class="btn btn-info btn-sm" id="{{$getReportData->questionID}}" onclick="getQuestion(this.id);">{{$i}}</button></td>
              					<td>{!! $getReportData->answerText !!}</td>
              					<td>
                          @switch($getReportData->selectedAnswerID)
                            @case(1)
                                {!!$getReportData->optionText1!!}
                                @break
                            @case(2)
                                {!!$getReportData->optionText2!!}
                                @break
                            @case(3)
                                {!!$getReportData->optionText3!!}
                                @break
                            @case(4)
                                {!!$getReportData->optionText4!!}
                                @break
                            @default
                                {{""}}
                        @endswitch
                        </td>
              					<td>{{$getReportData->totalTimeTaken}}</td>
              					<td>@if($getReportData->attemptStatus == 1)<span class="badge badge-success">Attempted</span>@else <span class="badge badge-warning">Not Attempted</span> @endif</td>
                        <td>@if($getReportData->selectedAnswerID == $getReportData->correctAnswerID) <img src="{{asset('public/images/right.png')}}" class="img-thumbnail" style="border:none;">@else <img src="{{asset('public/images/wrong.png')}}" class="img-thumbnail" style="border:none;"> @endif </td>
                      </tr>
                      @php ($i++) @endphp
              				@endforeach
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    @include('layouts.footer')
    <div id="show_Subject_child" class="row" style="display:none;">

    </div>

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

  function getQuestion(id) {
    alert(id);
    var url = '{{ route("test.getQuestion", ":id") }}';
    url = url.replace(':id', id);
    jQuery.ajax({
      url: url,
      method: 'get',
      data: { name:id },
      success: function(result){
        console.log(result);
       viewChild(result);
       Swal.fire({
         html: $('#show_Subject_child').html(),
         showConfirmButton: false,
       });
      },
      error: function(error){
         console.log(error.responseText);
      }
    });
  }

  function viewChild(result){

  var r = "";
    var html ='';
    html += '\
    <div class="row">\
    <div class="col-md-12">\
    <p>'+result[0].questionPart1+'</p>\
    </div>\
    </div>';
      //console.log(val);

    html += '</div></div>';
    document.getElementById("show_Subject_child").innerHTML=html;
  }
</script>
@endsection
