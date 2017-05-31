@component('mail::message')

![alt text]({{asset('/images/logo.png')}} "360Ugly")


# Thank you for your order {{$user['name']}}

**Order number: 000{{$order['id']}}**

**The following products have arrived at our studio.**

@component('mail::table')
| Item Name         | Item Number        | Item Price    						  |
| :---------------- |:------------------ | -------------------------------------: |
@foreach($items as $item)
| {{$item['name']}} | 000{{$item['id']}} | £{{sprintf("%01.2f", $item['price'])}} |
@endforeach
@endcomponent

We will begin processing your 360 images straight away

Click the button below to see the current status of your order.

We will email you again when your product is ready for download.

@component('mail::button', ['url' => 'http://360ugly.com/user/process'])
Check Order Status
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
