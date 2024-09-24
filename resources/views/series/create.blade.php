<x-layout title="Nova série">
     <form action="/series/save" method="post">
          @csrf
          <label for="name"> Nome: </label>
          <input type="text" id="nome" name="nome">
          <button type="submit">Enviar</button>
     <form>
</x-layout>