<?php

namespace FinanciaSystem;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="Empresa";

    protected $fillable = [
        'nombre', 'rfc','razon_social'
    ];
 
    public $timestamps=false;
    

    public function cliente(){
    	return $this->belongsTo('FinanciaSystem\Cliente', 'id_empresa');
  	}
 
}
