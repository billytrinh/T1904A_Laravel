@extends('layout')
@section('title',"Trang danh mục")
@section('content')
    <h1>Day la trang danh sach san pham</h1>
    <div class="row">
        @foreach ($products as $p)
            <div class="mix col-lg-3 col-md-6 best">
                <div class="product-item">
                    <figure>
                        <img src="{{ asset($p->thumbnail) }}" alt="">
                        <div class="pi-meta">
                            <div class="pi-m-left">
                                <img src="{{ asset("img/icons/eye.png")}}" alt="">
                                <p>quick view</p>
                            </div>
                            <div class="pi-m-right">
                                <img src="{{ asset("img/icons/heart.png")}}" alt="">
                                <p>save</p>
                            </div>
                        </div>
                    </figure>
                    <div class="product-info">
                        <h6>{{ $p->product_name}}</h6>
                        <p>{{ $p->price}}</p>
                        <a href="#" class="site-btn btn-line">ADD TO CART</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
