<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = 'table_notes';

    protected $fillable = [
        'titulo',
        'conteudo',
        'user_id',
    ];

    public $timestamps = false;
}
