@extends("layouts.admin")

@section('content')

    <form action="{{ route("admin.projects.update", $project->id) }}" method="POST">
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

        <label for="content">Contenuto</label>
        @error('content')
            <div class="bg-danger-subtle rounded">{{$message}}</div>  
        @enderror
        <input class="form-control @error('description') is-invalid @enderror" type="text" name="content" value="{{ old("content") ?? $project->content}}" required>

        <label for="img">URL immagine</label>
        @error('image')
            <div class="bg-danger-subtle rounded">{{$message}}</div>  
        @enderror
        <input class="form-control @error('description') is-invalid @enderror" type="text" name="img" value="{{ old("image") ?? $project->image}}">

        <input class="btn btn-primary my-2" type="submit" value="Aggiorna">
    
    </form>
    
@endsection