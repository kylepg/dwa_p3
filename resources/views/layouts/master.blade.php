<!DOCTYPE html>
<html>
<head>
    <!-- METDATA -->
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <!-- FONTAWESOME -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- FAVICON -->
    <link rel="icon" href="/favicon.png" type="image/x-icon" />
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
    <!-- P3 CSS -->
    <link href="/css/p3.min.css" type="text/css" rel="stylesheet">
    <!-- P4 CSS -->
    <script src="/js/p3.min.js"></script>
</head>
<body>
    <div class="container">
        <header>
            @include('includes.header')
        </header>
        <section id="filters">
            @include('modules.filters')
        </section>
        <section id="results">
            @yield('content')
        </section>
    </div>
    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>