<x-layout>
    <x-slot:title>rediģēt</x-slot:title>
    <div class="create_tea_container">
  <div class="create_tea">
    <form class="flex-container" action="/homepage/{{ $tea->id }}" method="POST">
        @csrf
        @method("PUT")

        Tējas nosaukums
        <input type="text" id="tea_name" name="tea_name" value="{{ $tea->tea_name }}" required>
        <br>
        Bonusa uzkoda
        <input type="text" id="bonus_snack" name="bonus_snack" value="{{ $tea->bonus_snack }}" >
        <br>
        Cukura daudzums
        <input type="number" id="shugar" name="shugar" value="{{ $tea->shugar }}">
        <br>
        Plānošanas laiks
        <input type="datetime-local" id="planing_time" name="planing_time" value="{{ $tea->planing_time }}" required>
        <br>
        favorite
        <label class="favorite-checkbox">
        <input name="favorite" type="hidden" value="0">
        <input name="favorite" type="checkbox" value="1" {{ old("favorite", $tea->favorite) ? 'checked' : '' }}>
        <span class="checkmark"></span>
        </label>
        <br>  
        <button type="submit" class="submit_button">Saglabāt izmaiņas</button>
    </form>
</div>
</div>

</x-layout>