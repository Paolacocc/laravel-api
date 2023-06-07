@extends('layouts.admin')

@section('content')
    <h2>Change your project</h2>

    @include('partials.errors')    

    {{-- LA PARENTESI DOPO!!!! qui e su old --}}
    {{-- <form action="{{ route('admin.projects.update'), LA PARENTESI DOPO!!!! $project->slug }}" method="POST">
        @csrf
        @method('PUT'); --}}

        <form method="POST" action="{{ route('admin.projects.update', $project->slug) }}">
            @csrf
            @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" rows="3" name="content">{{ old('content', $project->content) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $project->description )}}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Send</button>
    </form>
@endsection