@vite('resources/css/tea.css')
<x-slot:title>Izveidot uzdevumu</x-slot:title>


<div class="create_tea_container">
  <div class="create_tea">
<h1>Izveidot tēju</h1>

<form method="POST" action="/homepage">
@csrf
  <input name="tea_name" placeholder="tējas nosaukums" class="input_field"/>
  @error("tea_name")
    <p>{{ $message }}</p>
  @enderror
<br>
<input name="shugar" placeholder=" cik daudz cukura" class="input_field"/>
  @error("shugar")
    <p>{{ $message }}</p>
  @enderror

<br>
  plānotais laiks: <br>
  <input name="planing_time" type="time" class="input_date"/>
  <input name="planing_date" type="date" class="input_date"/>
  @error("planing_date")
    <p>{{ $message }}</p>
  @enderror
<br>
<br>
  <input name="bonus_snack" placeholder="kautkas vēl klāt" class="input_field"/>
  @error("bonus_snack")
    <p>{{ $message }}</p>
  @enderror

  <button class="submit_button">Saglabāt</button>
</form>
</div>
</div>
