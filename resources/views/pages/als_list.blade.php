@extends('layout.navigations')

@section('contents')

    @includeWhen($all_column == true, 'pages.all_list')
    @includeWhen($all_column == false, 'pages.few_list')

@endsection
