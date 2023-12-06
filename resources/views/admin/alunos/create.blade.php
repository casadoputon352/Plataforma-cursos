<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CursoMill | Plataforma de Cursos Online</title>
  @vite('resources/css/app.css')
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <header>
    <nav class="navbar">
      <h2 class="logo">CursosMill</h2>
      <ul class="ul">
        <li><a href="{{url('/')}}">Cursos</a></li>
        <li><a href="{{ route('planos') }}">Planos</a></li>
        <li><a href="{{ route('sobre') }}">Sobre</a></li>
        @auth
        @hasrole('admin')
        <li><a href="{{ route('dashboard') }}">Admin</a></li>
        @endhasrole
        @endauth
      </ul>
      @if (Route::has('login'))
      @auth
      <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="btn login-btn"> Sair</a>
      </form>
      @else
      <a class="btn login-btn" href="{{ route('login') }}">Login</a>
      @endauth
      @endif

      <div class="toggle" onclick="toggleMenu()">
        <i class='openIcon bx bx-menu'></i>
        <i class='closeIcon bx bx-x' style="display: none;"></i>
      </div>
    </nav>
  </header>
  <main class="main">
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif
    <div class="painel">

      <h3>Criar Aluno</h3>
      <span class="divider"></span>

      <form method="POST" action="{{ route('alunos.store') }}">
        @csrf
        <label for="nome">Nome*</label>
        <input type="text" id="nome" name="name" placeholder="Digite seu nome" value="{{old('name')}}" required autofocus autocomplete="name">
        <x-input-error :messages="$errors->get('name')" style="margin-top: 0.5rem;" />


        <label for="email">Email*</label>
        <input type="text" id="email" name="email" placeholder="Digite seu e-mail" value="{{old('email')}}" required autocomplete="username">
        <x-input-error :messages="$errors->get('email')" style="margin-top: 0.5rem;" />

        <label for="password">Senha*</label>
        <input type="password" id="password" placeholder="Digite uma senha segura" name="password" required autocomplete="new-password">
        <x-input-error :messages="$errors->get('password')" style="margin-top: 0.5rem;" />

        <label for="repPassword">Confirmar Senha*</label>
        <input type="password" id="repPassword" placeholder="Repita sua senha" name="password_confirmation" required autocomplete="new-password">
        <x-input-error :messages="$errors->get('password_confirmation')" style="margin-top: 0.5rem;" />

        <button class="btn" id="submit-btn" value="submit">Criar</button>
      </form>

    </div>
  </main>
  <footer class="footer">
    <h4>CursosMill</h4>
    <p>Todos os direitos reservados &copy;</p>
    <h4>Desde 2023</h4>
  </footer>

  <script src="{{Vite::asset('resources/js/index.js')}}"></script>
</body>

</html>