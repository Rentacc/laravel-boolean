@extends('layouts.base')

@section('contents')
    <h1 class="mx-5">inserisci un nuovo Promemoria</h1>
    <form 
    method="POST" 
    action="{{ route('todolists.store') }}" class="m-5"
    >
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label" style="font-weight:700; font-size:20px">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
        </div>

        <div class="mb-3">
            <label for="expire_date" class="form-label" style="font-weight:700; font-size:20px">Data di scadenza</label>
            <input type="date" class="form-control" id="expire_date" name="expire_date" value="{{old('expire_date')}}">
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label" style="font-weight:700; font-size:20px">Immagine</label>
            <input type="text" class="form-control" id="image" name="image" value="{{old('image')}}">
        </div>
        <div class="mb-3">
            <label for="details" class="form-label" style="font-weight:700; font-size:20px">Dettagli</label>
            <input type="text" class="form-control" id="details" name="details" value="{{old('details')}}">
        </div>
        <button class="btn btn-primary" style="font-size: 20px">Salva</button>
    </form>
@endsection
