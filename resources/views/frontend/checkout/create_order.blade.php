 @extends('layouts.frontend')
 @section('content')
 @include('frontend.checkout._address_resume')
 <!--Resume-->
 <div class="row py-4">
    <div class="col-12 col-md-4">
        <h2 class="mb-3">Resume</h2>
        <div class="row py-1 border-bottom">
            <div class="col-6">
                <p class="h5 text-muted">Subtotal:</p>
            </div>
            <div class="col-6">
                <p class="h5 text-muted"><b>${{number_format($subtotal)}}</b></p>
            </div>
        </div>
        <div class="row py-1 border-bottom">
            <div class="col-6">
                <p class="h5 text-muted">Shipping:</p>
            </div>
            <div class="col-6">
                <p class="h5 text-muted"><b>${{number_format($shippingPrice)}}</b></p>
            </div>
        </div>
        <div class="row py-1 border-bottom">
            <div class="col-6">
                <p class="h5">Total:</p>
            </div>
            <div class="col-6">
                <p class="h5 text-danger"><b>${{number_format($total)}}</b></p>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{route('frontend.checkout.store_order')}}">
    @csrf
    <button type="submit" class="btn btn-warning btn-lg"><b>Finalize & Pay</b></button>
</form>
@endsection