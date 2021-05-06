<!DOCTYPE html>
<html lang="{{ config('app.locale')}}">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layout.css">
    <meta charset="UTF-8">
    <title>Venda de produtos</title>
</head>
<body>
    <header>
        <div class="logo-b">
            <a href="/search_store">
                <img src="{{ asset('/img/buyall_logo_simple_transp.png') }}" class="logo-img" alt="">
            </a>
        </div>

        <div class="menu bg-secondary">



            <div class="user-status">
                @auth
                    <p> {{Auth::user()->name}} </p>
                @endauth
                @guest
                    <a href="register">Registrar-se</a>
                    <a href="login">Login</a>
                @endguest
            </div>

        </div>

    </header>
    <div class="general">
        <div class="content">
            <button class="btn voltar" onClick="history.go(-1)">
                <img src="/img/seta.png" alt="">
            </button>
            @yield('content')
        </div>
    </div>
    <footer class="rights">
            <p>Todos os direitos reservados a Pedro Lana @ {{date('Y')}}</p>
    </footer>
</body>
</html>
