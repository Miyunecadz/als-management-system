@extends('layout.app')

@section('content')
<div>
    <div class="container-fluid p-0 d-flex" >
        <div id="sidebar" class="sidebar-hidden bg-black-dark-flat sidebar-width  min-vh-100 ">
            @include('layout.sidebar')
        </div>
        <div class="bg-light min-vh-100" style="width: 100%; overflow: hidden">
            @include('layout.nav')

            @yield('contents')


        </div>
    </div>
</div>
@endsection
