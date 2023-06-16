<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class projectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(10);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        // tramite slug ci arriva come identificativo per prelevare il nostro post
        //possiamo inserire anche l'utente nel with()
        $project = Project::with('type', 'technologies')->where('slug', $slug)
        //first se vogliamo un solo elemento altrimenti get 
        ->first();
if ($project) {

    return response()->json([
        'success' => true,
        'results' => $project
    ]);
} else {
    return response()->json([
        'succes' => false,
        'error' => 'Project not found'
    ]) ->setStatusCode('404');
}
    }
}
