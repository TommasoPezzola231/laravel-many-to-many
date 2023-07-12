@extends("layouts.admin")

@section('content')

    <h2>Elenco tipi</h2>
    <a class="btn btn-primary" href="{{ route("admin.types.create") }}"> <i class="fa-solid fa-plus"></i> </a>
    <ul class="row">
        @foreach ($types as $type)
            <li class="my-3 col-6">{{ $type->name }}</li>

            <a class="btn btn-secondary col-auto mb-3" href="{{ route("admin.types.edit", $type->id) }}">
                <i class="fa-solid fa-wrench"></i>
            </a>

            <form class="col" action="{{ route("admin.types.destroy", $type) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    <i class='fa-solid fa-trash'></i>
                </button>
            </form>
        @endforeach
    </ul>
    
@endsection