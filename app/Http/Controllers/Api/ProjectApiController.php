<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// models
use App\Models\Project;

class ProjectApiController extends Controller
{
    public function index(){
        $obj = Project::all();

        return response()->json([
            'success'=>true,
            'results'=> $obj
        ]);
    }

    public function show(string $id){
        $obj = Project::firstOrFail($id);

        return response()->json([
            'success'=>true,
            'results'=> $obj
        ]);
    }
}