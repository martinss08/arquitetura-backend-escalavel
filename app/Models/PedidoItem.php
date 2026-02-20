<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    protected $fillable = [
        'pedido_id',
        'produto_id',
        'quantidade',
        'preco'
    ];

    public function pedido()
    {
        return $this->BelongsTo(Pedido::class);
    }

    public function produto()
    {
        return $this->BelongsTo(Produto::class);
    }
}
