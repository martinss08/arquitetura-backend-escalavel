<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class);
    }
}
