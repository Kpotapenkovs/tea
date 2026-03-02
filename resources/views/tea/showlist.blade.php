<x-layout>
<div class="tea-container"> 
<div class="tea-list"> 

@foreach ($tealist as $tealis)
<div class="list_text">
{{ $tealis->name }}<hr>
</div>
@endforeach

</x-layout>