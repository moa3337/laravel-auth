@extends('layouts.app')

@section('title', 'Crea nuovo progetto')

@section('actions')
<div>
    <a href="{{ route('admin.projects.index') }}">
        Torna ai progetti
    </a>
</div>
@endsection

@section('content')
<section class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.projects.store') }}" class="row">
            @csrf
            
            <div class="col">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
    
                <label for="image">Image</label>
                <input type="text" name="image" id="image" class="form-control">
            </div>

            <div class="col">
                <label for="text">Text</label>
                <input type="text" name="text" id="text" class="form-control">
            </div>

            <input type="submit" class="" value="salva"/>

        </form>
    </div>
</section>
@endsection