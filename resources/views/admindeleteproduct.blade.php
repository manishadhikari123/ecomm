<div style="text-align: center; margin-top: 20px;">
    <h1 style="font-size: 28px; font-weight: bold;">DELETE AND UPDATE PRODUCTS</h1>
    <h2 style="text-align: center; margin-top: 20px;">
    <button onclick="window.location.href='/adminproductscontrol'" style="margin-top: 10px;">Go Back to Control Product</button>
</div>

<table border="1" style="width: 100%; margin-top: 20px; border-collapse: collapse;">
    <tr style="background-color: #ccc; font-weight: bold; text-align: center;">
        <td style="padding: 10px;">ID</td>
        <td style="padding: 10px;">NAME</td>
        <td style="padding: 10px;">PRICE</td>
        <td style="padding: 10px;">SIZE</td>
        <td style="padding: 10px;">CATEGORY</td>
        <td style="padding: 10px;">QUANTITY</td>
        <td style="padding: 10px;">DESCRIPTION</td>
        <td style="padding: 10px;">GALLERY</td>
        <td style="padding: 10px;">DELETE</td>  
        <td style="padding: 10px;">UPDATE</td>  
    </tr>
@foreach($products as $item)
    <tr style="text-align: center;">
        <td style="padding: 10px;">{{$item['id']}}</td>
        <td style="padding: 10px;">{{$item['name']}}</td>
        <td style="padding: 10px;">{{$item['price']}}</td>
        <td style="padding: 10px;">{{$item['size']}}</td>
        <td style="padding: 10px;">{{$item['category']}}</td>
        <td style="padding: 10px;">{{$item['quantity']}}</td>
        <td style="padding: 10px;">{{$item['description']}}</td>
        <td style="padding: 10px;"><img style="height: 50px; width: 50px;" src="{{asset('images/'.$item['gallery'])}}"></td>
        <td style="padding: 10px;"><a href={{"delete/".$item['id']}} style="padding: 5px 10px; background-color: #ff0000; color: #fff; text-decoration: none; border-radius: 5px;">Delete</a></td>
        <td style="padding: 10px;"><a href={{"edit/".$item['id']}} style="padding: 5px 10px; background-color: #3b3b3b; color: #fff; text-decoration: none; border-radius: 5px;">Edit</a></td>
    </tr>
@endforeach
</table>

<div style="text-align: center; margin-top: 20px;">
    <button onclick="window.location.href='/adminproductscontrol'" style="margin-top: 10px;">Go Back to Control Product</button>
</div>
