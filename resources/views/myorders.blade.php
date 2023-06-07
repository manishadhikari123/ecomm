@extends('master')

@section("content")
    <div class="container">
        <div class="custom-product">
            <div class="col-sm-10">
                <div class="trending-wrapper">
                    <h3>My Orders</h3>
                    <br><br>
                    @foreach($orders as $item)
                        <div class="row searched-item cart-list-divider" id="order_{{$item->id}}">
                            <div class="col-sm-4">
                                <a href="detail/{{$item->id}}">
                                    <img class="trending-image-cartlist" src="{{asset('images/'.$item->gallery)}}">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <div class="container">
                                    <h3>{{$item->name}}</h3>
                                    <span>Number of quantity={{$item->Order_quantity}}</span><br>
                                    <span>Unit price of product=Rs {{$item->price}}</span><br>
                                    <span>Total price={{$item->Order_quantity*$item->price}}</span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-warning" onclick="removeOrder({{$item->id}})">Remove From Orders</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function removeOrder(orderId) {
            var orderElement = document.getElementById("order_" + orderId);
            if (orderElement) {
                orderElement.remove();
            }
        }
    </script>
@endsection


<!--
<div class="container">
<div class="custom-product">
    
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h3>My Orders</h3>
            
            <br><br>
            @foreach($orders as $item)
                <div class="row searched-item cart-list-divider">
                    <div class="col-sm-4">
                        <a href="detail/{{$item->id}}">
                            <img class="trending-image-cartlist" src="{{asset('images/'.$item->gallery)}}">
                            
                    
                        </a>
                    </div>
                    <div class="col-sm-6">
                            <div class="container">
                                <h3>{{$item->name}}</h3>
                                <span>Number of quantity={{$item->Order_quantity}}</span><br>
                                <span>Unit price of product=Rs {{$item->price}}</span><br>
                                <span>Total price={{$item->Order_quantity*$item->price}}</span>                            </div>
                    
                    </div>
                    <div class="col-sm-2">
                        <a href="/removeProduct/{{$item->product_id}}" class="btn btn-warning">Remove From orders</a>
                    </div>
                    
                </div>
            @endforeach

        </div>

    </div>



</div>
</div>
-->