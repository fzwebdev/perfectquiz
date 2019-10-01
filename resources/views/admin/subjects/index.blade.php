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
          <h1 class="h3 mb-0 text-gray-800">Subject</h1>
          <a href="{{route('admin.subject.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add Subjects </a>
        </div>

        <!-- Content Row -->
        <div class="row justify-content-md-center">
          <div class="card shadow mb-4" style="width:100%;margin:0 20px">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Subjects</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="">
                  <thead>
                    <tr>
                      <th>S.N.</th>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Parent Subject</th>
                      <th>Class IDs</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($subjects)
                    @foreach($subjects as $subject)
                      <tr>
                        <td>{{$subject->id}}</td>
                        <td>{{$subject->subjectName}}</td>
                        <td>{{$subject->subjectCode}}</td>
                        <td>
                          @if($subject->childrens()->count() > 0)
                              @foreach($subject->childrens as $children)
                                  {{$children->subjectName}},
                              @endforeach
                          @else
                              <span class="text-success">{{"Parent Subject"}}</span>
                          @endif
                        </td>
                        <td>{{$subject->classID}}</td>
                        <td></td>
                      </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
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

@endsection
