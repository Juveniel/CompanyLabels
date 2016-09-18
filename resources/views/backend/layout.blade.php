<!DOCTYPE html>
<html lang="en">
<head>
    <title>Company Labels</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="DK">
    <meta name="title" content="Company Labels">
    <meta name="description" content="Company labels application">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
    <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->

    <!-- CSS -->
    <link href="{{ elixir('output/backend.css') }}" rel="stylesheet">
</head>
<body class="@yield('class')">

<div id='portfolio-page'>
    {{-- Navigation Bar --}}
    @if (Auth::check() && Auth::user()->getRole() === 'admin')
        <div class='portfolio-sidebar'>

            <header class='portfolio-header'>
                <div class='square'></div>
                <h1>{!! Auth::user()->username !!}</h1>
                <ul class='user-settings'>
                    <li>
                        <a href='/admin/users/{!! Auth::user()->id !!}' data-toggle="tooltip" title="Profile" data-placement="bottom">
                            <i class='fa fa-fw fa-user'></i>
                        </a>
                    </li>
                    <li>
                        <a href='/admin/lockscreen' data-toggle="tooltip" title="Lock screen" data-placement="bottom">
                            <i class='fa fa-fw fa-lock'></i>
                        </a>
                    </li>
                    <li>
                        <a href='/admin/settings' data-toggle="tooltip" title="Settings" data-placement="bottom">
                            <i class='fa fa-fw fa-gear'></i>
                        </a>
                    </li>
                    <li>
                        <a href='/auth/logout/' data-toggle="tooltip" title="Logout" data-placement="bottom">
                            <i class='fa fa-fw fa-sign-out'></i>
                        </a>
                    </li>
                </ul>
            </header>

            <nav class="portfolio-nav navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed"
                                data-toggle="collapse" data-target="#navbar-menu">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        @include('backend.partials.navbar')
                    </div>
                </div>
            </nav>

        </div>
    @endif

    <div class='portfolio-content'>
        @yield('content')
    </div>

</div>

@yield('scripts')

<script type="text/javascript" src="{{ elixir('output/backend.js') }}"></script>

</body>
</html>