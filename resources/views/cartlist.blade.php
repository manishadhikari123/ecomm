@extends('master')
@section("content")
<div class="container">
<div class="custom-product">
    
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h3>Result for Products</h3>

            @foreach($products as $item)
                <div class="row searched-item cart-list-divider">
                    <div class="col-sm-4">
                        <a href="detail/{{$item->id}}">
                            <img class="trending-image-cartlist" src="{{$item->gallery}}">
                            
                    
                        </a>
                    </div>
                    <div class="col-sm-6">
                            <div class="">
                                <h3>{{$item->name}}</h3>
                                <h3>{{$item->description}}</h3>
                            </div>
                    
                    </div>
                    <div class="col-sm-2">
                        <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove to Cart</a>
                    </div>
                    
                </div>
            @endforeach

        </div>
    </div>
    
    

</div>
</div>
@endsection