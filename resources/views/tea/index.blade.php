<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/tea.css')
    <title>Document</title>
</head>
<body>
    <h1>Tea List</h1>

        
     <form>
            @csrf
            <div class="tea-container"> 
            <div class="createButton">
            <a href="/homepage/{{ $user->id }}/create">+</a>
            </div>
            <div class="tea-list">

            @foreach ($teas as $tea)

                <div class="tea-item">
                        {{ $tea->tea_name }}
                <hr>
                </div>
                
            @endforeach

            </div>

            </div>
   </form>

</body>
</html>