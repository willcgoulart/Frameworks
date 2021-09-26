<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    public $timestamps = false;

    protected $fillable = ['desc_categoria'];

    public function dadosProdutos()
    {
        return $this->belongsTo(Produto::class);
    }

}

?>