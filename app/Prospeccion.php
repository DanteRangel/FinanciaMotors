<?php

namespace FinanciaSystem;

use Illuminate\Database\Eloquent\Model;

class Prospeccion extends Model
{
    
    protected $table="Prospeccion";

        protected $fillable = [
        'id_cliente','id_vendedor','id','token_json','fecha_seguimiento'
    ];

  
 
    public $timestamps=false;


    
    public function vendedor(){
    	return $this->belongsTo('FinanciaSystem\Vendedor','id_vendedor','id');
    }

    public function cliente(){
    	return $this->belongsTo('FinanciaSystem\Cliente','id_cliente','id');
    }

}
