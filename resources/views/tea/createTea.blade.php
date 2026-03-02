@vite('resources/css/tea.css')
<x-layout>
<x-slot:title>Izveidot uzdevumu</x-slot:title>


<div class="create_tea_container">
  <div class="create_tea">
<h1>Izveidot tēju</h1>

<form class="flex-container" method="POST" action="/homepage/create">
@csrf
  <input name="name" placeholder="tējas nosaukums" class="input_field"/>
  @error("name")
    <p>{{ $message }}</p>
  @enderror
  <button class="submit_button">Saglabāt</button>
</form>
</div>
</div>
</x-layout>
