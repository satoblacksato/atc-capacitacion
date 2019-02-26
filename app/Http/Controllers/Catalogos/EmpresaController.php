<?php

namespace App\Http\Controllers\Catalogos;

use App\Core\Eloquent\Catalogos\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalogos\EmpresaRequest;
class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter=request()->get('filter');

        return view('empresa.index')->with([
            'filter'=>$filter,
            'empresas'=>Empresa::nombre($filter)->paginate(1)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
       //dd($request); imprimir variables
        //$empresa=new Empresa($request->only('emp_nombre','emp_email','emp_direccion','emp_telefono'));

         $empresa=new Empresa($request->validated());
        $empresa->save();
        session()->flash('message','Empresa Guardada Correctamente');
        return redirect()->route('empresa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Core\Eloquent\Catalogos\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('empresa.show')->with(['empresa'=>$empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Core\Eloquent\Catalogos\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //dd($empresa,$empresa->full_data);
        return view('empresa.edit')->with(['empresa'=>$empresa]);
       // return view('empresa.edit',compact('empresa'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Core\Eloquent\Catalogos\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, Empresa $empresa)
    {
         $empresa->fill($request->validated());
        $empresa->save();
        session()->flash('message','Empresa Actualizada Correctamente');
        return redirect()->route('empresa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Core\Eloquent\Catalogos\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
       $empresa->delete();
       session()->flash('message','Empresa Eliminada Correctamente');
       return redirect()->route('empresa.index');
    }
}
