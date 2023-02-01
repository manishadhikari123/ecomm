@extends('master')
@section("content")

<body style="background-color:powderblue;">
<div class="custom-product" >

    <div class="container-fluid" >
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

    <div class="carousel-item active" style="height:400px; width:100%;">
    @foreach($products as $item)

      <img class="d-block w-100" src="{{asset('images/'.$item['gallery'])}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/'.$item['gallery'])}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/slider/'.$item['gallery'])}}" alt="Third slide">
      @endforeach

    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
    </div>
      <div class="container">

      <p class="container"  style="font-family:courier; padding:20px; font-size:160%; text-align:center;" >
      Welcome to our sports website, where we offer a wide selection of high-quality sports equipment and apparel for athletes of all levels. 
      We understand that choosing the right gear can make a big difference in your performance and enjoyment of the sport, 
      and we're here to help you find the perfect products for your needs. Our website is tailored for Biratnagar city audience,
       so you can be sure that you're getting products that are perfectly suited to the local weather, terrain, and conditions.
       We have a wide range of products, from the latest high-tech gear to classic, tried-and-true equipment that's been trusted by athletes
        for years. We also offer competitive prices and fast shipping, so you can get the gear you need quickly and easily. 
        So, whether you're a seasoned veteran or just starting out, we invite you to browse our website 
      and find the perfect products to help you reach your full potential. Shop now and experience the difference that the right gear can make!

      </p>

      

      <img src="{{ asset('images/sportshub2.jpg') }}" style="width:100%; height:60%;" alt="sports hub Image">

      <p class="container"  style="font-family:courier; padding:20px; font-size:160%; text-align:center;" >
        Sports Hub is a premier sports website that caters to the needs of sports enthusiasts in Biratnagar.
        We offer a wide range of services, including sports news and updates in our social media sites and sports equipment sales.
        Our team of experts is dedicated to providing accurate and up-to-date information on various sports, including football,
        cricket, basketball, and many more through our facebook pages. We understand the importance of staying current in the sports world and strive to provide
        our audience with the most relevant and useful information. Our goal is to provide a space where the sports community in Biratnagar can come together to share their passion for sports.
      </p>

      </div>




      <div class="trending-wrapper">
        <h3><center><u>Our Products</u></center></h3>
        <b><h7><center>"Make sure you are logged in before buying a product"</center><h7></b>
        @foreach($products as $item)
          <div class="trending-item" style="padding:20px;">
                    <a href="detail/{{$item['id']}}">
                        <img class="trending-image" src="{{asset('images/'.$item['gallery'])}}">

                    <div class="">
                        <h5>{{$item['name']}}</h5>
                    </div>
                    
                    </a>
          </div>
        @endforeach

      </div>

</div>
</body>
@endsection