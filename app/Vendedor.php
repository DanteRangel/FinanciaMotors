<?php

namespace FinanciaSystem;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="Vendedor";

    protected $fillable = [
        'clave_vendedor', 'password','id_persona','id_permiso','img_src',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps=false;
  // belongsTo
  public function persona(){
    return $this->hasOne('FinanciaSystem\Persona', 'id','id_persona');
  }

      // belongsTo
  public function permisos(){
    return $this->belongsTo('FinanciaSystem\Permiso', 'id_permiso');
  }

 

}
