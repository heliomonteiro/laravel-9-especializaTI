<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'visible',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];

    public function user()
    {
        // relacionamento many to one
        return $this->belongsTo(User::class);
    }

    //protected $table = 'comentarios'; -- Caso tivesse outro nome de tabela, em portugues por exemplo.
}
