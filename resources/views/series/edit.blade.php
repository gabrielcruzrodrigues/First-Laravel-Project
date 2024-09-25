<x-layout title="Atualizar série">
     <div class="container">
          <form action="{{ route('series.update', $series->id) }}" method="post">
               @csrf
               @method('PUT')
               <label class="form-label">Nome:</label>
               <input class="form-control" name="nome" type="text" value="{{ $series->nome }}">
     
               <button class="btn btn-primary mt-2">Atualizar</button>
          </form>
          <a href="/series" class="btn btn-dark mt-2">Voltar</a>
     </div>
</x-layout>