@vite('resources/css/tea.css')
<x-slot:title>Izveidot uzdevumu</x-slot:title>


<div class="create_tea_container">
  <div class="create_tea">
<h1>Izveidot tēju</h1>

<form class="flex-container" method="POST" action="/">
@csrf
  <input name="tea_name" placeholder="tējas nosaukums" class="input_field"/>
  @error("tea_name")
    <p>{{ $message }}</p>
  @enderror

<input name="shugar" placeholder=" cik daudz cukura" class="input_field"/>
  @error("shugar")
    <p>{{ $message }}</p>
  @enderror

  plānotais laiks <br>
  <input name="planing_time" type="datetime-local" class="input_date"/>
  @error("planing_time")
    <p>{{ $message }}</p>
  @enderror

  <input name="bonus_snack" placeholder="kautkas vēl klāt" class="input_field"/>
  @error("bonus_snack")
    <p>{{ $message }}</p>
  @enderror

  <button class="submit_button">Saglabāt</button>
</form>
</div>
</div>
