<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\project;

class ProjectController extends Controller
{
  public function index(){
    $projects= project::all();
    return response()->json([
        'success'=> true,
        'results'=> $projects
    ]);
  }
  public function show($slug){
    $project= project::where('slug',$slug)->with('category','technologies')->first();
    return response()->json([
        'success'=> true,
        'results'=> $project
    ]);
  }
}
