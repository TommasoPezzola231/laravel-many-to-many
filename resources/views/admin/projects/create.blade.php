@extends("layouts.admin")

@section('content')

    <form action="{{ route("admin.projects.store") }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2>Aggiungi progetto</h2>
    
        <label for="title">Titolo</label>
        @error('title')
            <div class="bg-danger-subtle rounded">{{$message}}</div>  
        @enderror
        <input class="form-control" type="text" name="title" value="{{ old('title') }}" required>

        <label for="type_id">Tipo</label>
        @error('type_id')
            <div class="bg-danger-subtle rounded">{{$message}}</div>  
        @enderror
        <select class="form-control" name="type_id">
            <option value="" selected disabled hidden>Seleziona opzione</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        
        <div class="mt-3">Seleziona Tecnologie</div>
        @foreach ($technologies as $i => $technology)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $technology->id }}" name="technologies[]" id="technologies{{$i}}">
                <label for="technologies{{$i}}" class="form-check-label">{{ $technology->name }}</label>
            </div>
        @endforeach

        <label class="mt-3" for="content">Contenuto</label>
        @error('content')
            <div class="bg-danger-subtle rounded">{{$message}}</div>  
        @enderror
        <input class="form-control" type="text" name="content" value="{{ old('content') }}" required>

        <label for="image">URL immagine</label>
        @error('image')
            <div class="bg-danger-subtle rounded">{{$message}}</div>  
        @enderror
        <input type="file" class="form-control" name="image" id="image">

        <input class="btn btn-primary my-2" type="submit" value="Crea">
    
    </form>
    
@endsection