@extends('master')
@section("content")

<!-- @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif -->


<div id="successMsg" class="alert">
</div>

<script>
  const urlParams = new URLSearchParams(window.location.search);
  const success = urlParams.get('success');
  if(success === "true") {
    //  alert-success
    document.getElementById("successMsg").classList.add("alert-success");
    document.getElementById("successMsg").innerHTML = "Successfully Registered!";
  } else if(success === "false") {
    //  alert-danger
    document.getElementById("successMsg").classList.add("alert-danger");
    document.getElementById("successMsg").innerHTML = "Login not successful!";
  }
</script>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-lg">
        <div class="card-body">
          <h3 class="text-center mb-4"><b>USER LOGIN</b></h3>
          @if ($errors->has('message'))
            <div class="alert alert-danger">
              {{ $errors->first('message') }}
            </div>
          @endif
          <form action="/login" method="POST" onsubmit="validatesubmit(event)">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"  oninput="validateEmail()">
              <div class="form-text">We'll Never Share Your Email Address With Anyone Else.</div>
              <span id="email-error" style="color:red;"></span>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <input type="password" name="password" class="form-control" id="password" oninput="validatePassword()">
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="togglePassword()">Show Password</button>
              </div>
              <span id="message" style="color:red;"></span>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

   <script>
      window.formvalid={email:false,password:false};



function togglePassword() {
  var passwordInput = document.getElementById("password");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}


function validatesubmit(event){
    if(!formvalid.email || !formvalid.password ){
      event.preventDefault();
      alert('invalid input');
    }    
  
}

function validatePassword() {
  var password = document.getElementById("password").value;
  var message = document.getElementById("message");
  
  if (password.length >= 8 && password.length <= 20) {
    message.innerHTML = "";
    formvalid.password=true;

  } else {
    message.innerHTML = "Password must be between 8 and 20 characters long.";
    formvalid.password=false;

  }
  
}

function validateEmail() {
    var email = document.getElementById("email").value;
    var emailError = document.getElementById("email-error");
    var emailRegex = /^([a-zA-Z0-9_\.\-])+\@((gmail|yahoo|hotmail|outlook)\.[a-zA-Z]{2,3})$/;

    if (emailRegex.test(email)) {
      emailError.innerHTML = "";
      formvalid.email=true;
    } else {
      emailError.innerHTML = "Invalid email address.";
      formvalid.email=false;

    }
  }

</script>
</div>
</div>
    </div>

@endsection
