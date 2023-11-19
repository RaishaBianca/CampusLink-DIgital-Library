@vite('resources/js/app.js')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        darkBlue: "#003366",
                        lightGray: "#CCCCCC",
                        darkRed: "#990000",
                        Red:'#E23030',
                        lightWhite: '#F8F8F8',
                        veryDarkBlue: "#002951",
                    },
                    screens: {
                        'sm': '640px',
                        'md': '768px',
                        'lg': '1024px',
                        'xl': '1280px',
                        '2xl': '1536px',
                    },
                    fontFamily: {
                        'sans': ['Mullish', 'sans-serif'],
                        'serif': ['Merriweather', 'serif'],
                    },
                    backgroundImage: {
                        'hero-pattern': "url('images/hero-bg.jpg')",
                    },
                    backgroundColor: {
                    'overlay': 'rgba(1, 32, 64, 0.67)', 
                },                    
                },
            },
        };
    </script>
    <title>Campus Link</title>
</head>
<body class="flex flex-col min-h-screen text-base bg-lightGray">
    @if(!request()->is('/') && !request()->routeIs('libraries.index'))
    <div class="w-full bg-darkBlue h-fit">
        <nav class=" py-4 flex justify-between container m-auto items-center">
            <a href="/"><img src="{{ asset('images/logo.svg') }}" alt="" class="h-10"></a>
            @auth
            <div class="logout-profile-buttons flex space-x-6 text-white justify-center items-center">
                <span class="capitalize">
                    Welcome, {{auth()->user()->name}}
                </span>
                <a href="/libraries/profile"><i class="fa-solid fa-user"></i></a>
                <form action="/logout" method="POST" class="inline m-0">
                    @csrf
                    <button type="submit" class="bg-darkRed hover:bg-Red text-white p-2 rounded-md"><i class="fa-solid fa-door-closed"></i> Logout</button>
                </form>
            </div>    
            @else
            <div class="login-signup-buttons flex space-x-6">
                <div class="text-white self-center"><a href="/login">Login</a></div>
                <div class="bg-darkRed text-white p-2 rounded-md px-4 hover:bg-Red"><a href="/register">Signup</a></div>
            </div>
            @endauth
    </div>
@endif
    <main class="flex-grow">
        {{$slot}}
    </main>

{{-- Footer --}}
    <footer class="w-full bg-veryDarkBlue flex justify-between items-center px-24 py-8 mt-14">
        <div id="left-side-footer" class=" flex space-x-48 ">
            <div class="flex flex-col space-y-16">
                <img src="{{ asset('images/logo.svg') }}" alt="" class="h-10">
                <div class="flex w-full justify-center space-x-8 text-lightWhite opacity-80 text-xl">
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-facebook"></i></a>
                </div>
            </div>
            <div id="bottom-links" class="flex space-x-16">
                <div id="links1">
                    <ul class="flex flex-col space-y-2">
                        <li class="text-white font-bold"><h6>Campus Link</h6></li>
                        <li><a href="" class="text-lightWhite opacity-80 hover:underline">About Us</a></li>
                        <li><a href="" class="text-lightWhite opacity-80 hover:underline">Contact Us</a></li>
                        <li><a href="" class="text-lightWhite opacity-80 hover:underline">Privacy Policy</a></li>
                        <li><a href="" class="text-lightWhite opacity-80 hover:underline">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div id="links2">
                    <ul class="flex flex-col space-y-2">
                        <li class="text-white font-bold"><h6>Tools</h6></li>
                        <li><a href="" class="text-lightWhite opacity-80 hover:underline">FAQ</a></li>
                        <li><a href="" class="text-lightWhite opacity-80 hover:underline">Help</a></li>
                        <li><a href="" class="text-lightWhite opacity-80 hover:underline">Support</a></li>
                    </ul>
                </div>
                <div id=links3>
                    <ul class="flex flex-col space-y-2">
                        <li class="text-white font-bold"><h6>More Links</h6></li>
                        <li><a href="" class="text-lightWhite opacity-80 hover:underline">Blog</a></li>
                        <li><a href="" class="text-lightWhite opacity-80 hover:underline">Events</a></li>
                        <li><a href="" class="text-lightWhite opacity-80 hover:underline">Jobs</a></li>
                        <li><a href="" class="text-lightWhite opacity-80 hover:underline">Press</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="right-side-footer" class=" bg-darkRed px-6 py-2 text-white font-bold rounded-md hover:bg-Red" ><a href="">Donate</a></div>
    </footer>

</body>
</html>
