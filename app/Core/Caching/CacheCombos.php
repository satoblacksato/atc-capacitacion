<?php

namespace App\Core\Caching;
use App\Core\Eloquent\Catalogos\Proveedor;
use Cache;

class CacheCombos
{
	public function getProveedor(){
		return Cache::remember('proveedores',30,function(){
			return Proveedor::pluck('prv_nombre','prv_id')
                ->toArray();
		});
	}
}