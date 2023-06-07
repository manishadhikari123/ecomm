<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Project</title>
    <style>
        /* Main Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 25px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 32px;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        input {
            width: 100%;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .show-password {
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            cursor: pointer;
            display: block;
        }

        .button-container {
            text-align: center;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        /* Alert Styles */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            display: none;
        }

        .alert-success {
            background-color: #28a745;
        }

        .alert-danger {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<form action="/adminlogin" method="POST">
    @csrf
    <h1>ADMIN LOGIN</h1>

    <!-- Alert Section -->
    <div id="successMsg" class="alert"></div>

    <!-- Input Fields -->
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
        <span class="show-password" onclick="togglePassword()">Show Password</span>
    </div>

    <!-- Submit Button -->
    <div class="button-container">
        <button type="submit" class="btn">LOGIN</button>
    </div>
</form>

<script>
    function togglePassword() {
        var passwordInput = document.getElementById("password)
    }
