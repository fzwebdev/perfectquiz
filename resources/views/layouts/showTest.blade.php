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
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
      @include('layouts.navbar')
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item "><a class="text-primary" href="{{route('home')}}">Subject</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$chapters[0]->subjectName}}</li>
          </ol>
        </nav>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <div class="alert alert-primary col-md-12" style="background-color:transparent;border:none">
            <h1 class="h3 mb-0 welcome-note">Select chapters for test</h1><br>
            <p class="mb-0 h5 welcome-note">A pool of objective type questions for online attempt with spontaneous answer and result</p>
          </div>
        </div>


        <!-- Content Row -->
        <div class="row">
            @if($getQuestionForTest->count() > 0)
            @foreach ($getQuestionForTest as $questionForTest)
            {{$questionForTest->questionPart1 }}
            {{$questionForTest->optionText1 }}
            {{$questionForTest->optionText2 }}
            {{$questionForTest->optionText3 }}
            {{$questionForTest->optionText4 }}
            @endforeach
            @endif
            {!! $data->links() !!}
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    @include('layouts.footer')

    <div id="show_Subject_child" class="row" style="display:none;">

    </div>
    <form id="go_to_test" action="" method="POST" style="display: none;">
    {{ csrf_field() }}
    </form>

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

  function showChild(subjectId,subjectName) {
  //  alert(subjectName);
    jQuery.ajax({
      url: "showChild",
      method: 'get',
      data: { name:subjectId },
      success: function(result){
         if(result.length === 0){
           var url = '{{ route("test.subject", ":id") }}';
           url = url.replace(':id', subjectId);
           //console.log(url);
           $("#go_to_test").attr("action",url);
           //document.getElementById('go_to_test').submit();
           window.location.href = url;
         }else{
           viewChild(result,subjectName);
           Swal.fire({
             html: $('#show_Subject_child').html(),
             showConfirmButton: false,
           });
         }
      },
      error: function(error){
         console.log(error.responseText);
      }
    });
  }
  function viewChild(result,subjectName){

  var r = "";
    var html ='';
    html += '<div class="container-fluid">\
    <div class="row">\
    <div class="col-md-12 text-center mb-4">\
      <h1 class="h3 mb-0 text-center" style="color:#fff;">'+subjectName+'</h1>\
    </div>';
    jQuery.each( result, function( i, val ){
      console.log(val);
      html += '<div class="col-md-6 mb-4">\
        <div class="card border-left-danger shadow h-100 py-2">\
          <div class="card-body">\
            <div class="row no-gutters align-items-center">\
              <div class="col mr-2">\
                <div class="h6  font-weight-normal text-gray-800 text-uppercase mb-1">'+val.subjectName+'</div>\
                <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> -->\
              </div>\
              <div class="col-auto">\
                <i class="fas fa-calendar fa-2x text-gray-300"></i>\
              </div>\
            </div>\
          </div>\
        </div>\
      </div>';
      //console.log(val);
    });
    html += '</div></div>';
    document.getElementById("show_Subject_child").innerHTML=html;
  }
</script>
@endsection
