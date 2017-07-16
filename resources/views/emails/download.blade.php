@component('mail::message')

![alt text]({{asset('/images/logo.png')}} "360Ugly")


# Thank you for your order {{$user['name']}}

**Order number: 000{{$order['id']}}**

The following products have are ready for download.

Please click the 'Check Order Status' button below to approve your 360 products, if you like our work press the paynow button to securely pay with PayPal and unlock your download.


**You have ordered the following products**
@component('mail::table')
| Item Name         | Item Number        | Item Price    						  |
| :---------------- |:------------------ | -------------------------------------: |
@foreach($items as $item)
| {{$item['name']}} | 000{{$item['id']}} | £{{sprintf("%01.2f", $item['price'])}} |
@endforeach
@endcomponent


@component('mail::button', ['url' => 'http://360ugly.com/user/download'])
Download your product
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
