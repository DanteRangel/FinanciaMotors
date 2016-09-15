<?php

namespace FinanciaSystem;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="Vehiculo";

    protected $fillable = [
        'nombre', 'anio','fecha_llegada','fecha_salida','status','color','transmision','descripcion','costo','factura','serie','id_tipoVehiculo','id_marca','kilometraje'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

 
    public $timestamps=false;
  // belongsTo
  public function marca(){
    return $this->belongsTo('FinanciaSystem\Marca','id_marca');
  }
    // belongsTo
  public function tipoVehiculo(){
    return $this->belongsTo('FinanciaSystem\tipoVehiculo', 'id_tipoVehiculo');
  }

  public function servicios(){
    return $this->belongsToMany('FinanciaSystem\Servicios_Vehiculo','id_servicio','id_vehiculo','precio','fecha');
  }
}
