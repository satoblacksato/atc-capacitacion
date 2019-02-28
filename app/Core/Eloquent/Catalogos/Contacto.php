<?php

namespace App\Core\Eloquent\Catalogos;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};

 use Cviebrock\EloquentSluggable\Sluggable;
 use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Contacto extends Model
{
	use SoftDeletes;//,Sluggable,SluggableScopeHelpers;

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
				  'con_extension'
				];

	public function proveedor(){
     	return $this->belongsTo(Proveedor::class,'prv_id');
     }

/*
     public function sluggable(){
     	return[
     		'slug'=>[
     			'source'=>'con_nombre'
     		]
     	];
     }

     public function getKeyName(){
     	return 'slug';
     }*/
}
