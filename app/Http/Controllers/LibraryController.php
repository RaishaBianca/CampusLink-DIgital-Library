<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    //show all books
    public function index(){
        return view('libraries.index', ['libraries'=>Library::latest()->filter(request(['search','category']))->paginate(6)]);
    }

    //show one book
    public function show(Library $library){
        return view('libraries.show', ['library'=>$library]);
    }

    //show profile page
    public function profile(){
        return view('libraries.profile', ['libraries' => auth()->user()->libraries()->get()]);
    }

    //show create form
    public function create(){
        return view('libraries.create');
    }

    //store book data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'isbn' => 'required|numeric',
            'publisher' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);

        $formFields['user_id'] = auth()->user()->id;

        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        Library::create($formFields);

        return redirect()->route('profile');
    }

    //show edit form
    public function edit(Library $library){
        return view('libraries.edit', ['library'=>$library]);
    }

    //update book data
    public function update(Request $request, Library $library){
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'isbn' => 'required|numeric',
            'publisher' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);

        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $library->update($formFields);

        return redirect()->route('profile');
    }

    //delete book data
    public function destroy(Library $library){
        $library->delete();
        return redirect()->route('profile');
    }

    //add book to list
    public function addToList(Library $library){
        auth()->user()->libraries()->attach($library->id);
        return redirect()->route('libraries', $library);
    }
}
