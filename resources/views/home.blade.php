@extends('layout')
@section('title',"Trang chủ")
@section('content')
    <ul class="product-filter controls">
        <li class="control" data-filter=".new">New arrivals</li>
        <li class="control" data-filter="all">Recommended</li>
        <li class="control" data-filter=".best">Best sellers</li>
    </ul>
    <h2>Sản phẩm mới nhất</h2>
    <div class="row" >

        @foreach ($newests as $p)
        <div class="mix col-lg-3 col-md-6 best">
            <div class="product-item">
                <figure>
                    <img src="{{ $p->thumbnail }}" alt="">
                    <div class="pi-meta">
                        <div class="pi-m-left">
                            <img src="img/icons/eye.png" alt="">
                            <p>quick view</p>
                        </div>
                        <div class="pi-m-right">
                            <img src="img/icons/heart.png" alt="">
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
    <h2>Sản phẩm rẻ nhất</h2>
    <div class="row">

        @foreach ($cheaps as $p)
            <div class="mix col-lg-3 col-md-6 best">
                <div class="product-item">
                    <figure>
                        <img src="{{ $p->thumbnail }}" alt="">
                        <div class="pi-meta">
                            <div class="pi-m-left">
                                <img src="img/icons/eye.png" alt="">
                                <p>quick view</p>
                            </div>
                            <div class="pi-m-right">
                                <img src="img/icons/heart.png" alt="">
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
    <h2>Sản phẩm đắt nhất</h2>
    <div class="row">

        @foreach ($exs as $p)
            <div class="mix col-lg-3 col-md-6 best">
                <div class="product-item">
                    <figure>
                        <img src="{{ $p->thumbnail }}" alt="">
                        <div class="pi-meta">
                            <div class="pi-m-left">
                                <img src="img/icons/eye.png" alt="">
                                <p>quick view</p>
                            </div>
                            <div class="pi-m-right">
                                <img src="img/icons/heart.png" alt="">
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

@section('popup')
 day la noi dung chen vao vung popup
@endsection
