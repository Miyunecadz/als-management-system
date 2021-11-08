@extends('layout.app')

@section('content')
    <div class="container-login min-vh-100">
        <div class="container">
            <div class="row px-3">
                <div class="col-lg-10 offset-lg-1 my-3 border rounded-3 vh-100 bg-white">
                    <div class="row h-100">
                        <div class="col-md-6 d-none d-md-inline bg-image">

                        </div>
                        <div class="col-md-6 col-sm-12 ">
                            <div class="flex-row d-flex  justify-content-center align-items-center h-100">
                                <div class="col-12">
                                    <h4 class="d-flex justify-content-center font-montserrat-bold mb-4">Welcome back!</h4>
                                    @if($errors->any())
                                        {!!  implode('', $errors->all('<div class=\'text-danger\'>:message</div>'))  !!}
                                    @endif
                                    <form  action="{{ url('/login') }}" method="POST" class="p-4">
                                        @csrf
                                        <div class="input-icons">
                                            <i class="bi bi-person-fill icon"></i>
                                            <input type="text" name="username" class="input-field font-poppins-regular border-0 rounded-pill" required placeholder="Username">
                                        </div>
                                        <div class="input-icons">
                                            <i class="bi bi-key-fill icon"></i>
                                            <input type="password" name="password" class="input-field font-poppins-regular border-0 rounded-pill" required placeholder="Password">
                                        </div>
                                        <div class="py-2">
                                            <input type="checkbox" id="remember_me" name="remember_me" value="1">
                                            <label class="font-poppins-regular" for="remember_me">Remember Me</label>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-success font-poppins-regular  rounded-pill">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
