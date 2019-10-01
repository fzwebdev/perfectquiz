@section('sidebar')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-text mx-3">Perfetc20</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item @if(request()->url() == route('admin.dashboard')) {{'active'}} @endif">
    <a class="nav-link" href="{{url('/admin/dashboard')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <li class="nav-item @if(request()->url() == route('admin.subject.index')) {{'active'}} @endif">
    <a class="nav-link" href="{{route('admin.subject.index')}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Subjects</span></a>
  </li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
@endsection
