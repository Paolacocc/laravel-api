@extends('layouts.admin')

@section('content')
    <h2 class="text-center m-3 text-uppercase">Projects list</h2>

    @include('partials.delete_message')

    <div class="text-end">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success m-3">Create a new project</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->content }}</td>
                    <td>

                      <div class="action-btn d-flex">

                        {{-- create --}}
                        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-info m-1">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        {{-- edit --}}
                        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning m-1">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        {{-- delete --}}
                        <form class="d-inline-block m-1" action="{{ route('admin.projects.destroy', $project->slug) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>

                      </div>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
