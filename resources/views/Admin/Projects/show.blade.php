@extends('layouts.admin')

@section('content')

<h2 class='text-center'>{{ $project->title}}</h2>

@if ($project->type)
<h4>Type: {{ $project->type?->name }}</h4>
@else 
<h4> Type: no type has been selected</h4>
@endif


<p class="mt-4">{{ $project->description }}</p
    
@endsection