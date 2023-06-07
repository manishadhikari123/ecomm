<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        h1 {
            text-align: center;
            margin-top: 10px;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1200px;
            margin: 10px auto 0;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        
        th,
        td {
            text-align: left;
            padding: 12px;
        }
        
        th {
            background-color: #4CB77A;
            color: white;
            font-weight: bold;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #e2e2e2;
        }
    </style>
</head>
<body>
    <h1><Center>ORDER INFORMATION</Center></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Product ID</th>
                <th>Status</th>
                <th>Order Quantity</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order['id']}}</td>
                <td>{{$order['user_id']}}</td>
                <td>{{$order['product_id']}}</td>
                <td>{{$order['status']}}</td>
                <td>{{$order['Order_quantity']}}</td>
                <td>{{$order['payment_method']}}</td>
                <td>{{$order['payment_status']}}</td>
                <td>{{$order['address']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
