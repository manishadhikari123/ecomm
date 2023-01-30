<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<h1> Add Products </h1>

<form action="/addproduct" method="POST">
            @csrf
             <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label><br>
                <input type="text" name="name" class="" id="exampleInputEmail1" placeholder="Enter name of product">
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Price</label><br>
                <input type="text" name="price" class="" id="exampleInputEmail1" placeholder="Enter price of this product">
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">category</label><br>
                <input type="text" name="category" class="" id="exampleInputEmail1" placeholder="Enter category of this product">
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">description</label><br>
                <input type="text" name="description" class="" id="exampleInputEmail1" placeholder="Enter a short description of this product">
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">gallery</label><br>
                <input type="file" name="gallery" class="" id="exampleInputEmail1" placeholder="upload an image">
            </div>



            
 
            <button type="submit" class="btn btn-primary">Add product</button>
        </form>
        <a href="/adminuserscontrol"> Go Back to Control User</a><br>

</div>
</body>

</html>