@extends('layouts.admin')

@section('content')

<h2 class='text-center'>{{ $project->title}}</h2>

@if ($project->type)
<h4>Type: {{ $project->type?->name }}</h4>
@else 
<h4> Type: no type has been selected</h4>
@endif

<div class="mt-3">
    <h5>Technologies: </h5>
    @forelse ($project->technologies as $tech)
        <span>{{ $tech->name }} {{ $loop->last ? '' : ',' }}</span>
    @empty
        <span>No technology selected</span>
    @endforelse

</div>

<p class="mt-4">{{ $project->description }}</p
    
@endsection