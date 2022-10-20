<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjetController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth")->except(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("features.dashboard.project.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('features.dashboard.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            "title"=>"required|string|min:5",
            "service"=>"required|string",
            "description"=>"required|string|min:50",
            "images" => "required|array"
        ]);

        $fileVerified = verifiedFileExt($request);
        if(!$fileVerified)
        {
            throw ValidationException::withMessages(['images'=> "image invalide"]);
        }
        $saveFilesName = saveFile($request);
        if($saveFilesName === null)
        {
            throw ValidationException::withMessages(['images'=> "image invalide"]);
        }

        Projet::create([
            'title'=>$request->title,
            'service'=>$request->service,
            'description'=>$request->description,
            'img_url' => json_encode($saveFilesName)
        ]);

        return to_route("projects.index")->with("msg","succefully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projet = Projet::findOrFail($id);
        return view("features.home.recent_project_details", ["projet" => $projet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $projet = Projet::findOrFail($id);
        return response()->json($projet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $projet = Projet::findOrFail($id);

        $projet->title = $request->title;
        $projet->service = $request->service;
        $projet->description = $request->description;

        if(!$request->images)
        {
            $projet->save();
            return to_route('projects.index')->with("msg","successfully");
        }
        $filesUrl = [];
        if(verifiedFileExt($request))
        {
            $filesUrl = saveFile($request);
        }

        $projet->img_url = json_encode($filesUrl);
        $projet->save();
        return to_route('projects.index')->with("msg", "successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $projet = Projet::find($id);
        $projet->delete();
        return to_route("projects.index")->with("msg","successfully");
    }
}
