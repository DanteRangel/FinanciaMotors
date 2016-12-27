<?php

namespace FinanciaSystem;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{


            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="Permiso";

    protected $fillable = [
        'nombre'
      ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

 
    public $timestamps=false;
  public function vendedor(){
    return $this->hasMany('FinanciaSystem\Vendedor','id_permiso','id');
  }
 

}
