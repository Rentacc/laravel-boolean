@extends('layouts.base')

@section('contents')

<div class="bg-dark text-light py-2 mb-3">
    <h1 class="ms-4" style="font-weight: 700">Lista Promemoria</h1>
</div>
    <div class="offset-2 container-sm pt-4">

        <button type="button" class="btn btn-outline-primary mb-3"><a class="text-decoration-none text-dark" style="font-weight:700" href="{{ '/todolists/create' }}">Crea un nuovo promemoria</a></button>

        
               
        @foreach ($arrTodos as $key => $todo)
            <div class="card container-fluid mb-2">
                <div class=" d-flex flex-row align-items-center">
                    <div class="col-10">
                        <h2>{{ $todo->title }}</h2>
                        <span @style(['color: red' => $todo->expire_date < date('Y-m-d'), 'color: green; font-weight: bold' => $todo->expire_date >= date('Y-m-d')])>{{ $todo->expire_date }}</span>
                    </div>
                    <div class="btn-group col-2" role="group" aria-label="Basic outlined example">
                        @if($todo->details != null or $todo->image != null)
                            <button class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$key}}">Espandi</button>
                    </div>
                </div>
                        <div class="collapse text-center pb-3 flex-column" id="collapseExample{{$key}}">
                            @if ($todo->details != null)
                            <div>
                                <span>{{ $todo->details }}</span>
                            </div>
                            @endif
                            @if ($todo->image != null)
                            <div>
                                <img src="{{ $todo->image }}" alt="image">
                            </div>
                            @endif
                        <div class="btn-group mt-3">
                            <button type="button" class="btn btn-outline-primary">
                                <a class="text-decoration-none" href="{{ route('todolists.edit', ['todolist' => $todo->id]) }}">Modifica</a></button>
                            <button type="button" class="btn btn-outline-danger">Elimina</button>
                        </div>
                        </div>
                    </div> 
                        @else
                        <div class="btn-group container-fluid p-0">
                            <button type="button" class="btn btn-outline-primary">
                                <a class="text-decoration-none" href="{{ route('todolists.edit', ['todolist' => $todo->id]) }}">Modifica</a></button>
                            <button type="button" class="btn btn-outline-danger">Elimina</button>
                        </div>
                    </div>
                </div>
            </div>
                        @endif
        @endforeach

        
    </div>
@endsection


