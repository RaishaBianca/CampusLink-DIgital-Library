<div id="Hero" class=" bg-hero-pattern w-full bg-cover bg-center relative">
    <div class="bg-overlay w-full m-0 flex flex-col space-y-14"> 
        @include('partials.nav')
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
