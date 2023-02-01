<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Proyecto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Proyecto();


        $request->validate([
            'name'=>'required', 
            'description'=> 'required',
            'github_link' =>'required', 
            'link' => 'required',
            'technologies'=> 'required',
            'image'=> 'required',
        ]);

 

        $proyecto->name = $request->name;
        $proyecto->description = $request->description;
        $proyecot->github_link = $request->github_link;
        $proyecto->link= $request->link;
        $proeycto->image = $request->image;
        $proyecto->technologies = $request->technologies;

        $proyecto->save();

        return $proyecto;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        return $proyecto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([ 
            'name'=>'required', 
            'description'=> 'required',
             'github_link' =>'required', 
             'link' => 'required',
              'technologies'=> 'required',
              'image'=> 'required',
            ]);
            
        $proyecto->name = $request->name;
        $proyecto->description = $request->description;
        $proyecto->github_link = $request->github_link;
        $proyecto->link= $request->link;
        $proyecto->image = $request->image;
        $proyecto->technologies = $request->technologies;

        $proyecto->update();
        return $proyecto;
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        if(is_null($proyecto)){
            return response()->json('The request could not be made, the file no longer exists', 404);
        }
        $proyecto->delete();
        return response()->noContent();
    }
}
