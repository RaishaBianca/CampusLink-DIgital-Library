    <nav class=" pt-4 flex justify-between container m-auto items-center">
        <a href="/"><img src="images/logo.svg" alt="" class=""></a>
        @auth
        <div class="logout-profile-buttons flex space-x-6 text-white justify-center items-center">
            <span class="capitalize">
                Welcome, {{auth()->user()->name}}
            </span>
            <a href="/libraries/profile"><i class="fa-solid fa-user"></i></a>
            <form action="/logout" method="POST" class="inline m-0">
                @csrf
                <button type="submit" class="bg-darkRed text-white p-2 rounded-md hover:bg-Red "><i class="fa-solid fa-door-closed"></i> Logout</button>
            </form>
        </div>    
        @else
        <div class="login-signup-buttons flex space-x-6">
            <div class="text-white self-center"><a href="/login">Login</a></div>
            <div class="bg-darkRed text-white p-2 rounded-md px-4 hover:bg-Red"><a href="/register">Signup</a></div>
        </div>
        @endauth
    </nav>
