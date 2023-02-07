@extends('master')
@section("content")
<h1><center>{{$heading}} products<center></h1>


  <div class="trending-wrapper">
   
    <div class="row">
      @foreach($products as $item)
        <div class="col-md-3" style="width:18rem; margin:10px; padding:10px;">
    
          <div class="card" style="width:18rem; margin: 20px; padding:20px;">
            <a href="/detail/{{$item['id']}}">

              <img src="{{asset('/images/'.$item->gallery)}}" class="card-img-top " height="150" width="100%" alt="{{$item->name}}">
              <div class="card-body">

                <h5 class="card-title">{{$item['name']}}</h5></a>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </a>
          </div>
      
        </div>
    @endforeach
   </div>

  </div>

@stop