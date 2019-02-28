<?php

namespace App\Core\Facades;

use App\Core\Eloquent\Catalogos\Contacto;
use DB; 
class TableRepository{
	// DB::raw("C.con_nombre +' '+ C.con_apellido as nombres")
	public function forContacts(){
		return datatables()
		->of(Contacto::
			join('proveedor as P','P.prv_id','contacto.prv_id')
			->select('contacto.con_id',
					'contacto.con_nombre','contacto.con_apellido'
			,'contacto.con_departamento','contacto.con_email','contacto.con_telefono','P.prv_nombre')
		)

		->addColumn('actions','contactos.actions')
		->addColumn('nombres',function($row){
      		return $row->con_nombre.' '.$row->con_apellido;
		})
		->filterColumn('nombres',function($query,$letter){
			$query->orWhere('contacto.con_nombre','like',"%{$letter}%")
				  ->orWhere('contacto.con_apellido','like',"%{$letter}%");
		})
		->rawColumns(['actions'])
		->make(true);
	}
}