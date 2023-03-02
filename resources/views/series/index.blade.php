<x-layout title="Listar Series">

    <a href="{{ route('series.criar') }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          
    <span> {{ $serie->id }} </span>
     
     <a class="btn btn-primary" href="{{ route('series.editar', $serie->id) }}">
           
        <i class="fas fa-external-link-alt"></i> 
</a>
       <form method="POST" action="{{ route('series.remover', $serie->id) }}" onsubmit="return confirm('Tem certeza?')"> 
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"> <i class="far fa-trash-alt"></i></button>  </form>
        
    </li>
        @endforeach
    </ul>
</x-layout>