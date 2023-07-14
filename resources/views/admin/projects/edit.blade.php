@extends("layouts.admin")

@section('content')

    <form action="{{ route("admin.projects.update", $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method("PUT")

        <h2>Modifica progetto</h2>
    
        <label for="title">Titolo</label>
        @error('title')
            <div class="bg-danger-subtle rounded">{{$message}}</div>  
        @enderror
        <input class="form-control @error('description') is-invalid @enderror" type="text" name="title" value="{{ old("title") ?? $project->title}}" required>

        <label for="type_id">Tipo</label>
        @error('type_id')
            <div class="bg-danger-subtle rounded">{{$message}}</div>  
        @enderror
        <select class="form-control" name="type_id">
            <option value="" >Nessuno</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}" @selected($project->type_id == $type->id)  >{{ $type->name }}</option>
            @endforeach
        </select>
        
        <div class="mt-3">Seleziona Tecnologie</div>
        @foreach ($technologies as $i => $technology)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" @checked(count($project->technologies->where("id", $technology->id))) value="{{ $technology->id }}" name="technologies[]" id="technologies{{$i}}">
                <label for="technologies{{$i}}" class="form-check-label">{{ $technology->name }}</label>
            </div>
        @endforeach

        <label for="content">Contenuto</label>
        @error('content')
            <div class="bg-danger-subtle rounded">{{$message}}</div>  
        @enderror
        <input class="form-control @error('description') is-invalid @enderror" type="text" name="content" value="{{ old("content") ?? $project->content}}" required>

        <label for="image">URL immagine</label>
        @error('image')
            <div class="bg-danger-subtle rounded">{{$message}}</div>  
        @enderror
        <input type="file" class="form-control" name="image" id="image">

        <input class="btn btn-primary my-2" type="submit" value="Aggiorna">
    
    </form>
    
@endsection