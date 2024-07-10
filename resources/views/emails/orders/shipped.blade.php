<!DOCTYPE html>
<html>
<head>
    <title>Order Shipped</title>
</head>
<body>
<h1>Order Shipped</h1>
<p>Dear {{ $order->user->name }},</p>
<p>Thank you for your order. Your order #{{ $orderId }} has been shipped.</p>
<p>Order Details:</p>
<ul>
    <li>Product: {{ $productName }}</li>
    <li>Quantity: {{ $order->quantity }}</li>
    <li>Total Amount: ${{ $orderAmount }}</li>
</ul>
<p>We appreciate your business</p>
</body>
</html>
