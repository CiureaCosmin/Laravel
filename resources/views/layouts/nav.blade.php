<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @yield('css')
    <style>

    </style>
    <!---->
</head>
<body>

<nav class="navbar navbar-inverse" style="border-radius: 0px; margin-bottom: 0px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="">CIXCO</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{url('/')}}">Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href=" {{url('/produse')}}">Produse</a></li>
                    <li><a href=" {{url('/users')}}">Users</a></li>
                </ul>
            <li><a href="{{url('/tasks')}}">Tasks</a></li>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
            <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="{{ route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            @else
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name  }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li><a href="{{route('users.show',$user=Auth::user()->id)}}">Profile</a></li>
                        <li><a href="{{route('events.index')}}">Petreceri</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>

        @yield('content')

@yield('scripts')

</body>
</html>
