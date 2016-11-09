<?php

namespace FinanciaSystem;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="Cliente";

    protected $fillable = [
        'clave_cliente', 'password','id_persona','id_empresa'
    ];
 
    public $timestamps=false;


    public function persona(){
        return $this->hasOne('FinanciaSystem\Persona','id','id_persona');
      }

    public function empresa(){
        return $this->hasOne('FinanciaSystem\Empresa','id','id_empresa');
      }

  public function ventas(){
    return $this->hasMany('FinanciaSystem\Ventas','id_cliente','id');
  }

}
