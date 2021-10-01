@extends('master')
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}">Laravel Guards</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
          @if(!Auth::guard('web')->check()&&!Auth::guard('admin')->check())
        <li class="nav-item ">
          <a class="nav-link" href="{{url('/login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Regsiter</a>
        </li>
        @elseif(Auth::guard('web')->check())
        <li class="nav-item ">
            <a class="nav-link">{{Auth::user()->name}}</a>
          </li>
          <li class="nav-item">
              <form action="{{url('/logout')}}" method="POST">
                  @csrf
                  <button type="submit">LogOut</button>
              </form>
          </li>
          @elseif(Auth::guard('admin')->check())
          <li class="nav-item ">
            <a class="nav-link">{{Auth::guard('admin')->user()->name}}</a>
          </li>
          <li class="nav-item">
              <form action="{{route('admin.logout')}}" method="POST">
                  @csrf
                  <button type="submit">LogOut</button>
              </form>
          </li>
          @endif
      </ul>
    </div>
  </nav>

  @yield('input')

@endsection
