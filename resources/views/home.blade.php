@extends('layout')

@section('content')
    <ul class="product-filter controls">
        <li class="control" data-filter=".new">New arrivals</li>
        <li class="control" data-filter="all">Recommended</li>
        <li class="control" data-filter=".best">Best sellers</li>
    </ul>
    <div class="row" id="product-filter">
        <div class="mix col-lg-3 col-md-6 best">
            <div class="product-item">
                <figure>
                    <img src="img/products/1.jpg" alt="">
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
                    <h6>Long red Shirt</h6>
                    <p>$39.90</p>
                    <a href="#" class="site-btn btn-line">ADD TO CART</a>
                </div>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-6 new">
            <div class="product-item">
                <figure>
                    <img src="img/products/2.jpg" alt="">
                    <div class="bache">NEW</div>
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
                    <h6>Hype grey shirt</h6>
                    <p>$19.50</p>
                    <a href="#" class="site-btn btn-line">ADD TO CART</a>
                </div>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-6 best">
            <div class="product-item">
                <figure>
                    <img src="img/products/3.jpg" alt="">
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
                    <h6>long sleeve jacket</h6>
                    <p>$59.90</p>
                    <a href="#" class="site-btn btn-line">ADD TO CART</a>
                </div>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-6 new best">
            <div class="product-item">
                <figure>
                    <img src="img/products/4.jpg" alt="">
                    <div class="bache sale">SALE</div>
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
                    <h6>Denim men shirt</h6>
                    <p>$32.20 <span>RRP 64.40</span></p>
                    <a href="#" class="site-btn btn-line">ADD TO CART</a>
                </div>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-6 best">
            <div class="product-item">
                <figure>
                    <img src="img/products/5.jpg" alt="">
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
                    <h6>Long red Shirt</h6>
                    <p>$39.90</p>
                    <a href="#" class="site-btn btn-line">ADD TO CART</a>
                </div>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-6 new">
            <div class="product-item">
                <figure>
                    <img src="img/products/6.jpg" alt="">
                    <div class="bache">NEW</div>
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
                    <h6>Hype grey shirt</h6>
                    <p>$19.50</p>
                    <a href="#" class="site-btn btn-line">ADD TO CART</a>
                </div>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-6 best">
            <div class="product-item">
                <figure>
                    <img src="img/products/7.jpg" alt="">
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
                    <h6>long sleeve jacket</h6>
                    <p>$59.90</p>
                    <a href="#" class="site-btn btn-line">ADD TO CART</a>
                </div>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-6 best">
            <div class="product-item">
                <figure>
                    <img src="img/products/8.jpg" alt="">
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
                    <h6>Denim men shirt</h6>
                    <p>$32.20 <span>RRP 64.40</span></p>
                    <a href="#" class="site-btn btn-line">ADD TO CART</a>
                </div>
            </div>
        </div>
    </div>
@endsection
