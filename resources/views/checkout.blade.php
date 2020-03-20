@extends('layout')
@section('title',"Thanh toán")
@section('content')
    <form class="checkout-form" action="{{url("checkout")}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <h4 class="checkout-title">Thông tin mua hàng</h4>
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" name="customer_name" placeholder="Tên khách hàng *" required>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="address" placeholder="Address *" required>

                        <input type="text" name="telephone" placeholder="Phone no *" required>

                        <div class="checkbox-items">
                            <div class="payment-method" style="margin-top:0">
                                <div class="pm-item">
                                    <input type="radio" value="paypal" name="payment_method" id="one">
                                    <label for="one">Paypal</label>
                                </div>
                                <div class="pm-item">
                                    <input type="radio" value="cod" name="payment_method" id="two">
                                    <label for="two">Cash on delievery</label>
                                </div>
                                <div class="pm-item">
                                    <input type="radio" value="credit_card" name="payment_method" id="three">
                                    <label for="three">Credit card</label>
                                </div>
                                <div class="pm-item">
                                    <input type="radio" value="bank_transfer" name="payment_method" id="four" checked>
                                    <label for="four">Direct bank transfer</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="order-card">
                    <div class="order-details">
                        <div class="od-warp">
                            <h4 class="checkout-title">Your order</h4>
                            <table class="order-table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $total = 0; @endphp
                                @foreach(session('cart') as $p)
                                <tr>
                                    <td>{{$p->product_name}}</td>
                                    <td>{{$p->cart_qty}}</td>
                                    <td>${{$p->getPrice()}}</td>
                                </tr>
                                    @php $total+=($p->cart_qty*$p->price) @endphp
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <th></th>
                                    <th>${{number_format($total,2)}}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <button class="site-btn btn-full" type="submit">Place Order</button>
                </div>
            </div>
        </div>
    </form>
@endsection
