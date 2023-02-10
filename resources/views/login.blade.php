@extends('master')
@section("content")

<div >
    <center><b><h3>"Users should be loggedin in order to buy a product"<h3></b></center>
    <center><b><h3>"Before login , complete the registration process"<h3></b></center>

</div>
<div class="container custom-login">


    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <button type="button" class="btn btn-primary" onclick="togglePassword()">Show Password </button>

            </div>
 
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
    </div>
    <script>
function togglePassword() {
  var passwordInput = document.getElementById("password");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}
</script>
</div>
@endsection
