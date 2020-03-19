@extends('layout')
@section('title',"Giỏ hàng")
@section('content')
    <ul>
    @forelse($cart as $p)
{{--        <li>{{$p->product_name}} -- {{$p->cart_qty}} -- {{sprintf("%d",$p->price)}}</li>--}}
        <li>{{$p->product_name}} -- {{$p->cart_qty}} -- {{$p->getPrice()}}</li>
     @empty
        <p>Không có sản phẩm nào trong giỏ hàng</p>
    @endforelse
    </ul>
    <a href="{{url("/clear-cart")}}">Remove all</a>
@endsection
