@extends('layout.navigations')

@section('contents')
    <h3 class="text-center  my-3">Edit Profile</h3>

    <form action="#" method="POST" class="d-md-flex justify-content-center p-2">
        <div class="col-md-4 col-12 mb-3 d-md-flex justify-content-center flex-column">
            <div class="form-floating ">
                <input type="text" name="fullname" class="form-control mb-3" id="fullname" placeholder="Martin" readonly>
                <label for="fullname">Full Name</label>
            </div>
            <div class="form-floating ">
                <input type="text" name="username" class="form-control mb-3" id="username" placeholder="Martin" >
                <label for="username">Username</label>
            </div>
            <div class="form-floating ">
                <input type="password" name="oldpass" class="form-control mb-3" id="oldpass" placeholder="Martin" >
                <label for="oldpass">Old Password</label>
            </div>
            <div class="form-floating ">
                <input type="password" name="newpass" class="form-control mb-3" id="newpass" placeholder="Martin" >
                <label for="newpass">New Password</label>
            </div>

            <input  type="submit" class="btn btn-primary col-6 col-md-7" value="Update">
        </div>
    </form>
@endsection
