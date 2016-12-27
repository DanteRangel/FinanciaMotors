<?php

namespace FinanciaSystem;

use Illuminate\Database\Eloquent\Model;

class tipoVehiculo extends Model
{
            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="tipoVehiculo";

    protected $fillable = [
        'tipo'
    ];
 
    public $timestamps=false;
  // belongsTo
  public function vehiculo(){
    return $this->hasMany('FinanciaSystem\Vehiculo','id_tipoVehiculo','id');
  }
}
