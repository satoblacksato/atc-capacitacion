<?php

namespace App\Core\Facades;

use App\Core\Eloquent\Catalogos\Contacto;
use DB; 
class TableRepository{
	// DB::raw("C.con_nombre +' '+ C.con_apellido as nombres")
	public function forContacts(){
		return datatables()
		->of(Contacto::from('contacto as C')
			->join('proveedor as P','P.prv_id','C.prv_id')
			->select('C.con_id',
					'C.con_nombre','C.con_apellido'
			,'C.con_departamento','C.con_email','C.con_telefono','P.prv_nombre'))
		->addColumn('actions','contactos.actions')
		->addColumn('nombres',function($row){
      		return $row->con_nombre.' '.$row->con_apellido;
		})
		->filterColumn('nombres',function($query,$letter){
			$query->orWhere('C.con_nombre','like',"%{$letter}%")
				  ->orWhere('C.con_apellido','like',"%{$letter}%");
		})
		->rawColumns(['actions'])
		->make(true);
	}
}