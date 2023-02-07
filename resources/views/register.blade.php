@extends('master')
@section("content")

<div style=" padding:20px;">
    <center><b><h3>Registration<h3></b></center>

</div>
<div class="container custom-login">


    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter your Name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Email" id="exampleInputEmail1" >
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
 
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        </div>
    </div>
</div>
@endsection
