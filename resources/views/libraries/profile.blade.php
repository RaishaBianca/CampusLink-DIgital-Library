<x-layout>
    <div id="donations" class="mt-6 w-full px-20">
        <div id="submission-title" class="flex justify-between">
            <h1 class="font-bold text-xl container">Submissions</h1>
            <div class="text-darkRed p-2 rounded-md px-4 hover:bg-gray-400 font-bold min-w-fit"><a href="/libraries/create">Donate a book</a></div>
        </div>
        <table class="mt-4 w-full border-1 border-collapse border border-slate-500">
            <tr class="bg-gray-400">
                <th class="border border-slate-500 w-72">Title</th>
                <th class="border border-slate-500 w-48">Submitted in</th>
                <th class="border border-slate-500">Details</th>
                <th class="border border-slate-500">Status</th>
                <th class="border border-slate-500">Action</th>
            </tr>
            @foreach ($libraries as $library)
            <tr class="bg-gray-300 text-center">
                <td class="py-2 border border-slate-500">{{$library->title}}</td>
                <td class="border border-slate-500">{{$library->created_at}}</td>
                <td class="border border-slate-500"><a href="/libraries/{{$library->id}}" class="text-blue-600 underline">Details</a></td> 
                <td class="border border-slate-500"><div class="bg-green-300 text-center w-fit m-auto text-green-800 p-1 px-4 rounded-full flex items-center space-x-16"><i class="fa-solid fa-check self-center pr-2"></i>approved</div></td>
                <td class="border border-slate-500">
                    <div class="flex space-x-4 justify-center pt-2">
                        <a href="/libraries/{{$library->id}}/edit" class="hover:opacity-50">
                            <i class="fa-solid fa-pen-to-square pr-2"></i>Edit
                        </a>
                        <form action="/libraries/{{$library->id}}" method="POST" class="flex items-center ">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:opacity-50">
                                <i class="fa-solid fa-trash pr-2"></i>Cancel
                            </button>
                        </form>
                    </div>                    
                </td>
            </tr>     
            @endforeach
        </table>
    </div>

    <div id="lists">
        <h1 class="font-bold text-xl container">My lists</h1>
        
    </div>
</x-layout>