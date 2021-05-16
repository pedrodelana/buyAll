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
                    <a href="/profile"><p> {{Auth::user()->name}} </p></a>
                    <p><a href="/logout">Logout</a></p>
                @endauth
                @guest
                    <p><a href="login">Login</a></p>
                    <p><a href="register">Registrar-se</a></p>
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

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
