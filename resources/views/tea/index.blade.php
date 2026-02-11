<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/tea.css')
    <title>Document</title>
</head>
<body>



        @auth




        <form action="/logout" method="POST">
        @csrf

        <button>atteikties</button>
        </form>




<h1>Tea List</h1>

        
     <form>
            @csrf
            <div class="tea-container"> 
            <div class="createButton">
            <a href="/homepage/{{ $user->id }}/create">+</a>
            </div>
            <div class="tea-list">

            @foreach ($teas as $tea)

            @if ($tea->planing_time < now() && $tea->planing_date <= now())


                <div class="expired_date">

                        {{ $tea->tea_name }} 
                        
                        @if (!$tea->bonus_snack == 0)
                            + {{ $tea->bonus_snack}} 
                        
                        @endif

                         

                        <br> cukura daudzums: {{ $tea->shugar }} 

                        <br> plānošanas laiks: {{ $tea->planing_time }}  {{ $tea->planing_date }}
                         <form method="POST" action="homepage/{{$tea->id}}">
                            @csrf
                            @method("delete")
                            <h2><input type="submit" name="delete" value="dzēst"></h2>
                            </form>
                <hr>
                </div>
                @else
                <div class="tea-item">

                {{ $tea->tea_name }} 

                @if (!$tea->bonus_snack == 0)
                    + {{ $tea->bonus_snack}} 

                @endif

                <br> cukura daudzums: {{ $tea->shugar }} 

                <br> plānošanas laiks: {{ $tea->planing_time }}  {{ $tea->planing_date }}

                <form method="POST" action="homepage/{{$tea->id}}">
                    @csrf
                    @method("delete")
                    <h2><input type="submit" name="delete" value="dzēst"></h2>
                    </form>
                    
    @endif
            @endforeach

            

            </div>

            </div>


            </form>




            @endauth
    







            @guest
            <p>Sveiks, viesi!</p>
            <a href="/login">login</a>
            <br>
            <br>
            <a href="/register">reģistrēties</a> 
            @endguest
   

</body>
</html>