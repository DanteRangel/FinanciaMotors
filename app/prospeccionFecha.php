<?php

namespace FinanciaSystem;

use Illuminate\Database\Eloquent\Model;

class prospeccionFecha extends Model
{
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="prospeccionFecha";

    protected $fillable = ['id','fecha','id_prospeccion','accion'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

 
    public $timestamps=false;
  // belongsTo
     public function prospeccion(){
    	return $this->belongsTo('FinanciaSystem\Prospeccion', 'id_prospeccion');
  	}
}
