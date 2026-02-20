<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        "name",
        "quanty",
        "value",
        "situacao"
    ];

    public function produtoItens()
    {
        return $this->BelongsTo(PedidoItem::class);
    }
}
