<x-layout>
    
    {{-- Back Button --}}
        <i class="fa-solid fa-arrow-left container ml-16 my-6"><a href="/" class="ml-4">Back</a></i>

    {{-- Content --}}
    <div id="book-info" class="container mx-16 flex space-x-8">
        <div id="left-content" class="w-1/2">
            @if(Str::startsWith($library->image, ['http://', 'https://']))
                <img src="{{ $library->image }}" alt="{{ $library->title }}" class="object-center object-cover w-full h-full rounded-md">
            @else
                <img src="{{$library->image ? asset('storage/' . $library->image) : asset('storage/images/no-image.png')}}" alt="{{ $library->title }}" class="object-center object-cover w-full h-full rounded-md">
            @endif
        </div>
        <div id="right-content" class="w-1/2 flex flex-col space-y-4 pb-4">
            <h1 class="font-bold text-3xl">{{$library->title}}</h1>
            <div id="buttons" class="flex w-full space-x-8">
                <form method="POST" action="/libraries/{{$library->id}}/list">
                    @csrf
                    <button type="submit" class="px-4 py-4 bg-white text-darkRed rounded-md hover:bg-gray-200">Add to list</button>
                </form>                
                <a href="" class="h-fit px-4 py-4 text-white bg-darkRed rounded-md hover:bg-Red">Borrow</a>
            </div>
            <p>{{$library->description}}</p>
            <hr class="border-t-2 border-gray-400 w-full">
            <table class="border-separate border-spacing-y-4">
                    <tr>
                        <td class="text-gray-500">Author</td>
                        <td>{{$library->author}}</td>
                    </tr>
                    <tr>
                        <td class="text-gray-500">isbn</td>
                        <td>{{$library->isbn}}</td>
                    </tr>
                    <tr>
                        <td class="text-gray-500">Publisher</td>
                        <td>{{$library->publisher}}</td>
                    </tr>
                    <tr>
                        <td class="text-gray-500">Category</td>
                        <td><a href="?tag={{$library->category}}" class="text-darkRed">{{$library->category}}</a></td>
                    </tr>
                    <tr>
                        <td class="text-gray-500">Available</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td class="text-gray-500">Copies Left</td>
                        <td>0</td>
                    </tr>
            </table>     
            <a href="#" class="text-gray-800 flex space-x-4 items-center opacity-80 hover:text-gray-500 max-w-fit">
                <i class="fas fa-scroll"></i><p class=" ">Cite this item</p>
            </a>                
        </div>
    </div>
</x-layout>