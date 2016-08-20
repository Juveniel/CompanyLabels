<!DOCTYPE html>
<html>
    <head>
        <title>Company Labels</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="author" content="DK">
        <meta name="title" content="Company Labels">
        <meta name="description" content="Company labels application">
        <meta name="keywords" content="">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
        <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
        <![endif]-->

        <!-- CSS -->
        <link href="{{ elixir('output/front.css') }}" rel="stylesheet">

    </head>
    <body class="@yield('body-class')">
        <header id="site-header">
            <div class="wrapper">
                <div id="logo" class='col-sm-3'>
                    <a href="/">
                        <img src="{{asset('images/helikon_logo3.png')}}" alt="logo" />
                    </a>
                </div>
                <nav class='col-sm-8 navbar-right'>
                    <ul class="menu">
                        <li>
                            <a href="/">
                                Начало
                            </a>
                        </li>
                        <li>
                            <a href="/portfolio">
                                Портфолио
                            </a>
                        </li>
                        <li>
                            <a href="/login">
                                Вход
                            </a>
                        </li>
                        <li>
                            <a href="blog">
                                Регистрация
                            </a>
                        </li>
                        <li>
                            <a href="/contact">
                                Контакти
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <main role="main" class='content'>
            @yield('content')
        </main>

        <footer>

        </footer>

        <!-- JS -->
        <script type="text/javascript" src="{{ elixir('output/front.js') }}"></script>
    </body>
</html>
