
<x-slot:title>Izveidot uzdevumu</x-slot:title>

<h1>Izveidot tēju</h1>

<form method="POST" action="/homepage">
@csrf
  tējas nosaukums: <input name="tea_name" />
  @error("tea_name")
    <p>{{ $message }}</p>
  @enderror
<br>
<br>
  cik daudz cukura: <input name="shugar" />
  @error("shugar")
    <p>{{ $message }}</p>
  @enderror
<br>
<br>
  plānotais laiks: <input name="planing_time" type="time"/>
  @error("planing_time")
    <p>{{ $message }}</p>
  @enderror
  <input name="planing_date" type="date"/>
  @error("planing_date")
    <p>{{ $message }}</p>
  @enderror
<br>
<br>
  kautkas vēl klāt: <input name="bonus_snack" />
  @error("bonus_snack")
    <p>{{ $message }}</p>
  @enderror

  <button>Saglabāt</button>
</form>
