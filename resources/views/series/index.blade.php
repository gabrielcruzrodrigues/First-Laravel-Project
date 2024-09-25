<x-layout title="Séries">
     <a href="/series/create" class="btn btn-dark mb-3">Criar nova série</a>

     @isset($mensagemSucesso)
     <div class="alert alert-success">
          {{ $mensagemSucesso }}
     </div>
     @endisset

     <ul class="list-group">
          @foreach($series as $serie)
          <li class="list-group-item d-flex justify-content-between align-items-center">
               {{ $serie->nome}}
               <div class="d-flex w-25 justify-content-end">
                    <form action="{{ route('series.edit', $serie->id) }}" method="post">
                         @csrf
                         @method('PUT')
                         <button class="btn btn-warning btn-sm">update</button>
                    </form>
                    <form class="ms-2" action="{{ route('series.destroy', $serie->id) }}" method="post">
                         @csrf
                         @method('DELETE')
                         <button class="btn btn-danger btn-sm">X</button>
                    </form>
               </div>
          </li>
          @endforeach
     </ul>
</x-layout>
