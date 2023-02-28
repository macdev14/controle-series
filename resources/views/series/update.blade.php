<x-layout>

    <div class="jumbotron">
        <h1>Alterar Série</h1>
    </div>
    <form method="post" action="{{ route('series.atualizar', $serie->id) }}">
        @csrf
        <div class="form-group">
        <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $serie->nome }}">

        </div>
        @error("nome")
            <p style="color:crimson">
                {{$message}}
        </p>
            @enderror
        <button class="btn btn-primary">Adicionar</button>
        </form>
</x-layout>