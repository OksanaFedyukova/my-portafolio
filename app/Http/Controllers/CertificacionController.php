<?php

namespace App\Http\Controllers;

use App\Models\Certificacion;
use Illuminate\Http\Request;

class CertificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Certificacion::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $certification = new Certificate();

        $request->validate([
            'imgCertificate' => 'required',
            'title' => 'required',
            'school' => 'required',
            'description' => 'required',
        ]);

     
        $certificacion->imgCertificate = $request->imgCertificate;
        $certificacion->title = $request->title;
        $certificacion->school = $request->school;
        $certificacion->description = $request->description;

        $certificacion->save();

        return $certificacion;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificacion  $certificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Certificacion $certificacion)
    {
        return $certificacion;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificacion  $certificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificacion $certificacion)
    {
        $request->validate([
            'imgCertificate' => 'required',
            'title' => 'required',
            'school' => 'required',
            'description' => 'required',
        ]);

        $certificacion->imgCertificate = $request->imgCertificate;
        $certificacion->title = $request->title;
        $certificacion->school = $request->school;
        $certificacion->description = $request->description;

        $certificacion->update();

        return $certificacion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificacion  $certificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificacion $certificacion)
    {
        if(is_null($certificacion)){
            return response()->json('The request could not be made, the certificate no longer exists', 404);
        }

        $certificacion->delete();
        return response()->noContent();
    }
}