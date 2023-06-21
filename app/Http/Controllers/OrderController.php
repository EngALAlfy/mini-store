<?php

namespace App\Http\Controllers;

use App\Mail\NewOrderMail;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Setting;
use GreenApi\RestApi\GreenApiClient;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index');
    }

    public function details(Order $order)
    {
        return view('orders.details', compact('order'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();

        $order = Order::create($data);

        $this->sendMail($order);
        $this->sendWhatsapp($order);

        $this->success();
        return back();
    }

    public function sendMail(Order $order)
    {
        $orders_email = Setting::find('orders_email')->value ?? null;
        if ($orders_email) {
            Mail::to($orders_email)->send(new NewOrderMail($order));
        }
    }

    public function sendWhatsapp(Order $order)
    {
        $orders_whatsapp = Setting::find('orders_whatsapp')->value ?? null;
        if($orders_whatsapp){
            $order_whatsapp_details = $this->getOrderDetailsAsText($order);
            $greenApi = new GreenApiClient(getenv("GREEN_API_INSTANCE"), getenv('GREEN_API_TOKEN'));
            $greenApi->sending->sendMessage("$orders_whatsapp@c.us", $order_whatsapp_details);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    private function getOrderDetailsAsText(Order $order)
    {
        $product_id = $order->product->id;
        $product_name = $order->product->name;
        $order_id = $order->id;
        $message = $order->message;
        $client_name = $order->client_name;
        $client_email = $order->client_email;
        $client_phone = $order->client_phone;
        $order_url = route('orders.details' , $order);

        return
    "*New Order* 📢📢📢
    _new order from your website_

    *# Order details*

    *Client name* : $client_name
    *Client email* : $client_email
    *Client phone* : $client_phone

    *Product name* : $product_name
    *Product ID* : $product_id
    *Order ID* : $order_id

    *Message* :
    $message
    -------------------------------------------------------
    [Order Link]
    $order_url";

    }
}
