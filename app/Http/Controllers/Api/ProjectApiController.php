<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// models
use App\Models\Project;

class ProjectApiController extends Controller
{
    public function index(){
        // $obj = Project::all();
        $obj = Project::with('giveTech','type')->get();

        return response()->json([
            'success'=>true,
            'results'=> $obj
        ]);
    }

    public function show(string $id){
        $obj = Project::with('giveTech','type')->findOrFail($id);
        // dd($obj);
        return response()->json([
            'success'=>true,
            'results'=> $obj
        ]);
    }
}
