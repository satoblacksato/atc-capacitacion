<?php

namespace App\Http\Controllers\Catalogos;

use App\Core\Eloquent\Catalogos\{Contacto,Proveedor};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Facades\App\Core\Facades\TableRepository;
use Facades\App\Core\Caching\CacheCombos;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(request()->ajax()){
            return TableRepository::forContacts();
        }
        return view('contactos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Core\Eloquent\Catalogos\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Core\Eloquent\Catalogos\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        if(request()->ajax()){
            return response()->json(view('contactos.edit')
            ->with([
                'proveedores'=>CacheCombos::getProveedor(),
                'contacto'=>$contacto
            ])->render());    
        }
        return abort(401);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Core\Eloquent\Catalogos\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Core\Eloquent\Catalogos\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}
