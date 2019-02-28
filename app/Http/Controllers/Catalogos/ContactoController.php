<?php

namespace App\Http\Controllers\Catalogos;

use App\Core\Eloquent\Catalogos\{Contacto,Proveedor};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\ContactoRequest;
use Facades\App\Core\Facades\TableRepository;
use Facades\App\Core\Caching\CacheCombos;
use Mail;
use DB;
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
         if(request()->ajax()){
            return response()->json(view('contactos.create')
            ->with([
                'proveedores'=>CacheCombos::getProveedor()
            ])->render());    
        }
        return abort(401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactoRequest $request)
    {
        DB::connection('mysql')->transaction(function()use(&$request){
              $contacto=new Contacto();
                 $contacto->fill($request->validated());
               // $contacto->con_nombre=$request->con_nombre;
               // $contacto->con_nombre=$request->get('con_nombre');
               $contacto->save();

             Mail::to($contacto->con_email)
             ->cc('ernesto.liberio@gmail.com')
             ->queue(new \App\Mail\RegistroContacto());
        });

      

       return response()->json(["Proceso OK"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Core\Eloquent\Catalogos\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
          if(request()->ajax()){
            return response()->json(view('contactos.show')
            ->with([
                'contacto'=>$contacto
            ])->render());    
        }
        return abort(401);
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
                'contacto'=>$contacto,
                'slug'=>$contacto->slug
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
    public function update(ContactoRequest $request, Contacto $contacto)
    {
       $contacto->fill($request->validated());
       // $contacto->con_nombre=$request->con_nombre;
       // $contacto->con_nombre=$request->get('con_nombre');
       $contacto->save();
       return response()->json(["Proceso OK"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Core\Eloquent\Catalogos\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
        return redirect()->route('contacto.index');
    }
}
