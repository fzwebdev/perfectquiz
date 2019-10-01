@extends('admin.app')
@section('content')
  <!-- Sidebar -->
@include('admin.sidebar')
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
      @include('admin.navbar')
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Add Subject</h1>
        </div>

        <!-- Content Row -->
        <div class="row justify-content-md-center">
          <div class="col-md-10">
            @if(session()->has('message'))
            <div class="alert alert-success">
              {{session('message')}}
            </div>
            @endif
            <form action="{{route('admin.subject.store')}}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                      <label for="subjectCode" class="col-form-label">{{ __('Subject Code') }}</label>
                          <input id="subjectCode" type="text" class="form-control @error('subjectCode') is-invalid @enderror" name="subjectCode" value="{{ old('subjectCode') }}"  required >
                          @error('subjectCode')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                      <label for="subjectName" class="col-form-label">{{ __('Subject Name') }}</label>
                          <input id="subjectName" type="text" class="form-control @error('subjectName') is-invalid @enderror" name="subjectName" value="{{ old('subjectName') }}"  required >
                          @error('subjectName')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="classID" class="col-form-label">{{ __('Select Class ID') }}</label>
                          <select name="classID[]" id="classID" class="form-control @error('classID') is-invalid @enderror" required multiple="multiple">
                            @for ($i = 1; $i <= 12; $i++)
                              <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                          </select>
                          @error('classID')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="parentID" class="col-form-label">{{ __('Select Parent Subject') }}</label>
                          <select name="parent_id[]" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror" multiple="multiple">
                            @if($subjects)
                              <option value="0">Top Level</option>
                              option
                              @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->subjectName}}</option>
                              @endforeach
                            @endif
                            option
                          </select>
                          @error('parent_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-primary">Add Subject</button>
                  </div>
                </div>
            </form>
          </div>
        </div>


      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Your Website 2019</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

<!-- End of Page Wrapper -->
<script>
$(document).ready(function() {
    $('#classID').select2({
        placeholder: "Select Class ID",
        allowClear: true,
    });
    $('#parent_id').select2({
        placeholder: "Select Parent Subject",
        allowClear: true,
    });
});
</script>

@endsection
