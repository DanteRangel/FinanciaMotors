<?php

namespace FinanciaSystem;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
	/*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="Servicios";

    protected $fillable = [
        'nombre'
    ];
 
    public $timestamps=false;
    public function servicios_vehiculo(){
        return $this->hasMany('FinanciaSystem\Servicios_Vehiculos','id_servicio','id');
    }


  
 }
