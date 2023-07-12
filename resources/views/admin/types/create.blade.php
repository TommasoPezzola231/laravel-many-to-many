@extends("layouts.admin")

@section('content')

    <h2>Aggiungi Tipo</h2>

    <form action="{{ route("admin.types.store") }}" method="POST">
    @csrf

        <label for="name">Titolo</label>
        @error('name')
            <div class="bg-danger-subtle rounded">{{$message}}</div>  
        @enderror
        <input class="form-control @error('description') is-invalid @enderror" type="text" name="name" required>

        <input class="btn btn-primary my-2" type="submit" value="Crea">
    
    </form>
    
@endsection