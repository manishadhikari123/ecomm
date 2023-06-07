<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SportsHub</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, Helvetica, sans-serif;
    }

    .container {
      background-color: #fff;
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
      padding: 20px;
      margin-top: 50px;
      max-width: 500px;
      border-radius: 10px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    form {
      margin-bottom: 20px;
    }

    input {
      margin-bottom: 10px;
      border-radius: 5px;
      border: none;
      padding: 10px;
      width: 100%;
    }

    .form-label {
      font-weight: bold;
    }

    .form-text {
      font-size: 12px;
    }

    .btn-primary {
      background-color: #0000FF;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      width: 100%;
      margin-top: 20px;
    }

    .btn-primary:hover {
      background-color: #37B777;
    }

    a {
      color: #0000FF;
      font-size: 14px;
      text-align: center;
      display: block;
    }

    a:hover {
      text-decoration: none;
    }

    #togglePassword {
      background-color: transparent;
      border: none;
      color: #0000FF;
      font-size: 12px;
      cursor: pointer;
      margin-left: 10px;
    }

    #message,
    #name-message,
    #email-error {
      font-size: 12px;
      margin-top: 5px;
    }

    @media (max-width: 576px) {
      .container {
        margin-top: 20px;
        padding: 10px;
        border-radius: 0;
        box-shadow: none;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>ADD USER</h1>
    @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
    @endif

    <form action="/addmember" method="POST" onsubmit="validatesubmit(event)">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label><br>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name of user" oninput="validateName()">
                <span id="name-message" style="color:red;"></span>

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Email" id="email" oninput="validateEmail()">
                <span id="email-error" style="color:red;"></span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" oninput="validatePassword()" class="form-control" id="password">
                <span id="message" style="color:red;"></span><br>
                <button type="button" id="togglePassword"> Show/Hide Password </button>
            </div>
 
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <a href="/adminuserscontrol"> Go Back to Control User</a><br>

</div>
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
function validateName() {  
  var name = document.getElementById("name").value;
  var nameMessage = document.getElementById("name-message");
  
  if (/\d/.test(name)) {
    nameMessage.innerHTML = "Name cannot contain numbers.";
    formvalid.name=false;

  } else {
    nameMessage.innerHTML = "";
    formvalid.name=true;

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

</body>

</html>