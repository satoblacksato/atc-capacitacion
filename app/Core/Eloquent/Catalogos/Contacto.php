<?php

namespace App\Core\Eloquent\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $connection='mysql';
    protected $table='contacto';

     protected $primaryKey = 'con_id';
     public $timestamps = false;

     protected $fillable=[
				  'prv_id',
				  'con_cargo',
				  'con_nombre' ,
				  'con_apellido',
				  'con_departamento' ,
				  'con_email' ,
				  'con_telefono' ,
				  'con_extension',
				];

	public function proveedor(){
     	return $this->belongsTo(Proveedor::class,'prv_id');
     }
}
