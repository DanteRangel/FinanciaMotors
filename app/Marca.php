<?php

namespace FinanciaSystem;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
	/*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="Marca";

    protected $fillable = [
        'nombre'
    ];
 
    public $timestamps=false;
  // belongsTo
  public function vehiculo(){
    return $this->hasMany('FinanciaSystem\Vehiculo','id_marca','id');
  }    
}
