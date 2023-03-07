<nav class="navbar navbar-expand-lg  navbar-light bg-light mb-2 d-flex justify-content-between">
  
      <a class="navbar-brand" href="{{ route('series.listar')}}">Home</a>
    @auth  <a class="navbar-brand text-danger" href="{{ route('usuario.logout') }}">Sair</a>
    @endauth
    @guest
    <a class="navbar-brand text-success" href="{{ route('usuario.login') }}">Entrar</a>
    @endguest
   
  </nav>