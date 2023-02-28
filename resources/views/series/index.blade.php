<x-layout>
    <div class="jumbotron">
        <h1>Séries</h1>
    </div>
    <a href="{{ route('series.criar') }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach($series as $serie)
       <a href="{{ route('series.editar', $serie->id) }}"> <li class="list-group-item">{{ $serie->nome }}</li></a>
        @endforeach
    </ul>
</x-layout>