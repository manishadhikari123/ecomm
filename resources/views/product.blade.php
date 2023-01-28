@extends('master')
@section("content")
<div class="custom-product">
    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        @foreach($products as $value)
                <li data-target="#imageCarouselIndicator" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
  </ol>
      
        <!-- Wrapper for slides -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
            @foreach ($products as $item)
                <div class="carousel-item {{ $loop->first ? 'active':''}}">
                    <a href="detail/{{$item['id']}}">
                        <img class="slider-img" src="{{$item['gallery']}}">
                    <div class="carousel-caption slider-text">
                        <h3>{{$item['name']}}</h3>
                        <p>{{$item['description']}}</p>
                    </div>
                    
                    </a>
                </div>
    
          @endforeach
        </div>
      </div>
      
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#imageCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#imageCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      
      </div>
      <div class="trending-wrapper">
        <h3>Trending Products</h3>
        @foreach($products as $item)
          <div class="trending-item">
                    <a href="detail/{{$item['id']}}">
                        <img class="trending-image" src="{{$item['gallery']}}">
                    <div class="">
                        <h5>{{$item['name']}}</h5>
                    </div>
                    
                    </a>
          </div>
        @endforeach

      </div>

</div>
@endsection