@extends('master')
@section("content")




<div id="failureMsg" class="alert">
</div>

<script>
  const urlParams = new URLSearchParams(window.location.search);
  const success = urlParams.get('success');
  if(success === "false") {
    document.getElementById("failureMsg").classList.add("alert-danger");
    document.getElementById("failureMsg").innerHTML = "Failed to sign up!";
  }
</script>


<!-- <div class="alert alert-danger">
Hello
</div> -->

<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-body">
          <h3 class="text-center mb-4">Registration</h3>
          <form action="/register" method="POST" onsubmit="validatesubmit(event)">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter your Name" oninput="validateName()">
              <span id="name-message" class="error-message"></span>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Email" id="email" oninput="validateEmail()">
              <span id="email-error" class="error-message"></span>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <input type="password" name="password" oninput="validatePassword()" class="form-control" id="password">
                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="#password"><i class="bi bi-eye"></i></button>
              </div>
              <span id="message" class="error-message"></span>
            </div>
            <div class="mb-3">
              <label for="password1" class="form-label">Confirm Password</label>
              <div class="input-group">
                <input type="password" name="password1" oninput="validatePassword1()" class="form-control" id="password1">
                <button type="button" class="btn btn-outline-secondary toggle-password" data-target="#password1"><i class="bi bi-eye"></i></button>
              </div>
              <span id="message1" class="error-message"></span>
            </div>
            <button type="submit" class="btn btn-primary d-block w-100 mt-4">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  document.querySelectorAll('.toggle-password').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var target = document.querySelector(this.getAttribute('data-target'));
      if (target.type === 'password') {
        target.type = 'text';
      } else {
        target.type = 'password';
      }
    });
  });
</script>



       <script>

        
window.formvalid={name:false,email:false,password:false};




            $(document).ready(function() {
  $("#togglePassword").click(function() {
    var password = $("#password");
    if (password.attr("type") === "password") {
      password.attr("type", "text");
    } else {
      password.attr("type", "password");
    }
  });
});

$(document).ready(function() {
  $("#togglePassword1").click(function() {
    var password1 = $("#password1");
    if (password1.attr("type") === "password") {
      password1.attr("type", "text");
    } else {
      password1.attr("type", "password");
    }
  });
});

function validatesubmit(event){
    if(!formvalid.name || !formvalid.email || !formvalid.password ){
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

  function validatePassword1() {
  var password1 = document.getElementById("password1").value;
  var message1 = document.getElementById("message1");
  
  if (password1.length >= 8 && password1.length <= 20) {
    message1.innerHTML = "";
    formvalid.password1=true;

  } else {
    message1.innerHTML = "Password must be between 8 and 20 characters long.";
    formvalid.password1=false;

  }
  
}
function validateName() {  
  var name = document.getElementById("name").value;
  var nameMessage = document.getElementById("name-message");
  
  if (!/^[a-zA-Z\s]+$/.test(name)) {
    nameMessage.innerHTML = "Name can only contain letters and spaces.";
    formvalid.name = false;
  } else {
    nameMessage.innerHTML = "";
    formvalid.name = true;
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