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
<body class="text-base bg-lightGray">

    {{-- Hero Section --}}
    <div id="Hero" class=" bg-hero-pattern w-full bg-cover bg-center relative">
        <div class="bg-overlay w-full m-0 flex flex-col space-y-14"> 
            <nav class=" pt-4 flex justify-between container m-auto items-center">
                    <img src="images/logo.svg" alt="" class="">
                    <div class="login-signup-buttons flex space-x-6">
                        <div class="text-white self-center"><a href="">Login</a></div>
                        <div class="bg-darkRed text-white p-2 rounded-md px-4 hover:bg-Red"><a href="">Signup</a></div>
                    </div>
            </nav>
            <div class="bottom-hero container md:w-1/2 m-auto flex flex-col space-y-9 items-center justufy-between h-52">
                <p class="text-white text-center text-xl md:text-2xl">
                    Access hundreds scholarly articles, books, and multimedia resources in our expansive university digital library.
                </p>
                <form action="/" class="w-1/2 flex">
                    <input type="text" name="search" id="search" class="ps-2 py-2 rounded-l-sm text-left w-full" placeholder="Search the collection">
                    <button type="submit" class="rounded-r-sm bg-darkBlue text-white text-sm px-6">Search</button>
                </form>          
                </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="space-y-16">
        {{-- Category --}}
        <div id="category" class="px-20 pt-9 md:pt-16 space-y-6">
            <h1 class="font-bold text-xl container">Category</h1>
            <div class="flex justify-between items-center gap-x-4">
                <figure class="w-full">
                    <a href="" class="relative">
                        <div class="relative">
                            <img class="hover: object-cover h-44 rounded-lg w-full" src="/images/Conference.jpg" alt="">
                            <div class="absolute rounded-lg inset-0 bg-overlay opacity-0 hover:opacity-100 transition-opacity"></div>
                        </div>
                    <figcaption class="mt-2 text-center text-darkRed hover:underline">Conference Proceedings</figcaption>
                </a>
                </figure>
                <figure class="w-full">
                    <a href="" class="relative">
                        <div class="relative">
                            <img class="object-cover h-44 rounded-lg w-full" src="/images/reference.jpg" alt="">
                            <div class="absolute rounded-lg inset-0 bg-overlay opacity-0 hover:opacity-100 transition-opacity"></div>
                        </div>
                    <figcaption class="mt-2 text-center text-darkRed hover:underline">Reference Books</figcaption>
                </a>
                </figure>
                <figure class="w-full">
                    <a href="" class="relative">
                        <div class="relative">
                            <img class="object-cover h-44 rounded-lg w-full" src="/images/academic.jpg" alt="">
                            <div class="absolute rounded-lg inset-0 bg-overlay opacity-0 hover:opacity-100 transition-opacity"></div>
                        </div>
                    <figcaption class="mt-2 text-center text-darkRed hover:underline">Academic Journals</figcaption>
                </a>
                </figure>
            </div>
        </div>           
        
                {{-- Latest Addition --}}
        <div id="latest-addition" class="px-20 pt-9 md:pt-16 space-y-6">
            <h1 class="font-bold text-xl container">Latest Addition</h1>
            @foreach ($libraries as $library)
                <div class="flex flex-col">
                    <div class="flex flex-col md:flex-row space-y-6 md:space-x-9 md:space-y-0 rounded-md" id="books">
                        <div class="relative rounded-md w-64 h-48 overflow-hidden">
                            <a href="" class="">
                                <img src="{{$library->image}}" alt="" class="object-cover w-full h-full">
                                <div class="absolute inset-0 bg-overlay opacity-0 hover:opacity-100 transition-opacity"></div>
                            </a>
                        </div>
                        <div class="flex flex-col" id="description" >
                            <a href="" class="space-y-2 pt-2 max-w-4xl">
                                <p class="font-bold text-lg hover:underline" id="title">{{$library->title}}</p>
                                <p class="text-gray-500" id="category">{{$library->category}}</p>
                                <p class="overflow-hidden overflow-ellipsis">{{$library->description}}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    {{-- Footer --}}

</body>
</html>
