@vite('resources/css/tea.css')
<x-layout>
<x-slot:title>Izveidot atgādni</x-slot:title>


<div class="create_tea_container">
  <div class="create_tea">
<h1>Izveidot atgādni</h1>

<form class="flex-container" method="POST" action="/homepage">
@csrf

@if($tealist->isEmpty())
    <p>Vispirms izveidojiet tēju</p>
@else
    <label for="tea_name">Izvēlaties tēju</label>
    <select id="tea_name" name="tea_name">
        @foreach ($tealist as $tealis)
            <option value="{{ $tealis->name }}">
                {{ $tealis->name }}
            </option>
        @endforeach
    </select>


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
</form>@endif
</div>
</div>

</x-layout>