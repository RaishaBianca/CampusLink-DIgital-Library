<x-layout>
    {{-- Hero Section --}}
    @include('partials.hero')
    {{-- Content --}}
    <div class="space-y-16 mb-16">
        {{-- Category --}}
        <div id="category" class="px-20 pt-9 md:pt-16 space-y-6">
            <h1 class="font-bold text-xl container">Category</h1>
            <div class="flex justify-between items-center gap-x-4">
                <figure class="w-full">
                    <a href="/?category=conference" class="relative">
                        <div class="relative">
                            <img class="hover: object-cover h-44 rounded-lg w-full" src="../images/Conference.jpg" alt="">
                            <div class="absolute rounded-lg inset-0 bg-overlay opacity-0 hover:opacity-100 transition-opacity"></div>
                        </div>
                    <figcaption class="mt-2 text-center text-darkRed hover:underline">Conference Proceedings</figcaption>
                </a>
                </figure>
                <figure class="w-full">
                    <a href="/?category=reference" class="relative">
                        <div class="relative">
                            <img class="object-cover h-44 rounded-lg w-full" src="../images/reference.jpg" alt="">
                            <div class="absolute rounded-lg inset-0 bg-overlay opacity-0 hover:opacity-100 transition-opacity"></div>
                        </div>
                    <figcaption class="mt-2 text-center text-darkRed hover:underline">Reference Books</figcaption>
                </a>
                </figure>
                <figure class="w-full">
                    <a href="/?category=academic" class="relative">
                        <div class="relative">
                            <img class="object-cover h-44 rounded-lg w-full" src="../images/academic.jpg" alt="">
                            <div class="absolute rounded-lg inset-0 bg-overlay opacity-0 hover:opacity-100 transition-opacity"></div>
                        </div>
                    <figcaption class="mt-2 text-center text-darkRed hover:underline">Academic Journals</figcaption>
                </a>
                </figure>
            </div>
        </div>           
        
    {{-- Latest Addition --}}
        <div id="latest-addition" class="px-20 pt-4 md:pt-16 space-y-6">
            <h1 class="font-bold text-xl container">Latest Addition</h1>
            @foreach ($libraries as $library)
                <div class="flex flex-col">
                    <a href="/libraries/{{$library->id}}" class="flex flex-col md:flex-row space-y-6 md:space-x-9 md:space-y-0 rounded-md">
                        <div class="relative w-64 h-48 overflow-hidden">
                            @if(Str::startsWith($library->image, ['http://', 'https://']))
                                <img src="{{ $library->image }}" alt="{{ $library->title }}" class="object-center object-cover w-full h-full rounded-md">
                            @else
                                <img src="{{$library->image ? asset('storage/' . $library->image) : asset('storage/images/no-image.png')}}" alt="{{ $library->title }}" class="object-center object-cover w-full h-full rounded-md">
                            @endif
                            <div class="absolute inset-0 bg-overlay opacity-0 hover:opacity-100 transition-opacity rounded-md"></div>
                        </div>
                            <div class="flex flex-col" id="description" >
                                <div class="space-y-2 pt-2 max-w-4xl">
                                    <p class="font-bold text-lg hover:underline" id="title">{{$library->title}}</p>
                                    <p class="text-gray-500" id="category">{{$library->category}}</p>
                                    <p class="overflow-hidden overflow-ellipsis">{{$library->description}}</p>
                                </div>
                            </div>
                        </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <div class="mt-6 p-4">
        {{$libraries->links()}}
    </div>

</x-layout>