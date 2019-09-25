
<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        

        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> User Account<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    @if (Auth::check())
                        <li><a href="{{route('user.logout')}}">logout</a></li>
                    @else
                        <li><a href="{{route('user.login')}}">login</a></li>
                        <li><a href="{{route('user.register')}}">register</a></li>
                    @endif
 
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
