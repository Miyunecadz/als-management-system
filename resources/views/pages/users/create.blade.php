@extends('layout.navigations')

@section('contents')

    <h3 class="text-center  my-3">Create User</h3>
    <form action="{{ route('users.store') }}" method="POST" class="d-md-flex justify-content-center p-2">
        @csrf
        <div class="col-md-4 col-12 mb-3 d-md-flex justify-content-center flex-column">
            <div class="form-floating ">
                <input type="text" name="fullname" class="form-control mb-3" id="fifullnamestname" placeholder="Martin"
                       value="{{ old('fullname') }}">
                <label for="fullname">Full Name</label>
            </div>
            <div class="form-floating ">
                <input type="text" name="designation" class="form-control mb-3" id="designation" placeholder="Martin"
                       value="{{ old('designation') }}">
                <label for="designation">Designation</label>
            </div>
            <div class="form-floating ">
                <input type="text" name="username" class="form-control mb-3 {{ $errors->has('username')? 'is-invalid': '' }}"
                       id="username" placeholder="Martin" value="{{ old('username')}}"
                       aria-describedby="username-Validation">
                <label for="username">Username</label>
                <div id="username-Validation" class="invalid-feedback">
                    {{ $errors->has('username')?$errors->first('username'): '' }}
                </div>
            </div>
            <div class="form-floating ">
                <input type="password" name="password" class="form-control mb-3 {{ $errors->has('password')? 'is-invalid': '' }}"
                       id="password" placeholder="Martin" value="{{ old('password')? old('password') : '' }}">
                <label for="password">Password</label>
                <div id="password-Validation" class="invalid-feedback">
                    {{ $errors->has('password')? $errors->first('password'): '' }}
                </div>
            </div>
            <div class="form-floating ">
                <input type="password" name="password_confirmation" class="form-control mb-3"
                       id="password_confirmation " placeholder="Martin">
                <label for="password_confirmation ">Confirm Password</label>
            </div>
            <input  type="submit" class="btn btn-success col-6 col-md-7" value="Save">
        </div>
    </form>
@endsection
