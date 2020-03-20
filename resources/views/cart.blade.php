@extends('layout')
@section('title',"Giỏ hàng")
@section('content')
    <div class="cart-table">
        <table>
            <thead>
            <tr>
                <th class="product-th">Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th class="total-th">Total</th>
            </tr>
            </thead>
            <tbody>
            @forelse($cart as $p)
            <tr>
                <td class="product-col">
                    <img src="{{asset($p->thumbnail)}}" alt="">
                    <div class="pc-title">
                        <h4>{{$p->product_name}}</h4>
                        <a href="#">Edit Product</a>
                    </div>
                </td>
                <td class="price-col">$59.90</td>
                <td class="quy-col">
                    <div class="quy-input">
                        <span>Qty</span>
                        <input type="number" value="{{$p->cart_qty}}">
                    </div>
                </td>
                <td class="total-col">${{$p->getPrice()}}</td>
            </tr>
            @empty
                <p>Không có sản phẩm nào trong giỏ hàng</p>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="row cart-buttons">

        <div class="col-lg-7 col-md-7 ">
            <a href="{{url("/clear-cart")}}" class="site-btn btn-clear">Clear cart</a>
            <div class="site-btn btn-line btn-update">Update Cart</div>
        </div>
        <div class="col-lg-5 col-md-5 text-lg-right text-left">
            <a class="site-btn btn-continue" href="{{url("checkout")}}">Proceed to checkout</a>
        </div>
    </div>
@endsection
