@extends("layouts.app")

@section('title', $project->title)

@section('actions')
    <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Torna ai progetti</a>
@endsection

@section('content')

    <section>
        <h3></h3>
        <figure class="float-end">
            <img src="{{ $project->image }}" class="w-50" alt="">
            <figcaption>
                <p class="text-muted">{{ $project->title }}</p>
            </figcaption>
        </figure>
        <p>{{ $project->text }}</p>
    </section> 
@endsection