<x-layout title="Editar Séries">

   
    <form method="post" action="{{ route('series.atualizar', $serie->id) }}">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                    <input type="text" class="form-control" value="{{ $serie->nome }}" name="nome" id="nome">
                        @error("nome")
                            <p style="color:crimson">
                                {{$message}}
                            </p>
                        @enderror
            </div>
              


            <div class="col col-2">
                <label for="qtd_temporadas">N. de Temporadas</label>
                <input type="number" class="form-control"   value="{{ $serie->temporadas()->count()  }}" name="qtd_temporadas" id="qtd_temporadas">
            
                    @error("qtd_temporadas")
                    <p style="color:crimson">
                        {{$message}}
                    </p>
                    @enderror
            </div>

            <div class="col col-2">
                <label for="ep_por_temporada">Ep. por Temporada</label>
                <input type="number" class="form-control" value="{{ $serie->ep_por_temporada }}" name="ep_por_temporada" id="ep_por_temporada">
            
                    @error("ep_por_temporada")
                    <p style="color:crimson">
                        {{$message}}
                    </p>
                    @enderror
            </div>

            
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
        
       
</x-layout>