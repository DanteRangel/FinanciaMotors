<?php

namespace FinanciaSystem;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="Persona";

    protected $fillable = [
        'nombre', 'apellidoPaterno','apellidoMaterno','correo','telefono_otro','telefono_cel'
    ];

 
    public $timestamps=false;
    

    public function user(){
    	return $this->belongsTo('FinanciaSystem\Persona', 'id_persona');
  	}

    public function vendedor(){
    	return $this->belongsTo('FinanciaSystem\Vendedor', 'id_persona');
  	}
    
}
