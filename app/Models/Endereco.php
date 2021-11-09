<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    protected $table ="enderecos";
    protected $fillable = ['rua','bairro','cep','complemento','id_cliente','numero','cidade','principal'];
    use SoftDeletes;
    public function cliente(){
        return $this->belongsTo("App\Models\Cliente",'id_cliente','id');
    }
}
