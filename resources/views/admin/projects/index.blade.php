@extends("layouts.app")

@section('title', 'Projects')

@section('actions')
<div>
    <a href="{{ route('admin.projects.create') }}">
        crea nuovo
    </a>
</div>
@endsection

@section('content')
    {{--@dump($projects)--}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>{{ $project->title }}</td>
                <td>{{ $project->getAbstract() }}</td>
                <td>
                    <a href="{{ route('admin.projects.show', $project) }}">
                        <i class="bi bi-eye"></i>
                    </a>
                </td>
            </tr>
            
            @empty
            
            @endforelse
        </tbody>
    </table> 
    {{ $projects->links() }}
@endsection