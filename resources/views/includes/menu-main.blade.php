<div class="menu-header">
    <a href="#" data-menu="menu-main" class="border-right-0" style="border-color: transparent;"></a>
    <a href="#"  class="border-right-0" style="border-color: transparent;"></a>
    <a href="#"  class="border-right-0" style="border-color: transparent;"></a>
    <a href="#" class="border-right-0" style="border-color: transparent;"></a>
    <a href="#" class="close-menu border-right-0" style="border-color: transparent;"><i class="fa font-12 color-red-dark fa-times"></i></a>
</div>

<div class="menu-logo text-center">
    <a href="#"><img class="rounded-circle bg-highlight" width="80" src="{{ url('public/images/avatars/5s.png') }}"></a>
   @if(Auth::guard('customer')->user())
    <h1 class="pt-3 font-800 font-28 text-uppercase">{{Auth::guard('customer')->user()->username}}</h1>
    @else
    <h1 class="pt-3 font-800 font-28 text-uppercase">No name</h1>
    <p class="font-11 mt-n2">Put some <span class="color-highlight">Captions</span> </p>
    @endif
</div>

<div class="menu-items mb-4">
    
    <a id="nav-welcome" href="{{ route('dashboard')}}">
        <i data-feather="home" data-feather-line="1" data-feather-size="16" data-feather-color="blue-dark" data-feather-bg="blue-fade-light"></i>
        <span>Home Page</span>
        <i class="fa fa-circle"></i>
    </a>
    <a id="nav-starters" href="{{ route('mytickets')}}">
        <i data-feather="star" data-feather-line="1" data-feather-size="16" data-feather-color="yellow-dark" data-feather-bg="yellow-fade-light"></i>
        <span>My Complaints</span>
        <i class="fa fa-circle"></i>
    </a>
    <a id="nav-media" href="{{ route('category')}}">
        <i data-feather="image" data-feather-line="1" data-feather-size="16" data-feather-color="green-dark" data-feather-bg="green-fade-light"></i>
        <span>Raise a Complaint</span>
        <i class="fa fa-circle"></i>
    </a>
     @if(!Auth::guard('customer')->user())
    <a id="nav-features" href="{{ route('register')}}">
        <i data-feather="heart" data-feather-line="1" data-feather-size="16" data-feather-color="red-dark" data-feather-bg="red-fade-light"></i>
        <span>Registration</span>
        <i class="fa fa-circle"></i>
    </a>
    <a id="nav-pages" href="{{ route('login')}}">
        <i data-feather="file" data-feather-line="1" data-feather-size="16" data-feather-color="brown-dark" data-feather-bg="brown-fade-light"></i>
        <span>Login</span>
        <i class="fa fa-circle"></i>
    </a>
    @endif
    <a id="nav-pages" href="{{ route('maintanence')}}">
        <i data-feather="file" data-feather-line="1" data-feather-size="16" data-feather-color="violet-dark" data-feather-bg="violet-fade-light"></i>
        <span>Basavangudi Transfo...</span>
        <i class="fa fa-circle"></i>
    </a>
    @if(Auth::guard('customer')->user())
     <a id="nav-pages" href="{{ route('logout')}}">
        <i data-feather="file" data-feather-line="1" data-feather-size="16" data-feather-color="orange-dark" data-feather-bg="orange-fade-light"></i>
        <span>Logout</span>
        <i class="fa fa-circle"></i>
    </a>
     @endif
    <!--<a href="#" class="close-menu">-->
    <!--    <i data-feather="x" data-feather-line="3" data-feather-size="16" data-feather-color="red-dark" data-feather-bg="red-fade-dark"></i>-->
    <!--    <span>Close</span>-->
    <!--    <i class="fa fa-circle"></i>-->
    <!--</a>-->
</div>

<div class="text-center">
</div>
