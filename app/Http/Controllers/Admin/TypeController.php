<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;
// models
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $data = $request->all();
        $newType = new Type();
        $newType->name =$data['name'];
        $newType->save();
        return redirect()->route('admin.type.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $obj = Type::findOrFail($id);
        return view('admin.type.show',compact('obj'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obj= Type::findOrFail($id);
        $types = Type::all();
        return view('admin.type.update',compact('obj','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, string $id)
    {
        $formData = $request->all();
        $obj = Type::findOrFail($id);
        $obj->name = $formData['name'];
        $obj->save();
        return redirect()->route('admin.type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.type.index');
    }
}
