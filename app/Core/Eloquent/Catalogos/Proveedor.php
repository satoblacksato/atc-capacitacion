<?php

namespace App\Core\Eloquent\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
     protected $connection='mysql';
    protected $table='proveedor';

     protected $primaryKey = 'prv_id';
     public $timestamps = false;

     public function contactos(){
     	return $this->hasMany(Contacto::class,'prv_id');
     }

}
