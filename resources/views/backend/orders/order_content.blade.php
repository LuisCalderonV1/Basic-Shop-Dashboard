<h2>Shopping Cart</h2>
<!--table-->
<div class="table-responsive">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Discount</th>
        <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
    <tr>
    <?php $n=1 ?>
    @foreach($orderContent as $item)
    <th scope="row">{{$n++}}</th>
    <td class="d-flex justify-content-center"><img src="{{url('images') . '/' . $item->product->image}}" style="height:10vh;" alt="..." ></td>
    <td>{{$item->product->name}}</td>
    <td>{{$item->quantity}} pcs</td>
    <td>${{number_format($item->price_per)}}</td>
    <td>{{$item->discount}}%</td>
    <td>${{number_format($item->price_per * $item->quantity)}}</td>
    </tr>
    @endforeach
    <tr>      
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    </tbody>
    </table>
</div>
<!--/table--> 