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
}
