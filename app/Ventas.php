<?php

namespace FinanciaSystem;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table="Ventas";

        protected $fillable = [
        'id_vehiculo','precio_venta','id_cliente','id_vendedor','fecha_compra'
    ];

  
 
    public $timestamps=false;


    public function vehiculo(){
    	return $this->belongsTo('FinanciaSystem\Vehiculo','id_vehiculo','id');
    }
    public function vendedor(){
    	return $this->belongsTo('FinanciaSystem\Vendedor','id_vendedor','id');
    }

    public function cliente(){
    	return $this->belongsTo('FinanciaSystem\Cliente','id_cliente','id');
    }
}
