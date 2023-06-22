@component('mail::message')
# @lang("all.email_new_order") 📢📢📢

@lang('all.email_new_order_desc') **{{ config('app.name') }}**

## @lang('all.email_order_details')

### @lang('all.email_client_name')  : {{$order->client_name}}
### @lang('all.email_client_email')  : {{$order->client_email}}
### @lang('all.email_client_phone')  : {{$order->client_phone}}
### @lang('all.email_order_id')      : #{{$order->id}}
### @lang('all.email_product_name')    : #{{$order->product->name}}
### @lang('all.email_product_id')    : #{{$order->product_id}}
----
## @lang('all.email_message') :
{!! $order->message !!}
----

@component('mail::button', ['url' => route('orders.details', $order)])
@lang('all.email_view_order')
@endcomponent

@lang('all.email_thanks'),<br>
{{ config('app.name') }}
@endcomponent
