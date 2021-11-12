{{--Get Route Name--}}
@php
    $routename = Route::currentRouteName();
@endphp


<div class="wrapper-sidebar d-md-inline">
    <div class="logo  d-flex justify-content-center pt-2 bg-green-dark-flat nav-height">
        <h4 class="font-montserrat-bold text-white ">ALS DATABASE</h4>
    </div>
    <div class="side-container d-flex justify-content-between flex-column pb-3 sidebar-height
                ">
        <div class="font-poppins-regular d-flex flex-column ">
            <a href="{{ url('/') }}" class="text-decoration-none sidebar-width
                                nav-height d-flex align-items-center
                                px-3 text-white mt-4
                                {{ $routename === 'dashboard' ? 'selected-nav' : '' }} ">
               <span class="">
                   <i class="bi bi-house-door-fill"></i>
                   Home
               </span>
            </a>
            <a href="{{ url('als/create') }}" class="text-decoration-none  sidebar-width
                                nav-height  d-flex align-items-center
                                px-3 text-white
                                {{ $routename === 'createals' ? 'selected-nav' : '' }}">
                <span>
                    <i class="bi bi-person-plus-fill"></i>
                    Add ALS
                </span>
            </a>
            <a href="{{ url('als/list') }}" class="text-decoration-none  sidebar-width
                                nav-height  d-flex align-items-center
                                px-3 text-white
                                {{ $routename === 'listals' ? 'selected-nav' : '' }}">
                <span>
                    <i class="bi bi-person-lines-fill"></i>
                    ALS List
                </span>
            </a>
        </div>

    </div>
</div>
