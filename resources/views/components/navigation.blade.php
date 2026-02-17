@auth
<header>
<nav class="navbar">
    
       <p class="nav-list"> <a href="/">Sākums</a> </p>

       <p class="nav-list"> <a href="/create_tea">izveidot tēju</a> </p>

        <p class="nav-list"> <a href="/tea_list">tēju saraksts</a> </p>

        <form class="logout" action="/logout" method="POST">
        @csrf

        <button class="logout">atteikties</button>
        </form>

</nav>
</header>
@endauth