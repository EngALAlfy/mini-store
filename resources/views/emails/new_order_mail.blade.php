@component('mail::message')
# @lang("all.new_order") 📢📢📢

@lang('all.new_order_desc') **{{ config('app.name') }}**

## @lang('all.order_details')

### @lang('all.client_name')  : {{$order->client_name}}
### @lang('all.client_email')  : {{$order->client_email}}
### @lang('all.client_phone')  : {{$order->client_phone}}
### @lang('all.order_id')      : #{{$order->id}}
### @lang('all.product_name')    : #{{$order->product->name}}
### @lang('all.product_id')    : #{{$order->product_id}}
----
## @lang('all.message') :
{!! $order->message !!}
----

@component('mail::button', ['url' => route('orders.details', $order)])
@lang('all.view_order')
@endcomponent

@lang('all.thanks'),<br>
{{ config('app.name') }}
@endcomponent
