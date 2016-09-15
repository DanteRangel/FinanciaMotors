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



  public function vehiculos(){
    return $this->belongsToMany('FinanciaSystem\Servicios_Vehiculo','id_servicio','id_vehiculo','precio','fecha');
  }
 }
