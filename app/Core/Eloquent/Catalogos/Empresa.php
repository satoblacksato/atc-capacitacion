<?php

namespace App\Core\Eloquent\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $connection='mysql';
    protected $table='empresa';

     protected $primaryKey = 'emp_id';
     public $timestamps = false;

      protected $fillable = [
        'emp_nombre', 'emp_direccion', 'emp_email','emp_telefono'
    ];


	//scope
    public function scopeNombre($query,$value){
    	if($value){
    		$query->where('emp_nombre','like',"%".$value."%");
    	}
    }


    //assesor
    public function getEmpNombreAttribute($value){
    	return strtoupper($value);
    }

    public function getEmpDireccionAttribute($value){
    	return strtoupper($value);
   	}

    public function getFullDataAttribute($value){
      return $this->emp_nombre.' tiene email: '.$this->emp_email;
    }

    //mutator
     public function setEmpNombreAttribute($value){
    	$this->attributes['emp_nombre']=strtoupper($value);
    }
     public function setEmpDireccionAttribute($value){
    	$this->attributes['emp_direccion']=strtoupper($value);
    }
}
