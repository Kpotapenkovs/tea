<x-layout>
    <x-slot:title>rediģēt</x-slot:title>
    <div class="create_tea_container">
  <div class="create_tea">
    <form class="flex-container" action="/homepage/{{ $tea->id }}" method="POST">
        @csrf
        @method("PUT")

        Tējas nosaukums
        <input class="edit_input_field" type="text" id="tea_name" name="tea_name" value="{{ $tea->tea_name }}" required>
        Bonusa uzkoda
        <input class="edit_input_field" type="text" id="bonus_snack" name="bonus_snack" value="{{ $tea->bonus_snack }}" >
        Cukura daudzums
        <input class="edit_input_field" type="number" id="shugar" name="shugar" value="{{ $tea->shugar }}">
        Plānošanas laiks
        <input class="edit_input_field" type="datetime-local" id="planing_time" name="planing_time" value="{{ $tea->planing_time }}" required>
        make favorite
        <label class="favorite-checkbox">
        <input name="favorite" type="hidden" value="0">
        <input name="favorite" type="checkbox" value="1" {{ old("favorite", $tea->favorite) ? 'checked' : '' }}>
        <span class="checkmark"></span>
        </label>
        <br>  
        <br>
        <button type="submit" class="submit_button">Saglabāt izmaiņas</button>
    </form>
</div>
</div>

</x-layout>