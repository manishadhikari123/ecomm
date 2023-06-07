@extends('master')
@section("content")

<style>
    .product-item {
      border: 1px solid #ccc;
      border-radius: 5px;
      overflow: hidden;
      background-color: #fff;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
      width: 300px;
      margin: 10px;
      float: left;
      transition: all 0.3s ease-in-out;
    }
    
    .product-item:hover {
      transform: translateY(-5px);
      box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
    }
    
    .product-image {
      display: block;
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: all 0.3s ease-in-out;
    }
    
    .product-item:hover .product-image {
      transform: scale(1.1);
    }
    
    .product-info {
      padding: 20px;
      transition: all 0.3s ease-in-out;
    }
    
    .product-item:hover .product-info {
      background-color: #f1f1f1;
    }
    
    .product-name {
      margin: 0;
      font-size: 1.2rem;
      font-weight: bold;
      transition: all 0.3s ease-in-out;
    }
    
    .product-item:hover .product-name {
      color: #c62f2f;
    }
    
    .product-description {
      margin: 10px 0;
      font-size: 0.9rem;
      color: #444;
      transition: all 0.3s ease-in-out;
    }
    
    .product-item:hover .product-description {
      color: #777;
    }
  </style>
  
  <div class="custom-product">
    <h2>Product Search Results</h2>
    <div class="products-container">
      @foreach($products as $item)
      <div class="product-item">
        <a href="detail/{{$item['id']}}">
          <img class="product-image" src="{{asset('images/'.$item['gallery'])}}">
          <div class="product-info">
            <h3 class="product-name">{{$item['name']}}</h3>
          </div>
        </a>
      </div>
      @endforeach
      <div style="clear: both;"></div>
    </div>
  </div>
<!--
<div class="custom-product">
    <div class="row">
    <div class="col-sm-4">
        <a href="#">Filter</a>
    </div>
    <div class="col-sm-4">
    <div class="trending-wrapper">

<h3>Result for Products</h3>

@foreach($products as $item)
<div class="searched-item">
    <a href="detail/{{$item['id']}}">
    <img class="trending-image" src="{{asset('images/'.$item['gallery'])}}">
    <div class="">
        <h2>{{$item['name']}}</h2>
    </div>

    </a>
    <h5>{{$item['description']}}</h5>
</div>
@endforeach
    </div>
    
</div>
</div>-->
@endsection