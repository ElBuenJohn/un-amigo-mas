<?php

namespace App\Http\Controllers;

use App\Models\mascota;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['mascotas']=Mascota::paginate(5);
        return view('mascota.index',$datos );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosMascota = request()->all();
        $datosMascota = request()->except('_token');

        if ($request->hasFile('Foto')) {
            $datosMascota['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        Mascota::insert($datosMascota);
        //return response()->json($datosMascota);
        return redirect('mascota')->with('mensaje','Mascota agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascota=Mascota::findOrFail($id);
        return view('mascota.edit',compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosMascota = request()->except(['_token','_method']);
        
        if ($request->hasFile('Foto')) {
            $mascota=Mascota::findOrFail($id);

            Storage::delete('public/'.$mascota->Foto);
            
            $datosMascota['Foto'] = $request->file('Foto')->store('uploads','public');
        }

        Mascota::where('id',"=", $id)->update($datosMascota);

        $mascota=Mascota::findOrFail($id);
        return view('mascota.edit',compact('mascota'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mascota=Mascota::findOrFail($id);

        if(Storage::delete('public/'.$mascota->Foto)){
           
            Mascota::destroy($id);

        }

        
        return redirect('mascota')->with('mensaje','Mascota borrada');
    }
}
