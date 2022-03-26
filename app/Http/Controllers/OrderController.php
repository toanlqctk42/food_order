<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\payment;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class OrderController extends Controller
{
    public function manageOrder()
    {
        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.customer_id')
            ->join('payments', 'orders.order_id', '=', 'payments.order_id')
            ->select('orders.*', 'customers.name', 'payments.payment_type', 'payments.payment_status')->get();
        return view('BackEnd.Order.manage', compact('orders'));
    }

    public function viewOrder($order_id)
    {
        $order= Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment = payment::where('order_id',$order->order_id)->first();
        $order_detail = OrderDetail::where('order_id',$order->order_id)->get();
        return view('BackEnd.Order.view_order',compact('order','customer','shipping','payment','order_detail'));
    }

    public function deleteOrder($order_id)
    {
        $order = Order::find($order_id);
        $order_detail = OrderDetail::find($order_id);
        $order_detail->delete();
        $order->delete();

        return back()->with('sms','Order Deleted Successfully');
    }

    public function viewInvoice($order_id)
    {
        $order = Order::find($order_id);
        $customer  =Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);

        $payment = payment::where('order_id',$order->order_id)->first();
        $order_details = OrderDetail::where('order_id',$order->order_id)->get();
        
        return view('BackEnd.Order.view_order_invoice',\compact('order','customer','shipping','payment','order_details'));
    }
    
    public function downloadInvoice($order_id)
    {
        $order = Order::find($order_id);
        $customer  =Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
    
        $payment = payment::where('order_id',$order->order_id)->first();
        $order_details = OrderDetail::where('order_id',$order->order_id)->get();
        
        $pdf = PDF::loadView('BackEnd.Order.download_invoice',compact('order','customer','shipping','payment','order_details'));

        return $pdf->stream('OrderInvoice');
    }
}
