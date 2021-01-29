<!doctype html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Homework</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    </head>
    <body>
        <nav class="nav">
            <div class="navigation">
                <div class="nav-tabs">
                    <div class="nav-item"><a class="nav-link" href="/homework"><i class="fas fa-graduation-cap"></i>&nbsp;Homework</a></div>
                </div>
                <div class="nav-tabs">
                    <a class="nav-link" href="/subjects"><i class="fas fa-folder-open"></i>&nbsp;Subjects</a>
                </div>
            </div>
            <div class="navigation-logo">
                <p class="p-logo grand">HOMEWORKS</p>
            </div>
        </nav>

        @yield('content')
    </body>
</html>
