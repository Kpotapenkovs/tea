@auth
<header>
<nav class="navbar">
    
       <p class="nav-list"> <a href="/homepage">Sākums</a> </p>

       <p class="nav-list"> <a href="/tea">izveidot tēju</a> </p>

        <form class="logout" action="/logout" method="POST">
        @csrf

        <button class="logout">atteikties</button>
        </form>

</nav>
</header>
@endauth