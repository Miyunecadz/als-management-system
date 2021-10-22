@extends('layout.app')

@section('content')
<div>
    <div class="container-fluid p-0 d-flex" >
        <div id="sidebar" class="bg-black-dark-flat sidebar-width  min-vh-100 ">
            @include('layout.sidebar')
        </div>
        <div class="bg-light min-vh-100 max-vw-100 flex-grow-1">
            @include('layout.nav')

            <div class="content bg-white">
                asdasd
            </div>
        </div>
    </div>
</div>
@endsection


