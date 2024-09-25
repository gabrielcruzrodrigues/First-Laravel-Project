<x-layout title="Nova série">
     <form action="{{ route('series.store') }}" method="post">
          <div class="mb-2">
               @csrf
               <label for="name" class="form-label"> Nome: </label>
               <input type="text" id="nome" name="nome" class="form-control">
               <button type="submit" class="btn btn-primary mt-2">Enviar</button>
          </div>
          <a href="/series" class="btn btn-dark mb-2">Voltar</a>
     <form>
</x-layout>