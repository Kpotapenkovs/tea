
<x-layout>

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
            <a href="/{{ $user->id }}/create">+</a>
            </div>
            <div class="tea-list">

            @foreach ($teas as $tea)

            @if ($tea->planing_time < now())


                <div class="expired_date">

                        {{ $tea->tea_name }} 
                        
                        @if (!$tea->bonus_snack == 0)
                            + {{ $tea->bonus_snack}} 
                        
                        @endif

                         

                        <br> cukura daudzums: {{ $tea->shugar }} 

                        <br> plānošanas laiks: {{ $tea->planing_time }}

                                <form method="POST" action="/{{$tea->id}}">

                                @csrf

                                @method("delete")

                                <input type="submit" name="delete" value="dzēst">

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

                <br> plānošanas laiks: {{ $tea->planing_time }}

                            <form method="POST" action="/{{$tea->id}}">

                                @csrf

                                @method("delete")

                                <input type="submit" name="delete" value="dzēst">

                            </form>

                    <hr>
                </div>
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
   

    </x-layout>