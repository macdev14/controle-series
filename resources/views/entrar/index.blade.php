<x-layout title="Entrar">

    <form method="post" action="{{  route('usuario.entrar') }}">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
       <input type="email" name="email" id="email" required class="form-control">
       @error("email")
       <p style="color:crimson">
           {{$message}}
       </p>
       @enderror
    </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
            @error("password")
            <p style="color:crimson">
                {{$message}}
            </p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Entrar
        </button>

        <a href="{{ route('usuario.registrar') }}" class="btn btn-secondary mt-3">
            Registrar-se
        </a>
    </form>

</x-layout>