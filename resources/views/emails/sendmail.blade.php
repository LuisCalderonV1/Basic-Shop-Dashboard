<!DOCTYPE html>
<html>
<head>
    <title>{{getSettings('store_name')['value']}}</title>
</head>
<body>
    <h2>Thanks!</h2>
    <hr>
    <p>Your order #{{$details['order']['id']}} was completed successfully!</p>
    <p>Thanks for your purchase</p>    
    @foreach ($details['orderContent'] as $item)
        <p>{{$item['quantity']}} {{$item['product']['name']}} x ${{ number_format($item['final_price']) }}</p>
    @endforeach
    <p class="mb-0">Subtotal: <b>${{ number_format($details['order']['subtotal']) }}</b></p>
    <p class="mb-0">Shipping: <b>${{ number_format($details['order']['shipping']) }}</b></p>
    <p>Order Total: <b>${{ number_format($details['order']['total']) }} {{getSettings('currency_code')['value']}}</b></p>
</body>
</html>