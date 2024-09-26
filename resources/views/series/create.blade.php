<x-layout title="Nova série">
     <form action="{{ route('series.store')}}" method="post">
          <div class="mb-2">
               @csrf

               <div class="row mb-3">
                    <div class="col-8">
                         
                         <label for="name" class="form-label"> Nome: </label>
                         <input type="text" autofocus id="nome" name="nome" class="form-control" value="{{ old('nome') }}">
                    </div>
                    <div class="col-2">
                         <label for="seasonQty" class="form-label"> N° Temporadas: </label>
                         <input type="text" id="seasonQty" name="seasonQty" class="form-control" value="{{ old('seasonQty') }}">
                    </div>
                    <div class="col-2">
                         <label for="episodesPerSeason" class="form-label"> Episódios: </label>
                         <input type="text" id="episodesPerSeason" name="episodesPerSeason" class="form-control" value="{{ old('episodesPerSeason') }}">
                    </div>
               </div>
               
          </div>
          <div class="row mb1 w-25 d-flex">
               <button type="submit" class="btn btn-primary mt-2 mb-2">Adicionar</button>
               <a href="/series" class="btn btn-dark mb-2">Voltar</a>
          </div>
     <form>
</x-layout>