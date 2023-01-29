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
<body style="background-color:powderblue;">
    {{View::make('header')}}
    @yield('content')
    <br>
    <br>
    {{View::make('footer')}}

    

</body>
<style>
    .custom-login{
        height: 500px;
        padding: 100px 0px 0px 500px;
    }

    img.slider-img{
        height: 400px !important
    }

    .custom-product{
    }

    .slider-text{
        background-color: #35443585 !important;
    }

    .trending-image{
        height: 100px;
    }

    .trending-image-cartlist{
        height: 150px;
    }
    .trending-image-search{
        height: 300px;
    }

    .trending-item{
        float:left;
        width:20%;
        height:200px;
        margin:0px;
    }

    .trending-wrapper{
        margin: 30px;
        float:left;
    }
    .detail-img{
        height: 300px;
        margin: 30px;
    }
    .col-sm-6{
        padding: 50px;
    }
    .search-box{
        width: 500px !important
    }
    
    .cart-list-divider{
        border-bottom:1px solid #ccc;
        margin-bottom:20px;
        padding-bottom:20px;
    }
    .dropdown-toggle{
        margin-left:30px;
    }
    .header-cart{
        margin-left:20px;
        margin-right:10px;
    }
    .header-login{
        padding:15px;
    }

    
    

    
</style>

</html>