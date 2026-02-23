
<x-layout>
    @auth

            @csrf
            <div class="tea-container"> 
            <div class="createButton">
            <a href="homepage/{{ $user->id }}/create">+</a>
            </div>
            <div class="tea-list"> 

            <h1>Tea List</h1>
            <hr>
            
            @foreach ($teas as $tea)
                @if ($tea->planing_time < now())

                    <div class="expired_date">
                        <label class="favorite-image">
                        <svg width="26" height="26" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffd500"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.9121 1.59053C12.7508 1.2312 12.3936 1 11.9997 1C11.6059 1 11.2487 1.2312 11.0874 1.59053L8.27041 7.86702L1.43062 8.60661C1.03903 8.64895 0.708778 8.91721 0.587066 9.2918C0.465355 9.66639 0.574861 10.0775 0.866772 10.342L5.96556 14.9606L4.55534 21.6942C4.4746 22.0797 4.62768 22.4767 4.94632 22.7082C5.26497 22.9397 5.68983 22.9626 6.03151 22.7667L11.9997 19.3447L17.968 22.7667C18.3097 22.9626 18.7345 22.9397 19.0532 22.7082C19.3718 22.4767 19.5249 22.0797 19.4441 21.6942L18.0339 14.9606L23.1327 10.342C23.4246 10.0775 23.5341 9.66639 23.4124 9.2918C23.2907 8.91721 22.9605 8.64895 22.5689 8.60661L15.7291 7.86702L12.9121 1.59053Z" fill="#ffdd00"></path> </g></svg>
                        </label>
                        {{ $tea->tea_name }} 

                        @if (!$tea->bonus_snack == 0)
                            + {{ $tea->bonus_snack}} 
                        @endif
                        @if ($tea->favorite == 1)

                        @endif
                        <br> cukura daudzums: {{ $tea->shugar }} 
                        <br> plānošanas laiks: {{ $tea->planing_time }}

                                <form method="POST" action="homepage/{{$tea->id}}">

                                    @csrf

                                    @method("delete")

                                    <input class="delete" type="submit" name="delete" value="dzēst">

                                </form>

                                </form>

                                <form action="homepage/{{ $tea->id }}/edit" method="GET">

                                    @csrf

                                    <button class="editButton">labot</button>
                                </form>
                                
                    </div>
                    <hr>
                @else
                    <div class="tea-item">
                        <label class="favorite-image">
                        <svg width="26" height="26" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffd500"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.9121 1.59053C12.7508 1.2312 12.3936 1 11.9997 1C11.6059 1 11.2487 1.2312 11.0874 1.59053L8.27041 7.86702L1.43062 8.60661C1.03903 8.64895 0.708778 8.91721 0.587066 9.2918C0.465355 9.66639 0.574861 10.0775 0.866772 10.342L5.96556 14.9606L4.55534 21.6942C4.4746 22.0797 4.62768 22.4767 4.94632 22.7082C5.26497 22.9397 5.68983 22.9626 6.03151 22.7667L11.9997 19.3447L17.968 22.7667C18.3097 22.9626 18.7345 22.9397 19.0532 22.7082C19.3718 22.4767 19.5249 22.0797 19.4441 21.6942L18.0339 14.9606L23.1327 10.342C23.4246 10.0775 23.5341 9.66639 23.4124 9.2918C23.2907 8.91721 22.9605 8.64895 22.5689 8.60661L15.7291 7.86702L12.9121 1.59053Z" fill="#ffdd00"></path> </g></svg>
                        </label>
                    {{ $tea->tea_name }} 

                    @if (!$tea->bonus_snack == 0)
                        + {{ $tea->bonus_snack}} 

                    @endif

                    @if ($tea->favorite == 1)

                        @endif

                    <br> cukura daudzums: {{ $tea->shugar }} 

                    <br> plānošanas laiks: {{ $tea->planing_time }}

                                <form method="POST" action="homepage/{{$tea->id}}">

                                    @csrf

                                    @method("delete")

                                    <input class="delete" type="submit" name="delete" value="dzēst">

                                </form>

                                <form action="homepage/{{ $tea->id }}/edit" method="GET">

                                    @csrf

                                    <button class="editButton">labot</button>
                                </form>

                    </div>
                    <hr> 
                @endif
            @endforeach

            </div>

            </div>

            @endauth

            @guest
            <p>Sveiks, viesi!</p>
            <a href="/login">login</a>
            <br>
            <br>
            <a href="/register">reģistrēties</a> 
            @endguest
   

    </x-layout>