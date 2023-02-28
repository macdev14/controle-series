<x-layout>

    <div class="jumbotron">
        <h1>Adicionar Série</h1>
    </div>
    <form method="post" action="{{ route('series.criar') }}">
        @csrf
        <div class="form-group">
        <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">

        </div>
        @error("nome")
            <p style="color:crimson">
                {{$message}}
        </p>
            @enderror
        <button class="btn btn-primary">Adicionar</button>
        </form>
</x-layout>