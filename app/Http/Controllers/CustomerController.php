<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function highestSpender()
    {
        $customer = Customer::with('payments')
            ->withSum('payments', 'amount')
            ->orderByDesc('payments_sum_amount')
            ->first();

        return $customer;
    }

    public function highestOrderCount()
    {
        $customer = Customer::select('customerName')
            ->withCount('orders')
            ->orderByDesc('orders_count')
            ->first();

        return $customer;
    }
}
