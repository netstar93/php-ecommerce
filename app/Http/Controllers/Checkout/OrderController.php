<?php

namespace App\Http\Controllers\Checkout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers;
use  App\Model\Product;
use  App\Model\Order;
use  App\Model\Quote;
use  App\Model\Order_item;
use  DB;

class OrderController extends Controller
{
    const shipping_charge = 40;

    public function save(Request $request) {
        $addr_id = $request ->address_id;
        $payment_method = $request ->payment_type;
        $orderModel = new Order();
        $customer = session('customer');
        $quoteModel = new Quote();
        $quote = Quote::find($customer['id']);
        $quote_id = $quoteModel -> getCustomerQuoteId();
        $cart_items = $quoteModel -> getCartItems();
//echo "<pre>"; print_r($cart); die;
        $orderModel ->customer_id = $customer['id'];
        $orderModel ->address_id = $addr_id;
        $orderModel ->payment_method = $payment_method;
        $orderModel ->total_amount = 100;//$cart['grand_total'];
        $orderModel ->status = 'pending';
        $orderModel ->save();
        $order_id =  $orderModel ->id;
        $order_id = $quote_id = 1212;
        if($order_id > 0) {
            $order_items = array();
            foreach ($cart_items  as $item) {
                $item = Order_item::insertGetId([
                    'order_id' => $order_id,
                    'item_id' => $item ->product_id,
                    'amount' => $item ->amount,
                    'shipping_method' => 1,
                ]);
                $order_items[] = $item;
            }
            $is_paid =  $this ->processPayment($quote,$order_id,$payment_method);
            if($is_paid){
                return view('checkout.success')->with('order_id',$order_id );
            }
            else{
                return view('checkout.success')->with('error',"something went wrong" );
            }
        }
    }
    public function processPayment($quote,$order_id,$method = null){
        if(!$method) return false;
        if($method == 'cod') return true;

        $pay_id= DB :: table('order_payment') ->insertGetId([
            'order_id' =>$order_id,
            'method' => $method,
            'paid_amount' =>$quote ->total_amount
        ]);
        if($pay_id > 0 ){ return true;} else{ return false;}
    }
}
