@extends('master')
@section("content")

<body style="background-color:powderblue;">
  <div class="custom-product" >


  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" style="height:600px; width:100%;">


      <div class="carousel-item active"  style="height:400px; width:100%; text-align:center;">
      <a href="detail/22">
        <img src="{{asset('images/slider/mu.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block" style="background-color:#35443585; height: 100px; text-align:center; position: absolute; top: 450px;">
            <h5>Manchester United Football shirt</h5>
          <!-- This is a comment <p>Some representative placeholder content for the first slide.</p>-->
        </div>
      </a>
      </div>


      <div class="carousel-item"  style="height:400px; width:100%;">
      <a href="detail/21">

        <img src="{{asset('images/slider/arsenal.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block" style="background-color:#35443585; height: 100px; position: absolute; top: 450px;">
        <h5>Arsenal Football shirt</h5>
          <!-- This is a comment<p>Some representative placeholder content for the second slide.</p>-->
        </div>
      </a>
      </div>


      <div class="carousel-item"  style="height:400px; width:100%;">
      <a href="detail/2">
        <img src="{{asset('images/slider/mc.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block" style="background-color:#35443585; height: 100px; position: absolute; top: 450px;">
        <h5>Manchester city Football shirt</h5>
          <!-- This is a comment<p>Some representative placeholder content for the third slide.</p>-->
        </div>
      </a>
      </div>


    </div>



    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>






  <!-- This is a comment 

    <div class="container-fluid" >
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
        <ol class="carousel-indicators" >
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <center>
        <div class="carousel-inner" style="height:400px; width:60%; padding: 20px;">
          @foreach($products as $item)
          <a href="detail/{{$item['id']}}">
          <div class="carousel-item active" >
            <img class="d-block w-100" src="{{asset('images/slider/'.$item['gallery'])}}" alt="First slide">
          </div>
          </a>
          
          @endforeach
        </div>
        </center>

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

    -->


    


    <div class="container">

      <p class="container"  style="font-family:courier; padding:20px; font-size:120%; text-align:center;" >
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

      <p class="container"  style="font-family:courier; padding:20px; font-size:120%; text-align:center;" >
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