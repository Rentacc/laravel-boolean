<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Todolist;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $arrTodos = Todolist::paginate(5);
        return view('todolists.index', compact('arrTodos'));
    }
}