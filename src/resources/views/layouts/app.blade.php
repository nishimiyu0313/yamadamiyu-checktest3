<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/common.css')}}">
    @yield('css')
</head>

<body>
    <div class="app">
        <header class="header">
            <h1 class="header__heading">PiGLy</h1>
            
            <form class="weight-form" action="/weight_logs/goal_setting" method="get">
                <input class="admin__create-btn " type="submit" value="目標体重設定">
            </form>
            <form class="form" action="/logout" method="post">
                @csrf
                <button class="header-nav__button">ログアウト</button>
            </form>

            @yield('link')
        </header>
        <div class="content">
            @yield('content')
        </div>
        </div>
</body>

</html>