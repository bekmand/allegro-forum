<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="navbar-form navbar-right">
                @if(Auth::check())
                    <p class="navbar-text">Du er logged inn som: {{Auth::user()->email}}</p>
                    <a href="{{ url('/auth/logout') }}">
                        <button type="submit" class="btn btn-default form-control">logout</button>
                    </a>
                @else
                    <a href="{{ url('/auth/login') }}">
                        <button class="btn btn-default form-control">login</button>
                    </a>

                    <a href="{{ url('/auth/register') }}">
                        <button class="btn btn-default form-control">register</button>
                    </a>
                @endif
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>