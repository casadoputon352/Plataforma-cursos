<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;
    protected $table = 'inscricoes'; // Especifica o nome da tabela

    protected $fillable = ['curso_id', 'user_id', 'nome', 'email', 'forma_pagamento'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
