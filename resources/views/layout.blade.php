<!DOCTYPE html>
<html lang="zxx">
@include('html.head')
<body>

<!-- Header section -->
@includeIf('html.header')
<!-- Header section end -->
<!-- Product section -->
<section class="product-section spad">
    <div class="container">
        @yield('content')
    </div>
</section>
<!-- Product section end -->
@includeFirst(['html.footer','footer'])

@yield('popup')
<!-- Modal -->
@if(!Auth::check())
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
            <form action="#" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password"/>
                </div>
            </div>
            <div class="modal-footer">
                <button id="loginBtn" type="button" class="btn btn-primary">Login</button>
            </div>
            </form>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $("#loginBtn").bind("click",function () {
           $.ajax({
               url: "{{url("postLogin")}}",
               method: "POST",
               data: {
                   _token: $("input[name=_token]").val(),
                   email: $("input[name=email]").val(),
                   password: $("input[name=password]").val(),
               },
               success: function (res) {
                   if(res.status){
                        location.reload();
                   }else{
                       alert(res.message);
                   }
               }
           });
        });
    </script>
@endif
</body>
</html>
