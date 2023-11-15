<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    //show all books
    public function index(){
        return view('index', ['libraries'=>Library::latest()->filter(request(['search']))->get()]);
    }

    //show one book
    public function show(Library $library){
        return view('show', ['library'=>$library]);
    }
}
