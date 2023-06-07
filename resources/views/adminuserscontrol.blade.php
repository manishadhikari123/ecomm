<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportsHub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .dash-head {
            padding: 30px 15px;
            margin: 0;
            background-color: #f9f9f9;
            color: #000000;
            text-align: center;
        }
        .dash-buttons {
            margin: 15px auto 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .btn-success {
            padding: 15px 20px;
            margin: 20px;
            width: 250px;
            font-size: 18px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }
        .btn-success:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .btn-success:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        a {
            color: #007bff;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }
        a:hover {
            color: #0056b3;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="dash-head">
        <h1><b>CONTROL USERS</b></h1>
    </div>
    <div class="dash-buttons">
        <a href="/adminaddmember" class="btn btn-success">Add Members</a>
        <a href="/admindeleteuser" class="btn btn-success">Delete Members</a>
        <a href="/admindashboard" class="btn btn-outline-primary">Go Back to Admin Dashboard</a>
    </div>
</body>
</html>
