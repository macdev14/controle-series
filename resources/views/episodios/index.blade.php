<x-layout title="Episódios">
    {{-- <form action="/temporada/{{ $temporadaId }}/episodios/assistir" method="post">
         --}}

         <form action="{{ route('temporadas.assistir', $temporada->id)  }}" method="post">
        
        @csrf
        <ul class="list-group">
            @foreach($temporada->episodios()->get() as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episodio->numero }}
                    <input type="checkbox" 
                    name="episodios[]" 
                    value="{{ $episodio->id }}"
                    {{ $episodio->assistido ? 'checked' : '' }}
                    >
                </li>

            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
</x-layout>