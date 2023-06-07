@extends('master')
@section("content")


    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{asset('images/'.$product['gallery'])}}" alt="" id="zoomable-image"><br>




    <script>
        var zoomableImage = document.getElementById('zoomable-image');
var zoomableImageContainer = document.createElement('div');
zoomableImageContainer.id = 'zoomable-image-container';

zoomableImage.parentNode.insertBefore(zoomableImageContainer, zoomableImage);
zoomableImageContainer.appendChild(zoomableImage);

var mouseX, mouseY;
zoomableImage.addEventListener('mousemove', function(e) {
    mouseX = e.pageX - zoomableImageContainer.offsetLeft;
    mouseY = e.pageY - zoomableImageContainer.offsetTop;

    zoomableImage.style.transformOrigin = mouseX + 'px ' + mouseY + 'px';
    zoomableImage.style.transform = 'scale(2)';
});

zoomableImage.addEventListener('mouseleave', function(e) {
    zoomableImage.style.transform = 'scale(1)';
});
    </script>

    <style>
      #zoomable-image-container {
    position: relative;
    overflow: hidden;
}  

#zoomable-image-container {
    width: 500px; /* set the width of the container to the width of your image */
    height: 500px; /* set the height of the container to the height of your image */
    overflow: hidden;
}
    </style>


        </div>







        <div class="col-sm-6" >
        <style>
    .new-class {
        display: inline-block;
        padding: 5px 10px;
        background-color: #FF0000;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .new-class:hover {
        background-color: #0069d9;
    }

    
    .product-info {
  background-color: #f8f9fa;
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



.product-table {
  background-color: #f8f9fa;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0px 0px 8px 0px rgba(0,0,0,0.2);
  transition: transform 0.2s ease-out;
}

.product-table:hover {
  transform: scale(1.02);
  box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.2);
}

.product-table td {
  padding: 20px;
  text-align: center;
  vertical-align: middle;
  font-size: 1.2rem;
  color: #343a40;
}

.product-table label {
  font-weight: bold;
  margin-left: 5px;
}

.product-table input {
  margin-top: 10px;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ced4da;
  font-size: 1rem;
  color: #343a40;
}

.product-table input:focus {
  outline: none;
  border-color: #007bff;
  box-shadow: 0px 0px 4px 0px rgba(0,123,255,0.5);
}

.product-table #quantity-message {
  display: block;
  margin-top: 5px;
  font-size: 0.8rem;
  font-style: italic;
}


</style>

<a href="/" class="new-class">Go Back</a>
<br><br>

<div class="product-info">
  <h2><b>{{$product['name']}}</b></h2>
  <h4><b>PRICE:</b> {{$product['price']}}</h4>
  <h4><b>AVAILABLE SIZE :</b> {{$product['size']}}</h4>
  <h4><b>CATEGORY:</b> {{$product['category']}}</h4>
  <h4><b>DETAILS :</b> {{$product['description']}}</h4>
</div>



            <br>

            <form action="/add_to_cart" method="POST" onsubmit="validatesubmit(event)">
                @csrf
                <input type="hidden" name="product_id" value={{$product['id']}}>

                <table class="product-table">
  <tr>
    <td>
      <b>STOCK AVAILABLE:</b>
      <label for="quantity">{{$product['quantity']}}</label>
    </td>
    <td>
      <b>ENTER NO OF PRODUCTS:</b>          
      <input type="text" id="prod_quantity" name="prod_quantity" value="" oninput="validateQuantity()">
      <span id="quantity-message" style="color:red;"></span>
    </td>
  </tr>
</table>

                <br>
                <button class="btn btn-primary">Add to Cart</button>

@if(Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif

            </form>



            <script>
                window.formvalid={prod_quantity:false};

                function validatesubmit(event){
                    if(!formvalid.prod_quantity ){
                        event.preventDefault();
                        alert('invalid input');
                    }  
                }

                function validateQuantity() {
                    var prod_quantity = document.getElementById("prod_quantity").value;
                    var quantityMessage = document.getElementById("quantity-message");

                    //if (isNaN(prod_quantity)) {
                        if (isNaN(prod_quantity) || prod_quantity >= 3 || prod_quantity == 0) {

                        //quantityMessage.innerHTML = "quantity must be a number.";
                        quantityMessage.innerHTML = "quantity must be a number less than 3 and not 0.";

                        formvalid.prod_quantity=false;
                    } else {
                        quantityMessage.innerHTML = "";
                        formvalid.prod_quantity=true;
                    }
                }

            </script>
            


        </div>
    </div>
   
    <div>
        
        <div class="trending-wrapper" style="background-color:black; color:white">
             <h3><center><u>Recommended Products</u></center></h3>
             @foreach($recommendationDataList as $item)
               <div class="trending-item" style="padding:20px;">
               <div class="card" style="width:18rem;  padding:0px; margin:10px;">
     
                         <a href="{{$item['id']}}">
                             <img src="{{asset('/images/'.$item->gallery)}}" class="card-img-top " height="150" width="100%" alt="{{$item->name}}">
      </a>
     
                         <div class="">
                             <h5 style="text-align:center; color:black;">{{$item['name']}}</h5>
                         </div>
                         
     </div>    
               </div>
             @endforeach
     
           </div>
     

    </div>
    

@endsection