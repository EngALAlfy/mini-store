@component('mail::message')
# New Order 📢📢📢

New order from you store **{{ config('app.name') }}**

## Order Details

### Client Name  : {{$order->client_name}}
### Client Email  : {{$order->client_email}}
### Client Phone  : {{$order->client_phone}}
### Order ID      : #{{$order->id}}
### Product ID    : #{{$order->product_id}}
----
## Message :
{!! $order->message !!}
----

@component('mail::button', ['url' => route('orders.details', $order)])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
