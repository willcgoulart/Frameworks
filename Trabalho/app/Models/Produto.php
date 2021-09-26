<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id_produto';
    public $timestamps = false;

    protected $fillable = ['desc_produto', 'id_categoria', 'preco'];

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id_categoria', 'id_categoria');
    }

}

?>