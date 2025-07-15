
@extends('layout.app')

@include('admin.navbar')

@section('content')
     @yield('pages') 
     @include('includes.toasts.toast')
@endsection



