@component('mail::message')

![alt text]({{asset('/images/logo.png')}} "360Ugly")


# Thank you for your order {{$user['name']}}

## Please print this page and send with your products 

**Order number: 000{{$order['id']}}**

@if($address == null)

Please post the items to the following address

<p>360Ugly</p> 
<p>175 Redgate</p>
<p>Ormskirk</p>
<p>West Lancashire</p>
<p>L39 3NW</p>

@else

We will collect the products from this address 
Please contact us if this is incorrect

<p>{{$address['house']}} {{$address['address1']}}</p>
<p>{{$address['address2']}}</p>
<p>{{$address['area']}}</p>
<p>{{$address['county']}}</p>
<p>{{$address['postcode']}}</p>

@endif

**You have ordered the following products**
@component('mail::table')
| Item Name         | Item Number        | Item Price    						  |
| :---------------- |:------------------ | -------------------------------------: |
@foreach($items as $item)
| {{$item['name']}} | 000{{$item['id']}} | £{{sprintf("%01.2f", $item['price'])}} |
@endforeach
@endcomponent

Order total: £{{sprintf("%01.2f", App\Order::orderPrice($order['id']))}}


@component('mail::button', ['url' => 'http://ugly360.com/user/process'])
Check Order Status
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
