<?php

namespace App\Http\Controllers\Admin;

use App\Models\project;
use App\Models\Category;
use App\Models\Technology;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreprojectRequest;
use App\Http\Requests\UpdateprojectRequest;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all()->sortBy(function($project) {
            $parts = explode('-', $project->slug);
            $numbers = array_filter($parts, function($part) {
                return is_numeric($part);
            });
            return end($numbers);
        });
        
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();
        $technologies= Technology::all();
        return view('admin.projects.create',compact('categories','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreprojectRequest $request)
    {

        $formData= $request->validated();
        $formData['slug']= project::generateSlug($formData['title']);
        if($request->hasFile('image')){
            $imgPath= Storage::put('ProjectsImg',$request->img);
            $formData['img']= $imgPath;    
            }
        $newProject = project::create($formData);
        if($request->has('technologies')){
            $newProject->technologies()->sync($request->technologies);
        }
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(project $project)
    {
        return view('admin.projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project $project)
    {
        $categories= Category::all();
        $technologies= Technology::all();
        return view('admin.projects.edit',compact('project','categories','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprojectRequest $request, project $project)
    {
        $formData= $request->validated();
        if($project->title !== $formData['title']){
            $formData['slug']= project::generateSlug($formData['title']);
        }
        if($request->hasFile('image')){
            $imgPath= Storage::put('ProjectsImg',$request->img);
            $formData['img']= $imgPath;    
            }
        $project->update($formData);
        
        if($request->has('technologies')){
            $project->technologies()->sync($request->technologies);
        } 
        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index') /*->with('message', $post->title . ' è stato eliminato')*/;
    }
}
