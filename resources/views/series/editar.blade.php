<x-layout title="Editar Séries">

   
    <form method="post" action="{{ route('series.atualizar', $serie->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $serie->nome }}">

        </div>
        @error("nome")
            <p style="color:crimson">
                {{$message}}
        </p>
            @enderror
        <button class="btn btn-primary">Alterar</button>
        </form>
</x-layout>