@extends('nav')
@section('title','Login')
@section('input')
<form method="POST" action="{{route('user.login')}}">
    @csrf
    <div class="form-group-sm">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="email" >
    </div>
    <div class="form-group">
      <label >Password</label>
      <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
