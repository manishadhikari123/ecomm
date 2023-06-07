<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .btn-success{
            padding:10px;
            margin:20px;
            width:250px;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .dash-head{
            padding:50px;
            margin:10px;
        }
        .dash-buttons{
            margin:15px 0 0 600px;
        }
    </style>
</head>
<body>
    <div class="dash-head">
        <center><h1><b>ADMIN DASHBOARD</b></h1></center>
    </div>
    <div class="dash-buttons">
        <a href="/adminproductscontrol" class="btn btn-success">Control Products</a><br>
        <a href="/admin-orderinfo" class="btn btn-success">Order Information</a><br>
        <a href="/adminuserscontrol" class="btn btn-success">Control Users</a><br>
        <a href="/adminlogout" class="btn btn-success">Logout From Adminpanel</a><br>
    </div>
</body>
</html>
