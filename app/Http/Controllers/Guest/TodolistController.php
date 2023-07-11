<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{

    private $validations = [
        'expire_date' => 'required|date|max:20',
        'title' => 'required|string|max:100',
        'details' => 'required|string|',
        'image' => 'required|string|max:1000',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrTodos = Todolist::all();

        return view('todolists.index', compact('arrTodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todolists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validations);

        $data = $request->all();

        // salvare i dati nel database

        $newTodolist = new Todolist();

        $newTodolist->expire_date = $data['expire_date'];
        $newTodolist->title = $data['title'];
        $newTodolist->details = $data['details'];
        $newTodolist->details = $data['image'];

        $newTodolist->save();

        return redirect()->route('todolists.index', ['todolist' => $newTodolist->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Todolist $todolist)
    {
        return view('todolists.edit', compact('todolist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todolist $todolist)
    {
        $request->validate($this->validations);

        $data = $request->all();

        $todolist->expire_date = $data['expire_date'];
        $todolist->title = $data['title'];
        $todolist->details = $data['details'];
        $todolist->details = $data['image'];

        $todolist->update();

        return to_route('todolists.index', ['todolist' => $todolist->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        // $todolist->delete();

        // return to_route('todolists.index')->with('delete_success', $todolist);
    }
}