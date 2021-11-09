<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telefone extends Model
{
    protected $table ="telefones";
    protected $fillable = ['numero','id_cliente','principal'];
    use SoftDeletes;
    public function cliente(){
        return $this->belongsTo("App\Models\Cliente",'id_cliente','id');
    }
}
