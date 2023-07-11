@extends('layouts.base')

@section('contents')
<div class="bg-dark text-light py-2 mb-3">
    <h1 class="ms-4" style="font-weight: 700">Cestino</h1>
</div>

{{-- @if (session('delete_success'))
    @php $todo = session('delete_success') @endphp
    <div class="alert alert-danger">
        Il promemoria "{{ $todo->title }}" è stato eliminato definitivamente
    </div>
@endif --}}

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Data di scadenza</th>
                
                
                
            </tr>
        </thead>
        <tbody>
            @foreach ($trashedTodolists as $todo)
                <tr>
                    <th scope="row">{{ $comic->id }}</th>
                    <td>{{ $todo->id }}</td>
                    <td>{{ $todo->title }}</td>
                    <td>{{ $comic->expire_date }}</td>
                    
                    <td>
                        <form
                            action="{{ route('comics.restore', ['comic' => $comic->id]) }}"
                            method="post"
                            class="d-inline-block"
                        >
                            @csrf
                            <button class="btn btn-success">Ripristina</button>
                        </form>
                        <form
                            action="{{ route('comics.harddelete', ['comic' => $comic->id]) }}"
                            method="post"
                            class="d-inline-block"
                        >
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger button_delete">
                                Elimina definitivamente
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



{{ $trashedTodolists->links() }}
@endsection