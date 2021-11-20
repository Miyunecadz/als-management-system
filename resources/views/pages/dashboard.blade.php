@extends('layout.navigations')

@section('contents')
    @includeWhen(auth()->check() && auth()->user()->isAdmin(),'pages.admin.dashboard')
    @includeWhen(auth()->check() && auth()->user()->isAdmin() == 'teacher','pages.teacher.dashboard')
@endsection


