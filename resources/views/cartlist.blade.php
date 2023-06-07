@extends('master')
@section("content")
<div class="container">
<div class="custom-product">
    
    <div class="col-sm-10">
        <div class="trending-wrapper">

            @foreach($products as $item)
                <div class="row searched-item cart-list-divider">
                    <div class="col-sm-4">
                        <a href="detail/{{$item->id}}">
                            <img class="trending-image-cartlist" src="{{asset('images/'.$item->gallery)}}">
                            
                    
</a> <br><br>
                    </div>
                    <div class="col-sm-6">
  <div class="product-info">
    <h2>{{$item->name}}</h2>
    <h10><b>NUMBER OF QUANTITY:</b> {{$item->prod_quantity}}</h10><br>
    <h10><b>UNIT PRICE OF PRODUCTS: </b>Rs.{{$item->price}}</h10><br>
    <h10><b>TOTAL PRICE:</b> Rs.{{$item->prod_quantity*$item->price}}</h10>

    

    <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove From Cart</a>
  </div>
</div>
 </div>

            @endforeach
            <a href="ordernow" class="btn btn-success" style="margin-left:500;">Order Now</a>

        </div>

    </div>

</div>
</div>




<style>
.product-info {
  background-color: #f8f9fa;
  width: 550px;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0px 0px 8px 0px rgba(0,0,0,0.2);
  transition: transform 0.2s ease-out;
}

.product-info:hover {
  transform: scale(1.05);
  box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.2);
}

.product-info h2 {
  font-size: 2rem;
  margin-bottom: 10px;
  color: #343a40;
}

.product-info h4 {
  font-size: 1.2rem;
  margin-bottom: 5px;
  color: #343a40;
}

.product-info h4:first-child {
  margin-top: 20px;
}

.product-quantity {
  margin-top: 10px;
  display: flex;
  align-items: center;
}

.product-quantity input {
  text-align: center;
  margin: 0 10px;
  border: none;
  border-bottom: 1px solid #ccc;
}

.product-quantity button {
  padding: 5px 10px;
  border-radius: 5px;
  border: none;
  color: #fff;
}

.product-quantity button:focus,
.product-quantity input:focus {
  outline: none;
}

.product-quantity button.btn-danger {
  background-color: #dc3545;
}

.product-quantity button.btn-success {
  background-color: #28a745;
}

.btn-warning {
  background-color: #ffc107;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
}

.btn-warning:hover {
  background-color: #ffca2c;
}



.searched-item {
  display: flex;
  justify-content: center;
}

.trending-image-cartlist {
  width: 100%;
  max-width: 300px;
  height: auto;
  transition: transform 0.3s;
}

.trending-image-cartlist:hover {
  transform: scale(1.1);
}

</style>

@endsection