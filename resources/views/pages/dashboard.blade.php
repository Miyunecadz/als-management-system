@extends('layout.navigations')

@section('contents')
    @includeWhen(auth()->check() && auth()->user()->role == 'admin','pages.admin.dashboard')
    @includeWhen(auth()->check() && auth()->user()->role == 'teacher','pages.teacher.dashboard')
@endsection


