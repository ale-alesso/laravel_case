<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Jobs\ProcessOrder;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with('user', 'product')->get();
    }

    public function store(CreateOrderRequest $request)
    {
        $order = Order::create($request->validated());
        ProcessOrder::dispatch($order);

        return response()->json($order, 201);
    }

    public function view(Order $order)
    {
        return $order->load('user', 'product');
    }
}
