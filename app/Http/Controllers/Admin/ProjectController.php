<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Http\Controllers\Controller;
// models
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
// facades
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects= Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $techs = Technology::all();
        return view('admin.projects.create',compact('types','techs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortfolioRequest $request)
    {
        $formData = $request->all();
        // file image storage
        $img_path = null;
        if(isset($formData['img_path'])){
            $img_path = Storage::put('images_uploaded',$formData['img_path']);
        }
        
        // dd($img_path);

        // create new item
        $new = new Project();
        $new->title = $formData['title'];
        $new->slug = str()->slug($new->title);
        $new->content = $formData['content'];
        $new->type_id = $formData['typeOf'];
        $new->start_date = $formData['date_start'];
        $new->end_date = $formData['date_end'];
        $new->img = $img_path;
        $new->save();

        if(isset($formData['techs'])){
            foreach($formData['techs'] as $techId){
                $new->giveTech()->attach($techId);
            }
        }
        // $new->save();
        return redirect()->route('admin.project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obj = Project::findOrFail($id);
        $objTechs = [];
        foreach($obj->giveTech as $singleTech){
            $objTechs[] = $singleTech;
        }
        // dd($objTechs[0]->name);
        $types = Type::all();
        $techs = Technology::all();
        return view('admin.projects.update',compact('obj','techs','types','objTechs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, string $id)
    {
        // $obj = Project::where('id',$id)->firstOrFail();
        $obj = Project::findOrFail($id);
        $formData = $request->all();
        $obj->title = $formData['title'];
        $obj->content = $formData['content'];
        $obj->slug = str()->slug($obj->title);
        $obj->type_id = $formData['typeOf'];
        $obj->start_date = $formData['date_start'];
        $obj->end_date = $formData['date_end'];
        $obj->save();
        if(isset($formData['techs'])){
            $obj->giveTech()->sync($formData['techs']);
        }
        else{
            $obj->giveTech()->detach();
        }
        return redirect()->route('admin.project.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.project.index');
    }
}
