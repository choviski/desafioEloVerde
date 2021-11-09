<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    protected $table="clientes";
    protected $fillable=["nome","cpf","foto"];
    public function endereco(){
        return $this->hasOne("App\Models\Endereco","id_cliente","id");
    }
    public function telefone(){
        return $this->hasOne("App\Models\Telefone","id_cliente","id");
    }
    use SoftDeletes;
}
