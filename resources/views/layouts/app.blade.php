<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{Html::style('css/app.css')}}
    {{Html::style('css/bootstrap.min.css')}}
    {{Html::style('css/bootstrap-theme.min.css')}}
    {{Html::style('css/offcanvas.css')}}
    {{Html::style('css//ie10-viewport-bug-workaround.css')}}
</head>
<body>
  <nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">The Shop</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="/sobre">Sobre</a></li>
          <li><a href="/carrinho">{{Html::image('img/cart.png')}} Carrinho</a></li>

          @if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
          @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->email }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                          <a href="#">Histórico de pedidos</a>
                        </li>
                        <li>
                          <a href="#">Endereço de entrega</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif



        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-xs-12 col-sm-9">
        <p class="pull-right visible-xs">
          <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Categorias</button>
        </p>

        @yield('header1')
        <div class="row">
          @yield('content')
          @yield('search')
          @yield('produtoszone')
        </div>
      </div>
      <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
        <div class="list-group">
          @yield('categoriaszone')
        </div>
      </div>
    </div>
    <hr>
    <footer>
      <p>&copy; 2018 The Shop, Inc.</p>
    </footer>
  </div>
  {{ Html::script('js/jquery-3.2.1.min.js')}}
  {{ Html::script('js/bootstrap.min.js')}}
  {{ Html::script('js/offcanvas.js')}}
</body>
</html>
