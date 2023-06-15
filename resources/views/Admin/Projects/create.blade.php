@extends('layouts.admin')

@section('content')
    <h2>Create a new project</h2>

    @include('partials.errors')    

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="type">Select type:</label>
            <select class="form-select" id="type" name="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                    <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <h5>Select technologies:</h5>
            @foreach ($technologies as $tech)
                <div class="form-check">
                    {{-- L'input deve essere selezionato se id del tag è contenuto nell'array old(['tags'])--}}
                    <input class="form-check-input" name="technologies[]" type="checkbox" value="{{ $tech->id }}"
                        id="tag-{{ $tech->id }}" @checked(in_array($tech->id, old('technologies',[])))>
                    <label class="form-check-label" for="tag-{{ $tech->id }}">
                        {{ $tech->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="image-input" class="form-label">Image</label>
            <input type="file" class="form-control" id="image-input" name="image">
            <div>
                <img class="d-none w-25" id="image-preview" src="" alt="">
            </div>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" rows="3" name="content">{{ old('content') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Send</button>
    </form>
@endsection