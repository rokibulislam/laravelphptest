<!DOCTYPE html>
<html>
    <head>
    <title>User Card - {{ $user->name }} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }} " />
    <noscript><link rel="stylesheet" href="{{ asset('css/noscript.css') }}" /></noscript>
    </head>
    <body class="is-preload">
        <div id="wrapper">
            <section id="main">
                <header>
                    <span class="avatar"><img src="{{ $user->avater() }}" alt="" /></span>
                    <h1> {{ $user->name }} </h1>
                    <p> {{ nl2br($user->comments) }} </p>
                </header>
            </section>
            <footer id="footer">
                <ul class="copyright">
                    <li>&copy; Pictureworks</li>
                </ul>
            </footer>
        </div>
        <script>
            if ('addEventListener' in window) {
                window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-preload\b/, ''); });
                document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
            }
        </script>
    </body>
</html>
