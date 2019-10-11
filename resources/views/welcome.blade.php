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
.navbar{
  margin-bottom: 0px !important;
}
</style>
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <a href="{{url('/')}}">
          <img class="img-thumbnail Perfect20Logo" src="{{ asset('images/logo.png')}}" >
        </a>
        <!-- Topbar Navbar -->

        <ul class="navbar-nav ml-auto">
          <!-- Nav Item - User Information -->
          @if (Route::has('login'))
          @auth
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $profiles[0]->name }} <span class="caret"></span></span>
              <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{ url('/') }}">
                Home
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('test.all',Auth::user()->id)}}">
                All attempted test
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
              </form>
            </div>
          </li>
          @else

        @endauth
        @endif
        </ul>
      </nav>

      <!-- End of Topbar -->

      <!-- Begin Page Content -->
        <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Welcome to Perfect 20</h1>
          <p class="h4">A pool of objective type questions for online attempt with spontaneous answer and result</p>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4 mx-auto">
          @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="btn btn-block btn-lg btn-danger" href="{{ url('/home') }}">View Subject</a>
                    @else
                        <a class="btn btn-block btn-lg btn-danger" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-block btn-lg btn-danger" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class=" mx-auto mb-5 mb-lg-0 mb-lg-3">
            <p class="lead mb-0">The CBSE has proposed 20 marks objective questions in the Board paper from 2020 Examinations. Register yourself to make yourself self-sufficient. You can take a chapter test or you have the option of multiple selection of chapters of a subject. Every time you login you will get a different set of 20 questions from a pool of questions. You will get 20 minutes to attempt any test. After attempting, submit your answers and you will be given a detailed report. Your tests will be saved for your future reference and you can attempt the test again. Happy learning!!</p>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  
  <!-- Testimonials -->
  <!-- <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">What people are saying...</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
            <h5>Margaret E.</h5>
            <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
            <h5>Fred S.</h5>
            <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
            <h5>Sarah W.</h5>
            <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Call to Action -->
  <!-- <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Ready to get started? Sign up now!</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Footer -->
 <footer class="footer bg-light">
   <div class="container">
     <div class="row">
       <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
         <ul class="list-inline mb-2">
           <li class="list-inline-item">
             <a href="#">About</a>
           </li>
           <li class="list-inline-item">
             <a href="#">Contact</a>
           </li>
           <li class="list-inline-item">
             <a href="#">Terms of Use</a>
           </li>
           <li class="list-inline-item">
             <a href="#">Privacy Policy</a>
           </li>
         </ul>
       </div>
       <!-- <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
         <ul class="list-inline mb-0">
           <li class="list-inline-item mr-3">
             <a href="#">
               <i class="fab fa-facebook fa-2x fa-fw"></i>
             </a>
           </li>
           <li class="list-inline-item mr-3">
             <a href="#">
               <i class="fab fa-twitter-square fa-2x fa-fw"></i>
             </a>
           </li>
           <li class="list-inline-item">
             <a href="#">
               <i class="fab fa-instagram fa-2x fa-fw"></i>
             </a>
           </li>
         </ul>
       </div> -->
     </div>
   </div>
 </footer>
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    @include('layouts.footer')


    <!-- End of Footer -->
  </div>
  <!-- End of Content Wrapper -->
</div>


@endsection
