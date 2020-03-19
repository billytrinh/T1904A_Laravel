<header class="header-section header-normal">
    <div class="container-fluid">
        <!-- logo -->
        <div class="site-logo">
            <img src="{{asset("img/logo.png")}}" alt="logo">
        </div>
        <!-- responsive -->
        <div class="nav-switch">
            <i class="fa fa-bars"></i>
        </div>
        <div class="header-right">
            @php $cart= session("cart") @endphp
            @if(isset($cart))
                <a href="{{url("cart")}}" class="card-bag"><img src="{{asset("img/icons/bag.png")}}" alt=""><span>{{count($cart)}}</span></a>
            @else
            <a href="{{url("cart")}}" class="card-bag"><img src="{{asset("img/icons/bag.png")}}" alt=""><span>0</span></a>
            @endif
            <a href="#" class="search"><img src="{{asset("img/icons/search.png")}}" alt=""></a>
        </div>
        <!-- site menu -->
        <ul class="main-menu">
            <li><a href="{{url("/")}}">Home</a></li>
            @foreach(\App\Category::all() as $c)
            <li><a href="{{url("/danh-muc/{$c->id}")}}">{{$c->category_name}}</a></li>
            @endforeach
        </ul>

    </div>
</header>
