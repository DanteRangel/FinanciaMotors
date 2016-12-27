<?php

namespace FinanciaSystem;

use Illuminate\Database\Eloquent\Model;

class Servicios_Vehiculos extends Model
{
    protected $table="Servicios_Vehiculo";

    protected $fillable = [
        'id_servicio','id_vehiculo','fecha','costo'
    ];
 
    public $timestamps=false;


    public function servicios(){
        return $this->belongsTo('FinanciaSystem\Servicios','id_servicio');
    }
        public function vehiculos(){
        return $this->belongsTo('FinanciaSystem\Servicios','id_vehiculo');
    }
}
