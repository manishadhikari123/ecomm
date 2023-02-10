@extends('master')
@section("content")

<div style=" padding:20px;">
    <center><b><h3>Registration<h3></b></center>

</div>
<div class="container custom-login">


    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">

        <form action="/register" method="POST"  >
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your Name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Email" id="email"  required >
                <span id="email-error"></span>
                <div  class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" onchange="valtext()" required>
                <button type="button" class="btn btn-primary" onclick="togglePassword()">Show Password </button>

            </div>
 
            <button type="submit" class="btn btn-primary" onclick="return validateForm()">Register</button>
        </form>



        <script>
            function validateForm() 
        {
                //validate name
            var name = document.getElementById("name").value;
            if (name == "") {
                alert("Name must be filled out");
                return false;
            }

            var pattern = /^[a-zA-Z]+$/;
            if (!pattern.test(name)) {
                alert("Name must contain only letters");
                return false;
            }

                //validate email
            var x = document.getElementById("email").value;
            var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!pattern.test(x)) {
                alert("Not a valid e-mail address");
                return false;
            }
            return true;


            //validate password
            var z = document.getElementById("password").value;
            var passwordPattern = /^[a-zA-Z0-9]{8,}$/;
            if (!passwordPattern.test(z)) {
                alert("Password must contain at least 8 characters");
                return false;
            }

            return true;

            
        }
        funtion valtext(){
          var z = document.getElementById("password").value;
            var passwordPattern = /^[a-zA-Z0-9]{8,}$/;
            if (!passwordPattern.test(z)) {
                alert("Password must contain at least 8 characters");
                return false;
            }

            return true;
        }



        //for same email
     
  

</script>




        </div>
    </div>
</div>
@endsection
