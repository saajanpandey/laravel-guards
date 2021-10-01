@extends('nav')
@section('input')
<h1>Welecome to user dashboard</h1>
{{Auth::user()->name}}

@endsection
