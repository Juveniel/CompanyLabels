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
            @include('front.partials.navigation');
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
