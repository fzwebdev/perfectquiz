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
  background-color: #fff !important;
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
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item "><a class="text-primary" href="{{route('home')}}"><b>Give another test</b></a></li>
              </ol>
            </nav>
            <div class="card shadow mb-4" style="width:100%;padding:20px;">
              <div class="card-header py-3">
                <h4 class="mb-3 font-weight-bold text-primary text-center">All attempted test</h6>
              </div>
              <div class="card">
                <div class="table-responsive" style="" id="reportTable">
                  <table class="table table-bordered table-striped display nowrap" id="report-table" cellspacing="0" style="">
                    <thead>
                      <tr>
              					<th>S.N.</th>
              					<th>Test Name</th>
                        <th>Class</th>
                        <th>Subject</th>
              					<th>Date</th>
              					<th>Attempt Status</th>
                        <th>Action</th>
              				</tr>
                    </thead>
                    <tbody>
              				@php ($i=1) @endphp
              					@foreach ($getallTest as $getall)
              				<tr>
              					<td>{{$i}}</td>
              					<td>{{$getall->qSetName}}</td>
                        <td>{{$getall->classID}}</td>
              					<td>{{$getall->subjectName}}</td>
              					<td>{{$getall->dateOfAttempt}}</td>
              					<td>@if($getall->attemptStatus == 1)<span class="badge badge-success">Attempted</span>@else <span class="badge badge-warning">Not Attempted</span> @endif</td>
                        <td> <a href="{{route('test.showReport', $getall->qSetID)}}"><span class="badge badge-success">View Report</span></a> </td>
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
    <div class="row card"> <div class="card-body">\
    <div class="col-md-12 ">\
    <p class="text-justify"><span class="text-primary h4 text-bold">Question :</span> '+result[0].questionPart1+'</p>\
    </div>\
    <div class="col-md-6 float-left">\
    <p class="text-justify"><span class="text-danger h4 text-bold">(a) :</span> '+result[0].optionText1+'</p>\
    </div>\
    <div class="col-md-6 float-left">\
    <p class="text-justify"><span class="text-danger h4 text-bold">(b) :</span> '+result[0].optionText2+'</p>\
    </div>\
    <div class="col-md-6 float-left">\
    <p class="text-justify"><span class="text-danger h4 text-bold">(c) :</span> '+result[0].optionText3+'</p>\
    </div>\
    <div class="col-md-6 float-left">\
    <p class="text-justify"><span class="text-danger h4 text-bold">(d) :</span> '+result[0].optionText4+'</p>\
    </div>\
    </div>\
    </div>';
      //console.log(val);

    html += '</div></div>';
    document.getElementById("show_Subject_child").innerHTML=html;
  }
</script>
@endsection
