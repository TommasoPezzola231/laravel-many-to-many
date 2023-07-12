@extends("layouts.admin")

@section('content')

    <section>
        <div class="row">
            <h2 class="my-3 text-center">PROGETTI</h2>
            @foreach ($projects as $project)
                <a class="col-3" href="{{ route("admin.projects.show", $project->id) }}">
                    <div class="card col-4 m-2" style="width: 18rem;">
                        <img src="{{ ($project->image) ? $project->image : "https://www.signfix.com.au/wp-content/uploads/2017/09/placeholder-600x400.png" }}" class="card-img-top" alt="{{ $project->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            
                            <form action="{{ route("admin.projects.destroy", $project) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    <i class='fa-solid fa-trash'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </section>
    
@endsection