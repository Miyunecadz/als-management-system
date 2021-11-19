@extends('layout.navigations')

@section('contents')
    <h3 class="text-center  my-3">Edit Profile</h3>

    @php
        $user = isset($user)? $user: auth()->user();
    @endphp

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="d-md-flex justify-content-center p-2">
        @csrf
        @method('PUT')
        <div class="col-md-4 col-12 mb-3 d-md-flex justify-content-center flex-column">
            <div class="form-floating ">
                <input type="text" name="fullname" class="form-control mb-3" id="fullname" placeholder="Martin" readonly
                    value="{{ old('fullname')? old('fullname') : $user->firstname .' '. $user->lastname }}">
                <label for="fullname">Full Name</label>
            </div>
            <div class="form-floating ">
                <input type="text" name="username" class="form-control mb-3 {{ $errors->has('username')? 'is-invalid': '' }}"
                       id="username" placeholder="Martin" value="{{ old('username')? old('username') : $user->username }}"
                       aria-describedby="username-Validation">
                <label for="username">Username</label>
                <div id="username-Validation" class="invalid-feedback">
                    {{ $errors->has('username')?$errors->first('username'): '' }}
                </div>
            </div>
            <div class="form-floating ">
                <input type="password" name="oldpass" class="form-control mb-3 {{ $errors->has('oldpass')? 'is-invalid': '' }}"
                       id="oldpass" placeholder="Martin" value="{{ old('oldpass')? old('oldpass') : ''}}"
                       aria-describedby="oldpass-Validation">
                <label for="oldpass">Old Password</label>
                <div id="oldpass-Validation" class="invalid-feedback">
                    {{ $errors->has('oldpass')? $errors->first('oldpass'): '' }}
                </div>
            </div>
            <div class="form-floating ">
                <input type="password" name="password" class="form-control mb-3" id="password" placeholder="Martin"
                       value="{{ old('password')? old('password') : '' }}">
                <label for="password">New Password</label>
            </div>

            <input  type="submit" class="btn btn-primary col-6 col-md-7" value="Update">
        </div>
    </form>
@endsection
