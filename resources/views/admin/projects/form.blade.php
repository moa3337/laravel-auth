@extends('layouts.app')

@section('title', $project->id ? 'modifica il progetto' : 'Crea nuovo progetto')

@section('actions')
<div>
    <a href="{{ route('admin.projects.index') }}">
        Torna ai progetti
    </a>
</div>
@endsection

@section('content')

@include('layouts.partials.errors')

<section class="card">
    <div class="card-body">

    @if ($project->id)
        <form method="POST" action="{{ route('admin.projects.update', $project) }}" class="row">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('admin.projects.store') }}" class="row" enctype="multipart/form-data">
    @endif        
        @csrf
            
            <div class="col">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $project->title) }}" />
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
    
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $project->image) }}" />
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="preview">
                    <img src="{{ old('image', $project->image) }}" class="w-25" alt="">
                </div>
            </div>

            <div class="col">
                <label for="text" class="form-label">Text</label>
                <textarea type="text" name="text" id="text" class="form-control @error('text') is-invalid @enderror" rows="4">
                    {{ old('text', $project->text) }}
                </textarea>
                @error('text')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <input class="mt-3" type="submit" class="" value="salva"/>

        </form>
    </div>
</section>
@endsection