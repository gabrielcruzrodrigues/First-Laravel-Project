<x-layout title="Séries">
     <a href="/series/create" class="btn btn-dark mb-3">Criar nova série</a>

     <ul class="list-group">
          @foreach($series as $serie)
          <li class="list-group-item">{{ $serie->nome}}</li>
          @endforeach
     </ul>
</x-layout>
