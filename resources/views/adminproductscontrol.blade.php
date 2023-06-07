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
        .dash-buttons {
            margin: 15px auto 0;
            display: flex;
            flex-direction: column;
            align-items: center;
}

    </style>
</head>
<body>
    <div class="dash-head">
        <center><h1><b>CONTROL PRODUCTS</b></h1></center>
    </div>
    <div class="dash-buttons">
        <a href="/adminaddproduct" class="btn btn-success">Add products</a>
        <a href="/admindeleteproduct" class="btn btn-success">Update or Delete Products</a>
        <a href="/admindashboard" class="btn btn-outline-primary" style="width:250px;">Admin Dashboard</a>
    </div>
</body>
</html>
