@extends('master')
@section("content")
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{asset('images/'.$product['gallery'])}}" alt=""><br>

            <table border="1">
            <tr>
                <td>
            <h3>select size</h3>
            <input type="checkbox" id="small" name="size" value="small">
            <label for="small">Small</label><br>

            <input type="checkbox" id="medium" name="size" value="medium" >
            <label for="medium">Medium</label><br>

            <input type="checkbox" id="large" name="size" value="large">
            <label for="large">Large</label><br>
</td>
                <td style="padding: 20px;">
                Stocks available:<label for="3">3</label><br>
                Enter no. of products required:            <input type="text" id="medium" name="size" value="1" >

                </td>

</tr>

</table>


        </div>
        <div class="col-sm-6">
            <a href="/"> Go Back </a>
            <h1>{{$product['name']}}</h1>
            <h3>Price:{{$product['price']}}</h3>
            <h5>Details:{{$product['description']}}</h5>
            <h4>Category:{{$product['category']}}</h4>

            <br><br>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value={{$product['id']}}>
                <button class="btn btn-primary"> Add to Cart</button>

            </form>
            <br><br>
            <button class="btn btn-success"> Buy Now</button>
            <br><br>


        </div>
    </div>
    

@endsection