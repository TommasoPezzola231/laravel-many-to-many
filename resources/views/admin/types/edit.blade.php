@extends("layouts.admin")

@section('content')

    <h2>Modifica Tipo</h2>

    <form action="{{ route("admin.types.update", $type->id) }}" method="POST">
    @csrf

    @method('PUT')

        <label for="name">Tipo</label>
        @error('name')
            <div class="bg-danger-subtle rounded">{{$message}}</div>  
        @enderror
        <input class="form-control @error('description') is-invalid @enderror" type="text" name="name" value="{{ old("name") ?? $type->name}}" required>

        <input class="btn btn-primary my-2" type="submit" value="Aggiorna">
    
    </form>
    
@endsection